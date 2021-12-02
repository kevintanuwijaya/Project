<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cartHeader = Cart::where('user_id',Auth::id())->first();

        $cartDetails = null;

        if($cartHeader != null){
            $cartDetails = CartDetail::where('cart_id',$cartHeader->id)->get();
        }

        return view('pages.cartpage',['cartdetails'=> $cartDetails]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        //
        $request->validate([
            'quantity' => 'required|gt:0',
        ]);

        $cartHeader = Cart::where('user_id','=',Auth::id())->first();

        if($cartHeader!= null){
            
            $cartdetail = CartDetail::where([
                ['cart_id','=',$cartHeader->id],
                ['product_id','=',$product_id]
            ])->first();

            if($cartdetail!= null){

                $finalQuantity = $cartdetail->quantity + $request->quantity;

                CartDetail::where([
                    ['cart_id','=',$cartHeader->id],
                    ['product_id','=',$product_id]
                ])->update(['quantity' => $finalQuantity]);

            }else{

                CartDetail::create([
                    'cart_id' => $cartHeader->id,
                    'product_id' => $product_id,
                    'quantity' => $request->quantity,
                ]);

            }

        }else{

            $cartHeader = Cart::create([
                'user_id' => Auth::id(),
            ]);

            CartDetail::create([
                'cart_id' => $cartHeader->id,
                'product_id' => $product_id,
                'quantity' => $request->quantity,
            ]);

        }

        return redirect('/cart');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cart_id, $product_id)
    {
        //
        $cartdetail = CartDetail::where([
            ['cart_id','=',$cart_id],
            ['product_id','=',$product_id]
        ])->first();


        return view('pages.editcartpage',['cartdetail' => $cartdetail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cart_id, $product_id)
    {
        //
        $request->validate([
            'quantity' => 'required|gt:0'
        ]);


        $cartdetail = CartDetail::where([
            ['cart_id','=',$cart_id],
            ['product_id','=',$product_id]
        ])->update(['quantity' => $request->quantity]);

        return redirect('/cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cart_id, $product_id)
    {
        //
        CartDetail::where([
            ['cart_id','=',$cart_id],
            ['product_id','=',$product_id]
        ])->delete();

        $cartDetails = CartDetail::where([
            ['cart_id','=',$cart_id],
        ])->get();

        if(count($cartDetails) == 0){
            Cart::where('user_id',Auth::id())->delete();
        }

        return redirect('/cart');   
    }

    public function checkout()
    {
        
        $cartHeader = Cart::where('user_id',Auth::id())->first();

        if($cartHeader == null){
            return redirect('/cart');
        }

        $transactionHeader = TransactionHeader::create([
            'user_id' => Auth::id(),
            'status' => 'PAID',
        ]);

        $cartHeader = Cart::where('user_id',Auth::id())->first();

        $cartDetails = CartDetail::where('cart_id',$cartHeader->id)->get();

        foreach($cartDetails as $cartDetail){

            TransactionDetail::create([
                'transaction_header_id' => $transactionHeader->id,
                'product_id' => $cartDetail->product_id,
                'quantity' => $cartDetail->quantity,
            ]);

        }

        Cart::where('user_id',Auth::id())->delete();
        CartDetail::where('cart_id',$cartHeader->id)->delete();

        return redirect('/');
    }
}
