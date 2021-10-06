@extends('layout')
@section('title','Cart Page')
@section('style')
    <style>

        .cart-page{
            padding: 2vh 2vw 2vh 2vw;
        }

        .cart-items{
            margin: 2vh 0 2vh 0;
            background-color: rgb(255, 255, 255);
        }

        .cart-info{
            margin: 1vh 3vw 1vh 3vw;
        }

        form{
            margin: 0 1vw 0 0;
        }

    </style>
@endsection
@section('main')
    <div class="cart-page">
        <h2>My Cart</h2>
        <div class="d-flex p-4 cart-items">
            <div class="w-25">
                <img src="storage/assets/lenovo-legion.webp" class="w-100 rounded" alt="" srcset="">
            </div>
            <div class="cart-info d-flex flex-column justify-content-between">
                <div class="d-flex">
                    <h3>[Item Name]</h3> 
                    <span>[Item Price]</span>
                </div>
                <div>
                    <p>x[Jumlah] pcs</p>
                </div>
                <div>
                    <p>IDR [nilai]</p>
                </div>
                <div>
                    <div class="d-flex">
                        <form action="">
                            @csrf
                            <input type="submit" class="btn btn-warning" value="Edit">
                        </form>
                        <form action="">
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5>Total Price:</h5>
                <p>IDR. [Total]</p>
            </div>
            <div>
                <form action="" method="post">
                    @csrf
                    <input type="submit" class="btn btn-warning" value="Checkout">
                </form>
            </div>
        </div>
    </div>

@endsection