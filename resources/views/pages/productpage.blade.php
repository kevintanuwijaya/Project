@extends('layout')
@section('title','Edit Product Page')
@section('style')
    <style>
        .add-title{
            margin-bottom: 2vh;
        }

        .form{
            background-color: rgb(248, 249, 250);
        }
        
        .mb-3{
            width: 60vw;
            height: 7vh;
        }

        .mb-3-file{
            height: 5vh;
        }

        .form-control{
            height: 5vh;
        }

        .error-message{
            color: red;
        }

    </style>
@endsection
@section('main')
    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="d-flex flex-column m-4 p-4 form">

            @if ($product == null)
                <h2 class="add-title">Insert New Product</h2>
            @else
                <h2 class="add-title">Edit Product</h2>
            @endif
            
            <form method="POST" action="

                @if ($product == null)
                    /product/insert
                @else
                    /product/update/{{ $product->id }}
                @endif
            " enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input name="productname" placeholder="Product Name" type="text" id="floatingProductName" class="form-control" 
                    value="@if ($product!=null){{ $product->name }}@endif"> 
                    <label for="floatingProductName">Product Name</label>
                    @error('productname')
                        <div>
                            <span class="error-message">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-4">
                    <textarea name="description" placeholder="Description" class="form-control" id="floatingDescription" rows="5">@if ($product!=null){{ $product->description }}@endif</textarea>
                    <label for="floatingDescription">Description</label>
                    @error('description')
                        <div>
                            <span class="error-message">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input name="price" placeholder="Product Price" type="number" class="form-control" id="floatingPrice" 
                    value="@if ($product!=null){{ $product->price }}@endif">
                    <label for="floatingPrice">Product Price</label>
                    @error('price')
                        <div>
                            <span class="error-message">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <p>Product Category</p>
                <select class="form-select mb-3" aria-label="Default select example" name="category">
                    @if ($product != null)
                        <option value="{{ $product->category_id }}" selected>{{ $product->category->name }}</option>
                    @else
                        <option selected>Choose one</option>
                    @endif
                    
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <div>
                        <span class="error-message">{{ $message }}</span>
                    </div>
                @enderror
                <p>Product Image</p>
                <div class="mb-3">
                    <input class="form-control" type="file" id="formFile" name="picture">
                    <div>
                        @if ($product != null)
                            {{ $product->picture }}
                        @endif
                    </div>
                    @error('picture')
                        <div>
                            <span class="error-message">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    @if ($product != null)
                        <button type="submit" class="btn btn-warning">Edit</button>
                    @else
                        <button type="submit" class="btn btn-warning">Insert</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection