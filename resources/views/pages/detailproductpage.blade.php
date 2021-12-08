@extends('layout')
@section('title','Detail Product')
@section('style')
    <style>
        .detail-product-page{
            padding: 3vh 5vw 3vh 5vw;
        }

        .detail-container{
            background-color: rgb(255, 255, 255);
        }

        .detail-info{
            background-color: rgb(248, 249, 250);
        }

        .error-message{
            color: red;
        }

    </style>
@endsection

@section('main')
<div class="detail-product-page">
    <div class="detail-container d-flex rounded">
        <div class="w-50">
            <img src="/storage/product-assets/{{ $product->picture }}" class="w-100 rounded" alt="" srcset="">
        </div>
        <div class="d-flex flex-column detail-info w-50 p-5">
            <h2>{{ $product->name }}</h2>
            <hr>
            <h4>Category</h4>
            <p>{{ $product->category->name }}</p>
            <hr>
            <h4>Price:</h4>
            @php
                $priceStr = number_format($product->price,2,',',',');
            @endphp
            <p>{{ $priceStr }}</p>
            <hr>
            <h4>Description</h4>
            <p>{{ $product->description }}</p>
            <hr>
            <form action="/cart/{{ $product->id }}" method="POST">
                @csrf
                @method('PUT')
                @auth()
                    @if (Auth::check() && Auth::user()->role_id == 2)
                        <span>Qty:&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="number" name="quantity">
                        @error('quantity')
                            <span class="error-message">{{$message}}</span>
                        @enderror
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="submit" class="btn btn-warning" value="Add To Cart">
                    @endif
                @else
                    <a href="/login" class="btn btn-warning">Login to buy</a> 
                @endauth
            </form>
        </div>
    </div>
</div>
@endsection