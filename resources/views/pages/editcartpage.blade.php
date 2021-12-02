@extends('layout')
@section('title','Edit Cart Page')
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
            <img src="/storage/product-assets/{{ $cartdetail->product->picture }}" class="w-100 rounded" alt="" srcset="">
        </div>
        <div class="d-flex flex-column detail-info w-50 p-5">
            <h2>{{ $cartdetail->product->name }}</h2>
            <hr>
            <h4>Price:</h4>

            @php
                $priceStr = number_format($cartdetail->product->price,2,',','.'); 
            @endphp

            <p>IDR. {{ $priceStr }}</p>
            <hr>
            <h4>Description</h4>
            <p>{{ $cartdetail->product->description }}</p>
            <hr>
            <form action="/cart/{{ $cartdetail->cart_id }}/{{ $cartdetail->product_id }}" method="POST">
                @csrf
                @method('PATCH')
                <span>Qty:&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <input type="number" name="quantity" value="{{$cartdetail->quantity}}">
                @error('quantity')  
                    <span class="error-message">{{ $message }}</span>
                @enderror
                <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <input type="submit" class="btn btn-warning" value="Save">
            </form>
        </div>
    </div>
</div>
@endsection