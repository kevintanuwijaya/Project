@extends('layout')
@section('title','Cart Page')
@section('style')
    <style>

        .cart-page{
            padding: 2vh 2vw 2vh 2vw;
        }

        .cart-section{
            min-height: 55vh;
        }

        .cart-image{
            width: 15%;
        }

        .cart-items{
            margin: 2vh 0 2vh 0;
            background-color: rgb(255, 255, 255);
        }

        .cart-info{
            margin: 1vh 3vw 1vh 3vw;
        }

        .no-cart-heading{
            text-align: center;
        }

        form{
            margin: 0 1vw 0 0;
        }

    </style>
@endsection
@section('main')
    <div class="cart-page">
        <h2>My Cart</h2>
        <div class="cart-section">


        @php
            $totalPrice = 0;    
        @endphp

        @if ($cartdetails != null)
            
            @foreach ($cartdetails as $cartdetail)
                @php

                    $subtotalPrice = $cartdetail->quantity * $cartdetail->product->price;
                    $totalPrice = $totalPrice + $subtotalPrice;

                    $priceStr = number_format($cartdetail->product->price,2,',','.');
                    $subtotalPriceStr = number_format($subtotalPrice,2,',','.');
                @endphp

                <div class="d-flex p-4 cart-items">
                    <div class="cart-image">
                        <img src="/storage/product-assets/{{ $cartdetail->product->picture }}" class="w-100 rounded" alt="" srcset="">
                    </div>

                    <div class="cart-info d-flex flex-column justify-content-between">
                        <div class="d-flex">
                            <h3>{{ $cartdetail->product->name }}</h3> 
                            <span>(IDR. {{ $priceStr }})</span>
                        </div>
                        <div>
                            <p>x{{ $cartdetail->quantity }}</p>
                        </div>
                        <div>
                            <p>IDR. {{ $subtotalPriceStr }}</p>
                        </div>
                        <div>
                            <div class="d-flex">
                                <form action="/cart/delete/{{ $cartdetail->cart_id }}/{{ $cartdetail->product_id }}" method="POST">
                                    @csrf
                                    <a href="/cart/edit/{{ $cartdetail->cart_id }}/{{ $cartdetail->product_id }}" type="button" class="btn btn-warning">Edit</a>
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        @else
            <h1 class="no-cart-heading">No Cart</h1>
        @endif           
        </div>
        <div class="d-flex justify-content-between align-items-center">

            @php
                $totalPriceStr = number_format($totalPrice,2,',','.');

                $itemCount = 0;
                if($cartdetails != null){
                    $itemCount = count($cartdetails);
                }

            @endphp

            <div>
                <h5>Total Price:</h5>
                <p>IDR. {{ $totalPriceStr }}</p>
            </div>

            @if ($itemCount != 0)
                <div>
                    <form action="/cart/checkout" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-warning" value="Checkout({{ $itemCount }})">
                    </form>
                </div>
            @endif  
        </div>
    </div>

@endsection