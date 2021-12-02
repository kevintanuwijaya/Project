<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();


        return view('pages.manageproductpage',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $product = null;

        $categories = Category::all();


        return view('pages.productpage',['product'=>$product,'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'productname' => 'required|unique:products,name|min:5',
            'description' => 'required|min:50',
            'price' => 'required|integer|gt:0',
            'category' => 'required',
            'picture' => 'required|mimes:jpg,png'
        ]);

        $file = $request->file('picture');
        $fileName = time().$file->getClientOriginalName();
        Storage::putFileAs('public/product-assets',$file,$fileName);

        Product::create([
            'category_id' => $request->category,
            'name' => $request->productname, 
            'price' => $request->price,
            'description' => $request->description,
            'picture' => $fileName,
        ]);

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);

        return view('pages.detailproductpage',['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);

        $categories = Category::Where('id','NOT LIKE',$product->category_id)->get();

        return view('pages.productpage',['product'=>$product,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'productname' => 'required|unique:products,name|min:5',
            'description' => 'required|min:50',
            'price' => 'required|integer|gt:0',
            'category' => 'required',
        ]);

        $product = Product::find($id);

        if($request->picture != null){


            $request->validate([
                'picture' => 'mimes:jpg,png'
            ]);
            
            Storage::delete('public/product-assets/'.$product->picture);
            $file = $request->file('picture');
            $fileName = time().$file->getClientOriginalName();
            Storage::putFileAs('public/product-assets',$file,$fileName);

            $product->picture = $fileName;
        }

        $product->name = $request->productname;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;

        $product->save();

        return redirect('/product/edit/'.$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);

        Storage::delete('public/product-assets/'.$product->picture);
        $product->delete();

        return redirect('/products');
    }
}
