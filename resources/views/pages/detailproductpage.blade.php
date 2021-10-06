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

    </style>
@endsection

@section('main')
<div class="detail-product-page">
    <div class="detail-container d-flex rounded">
        <div class="w-50">
            <img src="storage/assets/lenovo-legion.webp" class="w-100 rounded" alt="" srcset="">
        </div>
        <div class="d-flex flex-column detail-info w-50 p-5">
            <h2>[Nama Barang]</h2>
            <hr>
            <h4>Category</h4>
            <p>[Category]</p>
            <hr>
            <h4>Price:</h4>
            <p>[Category]</p>
            <hr>
            <h4>Description</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, quibusdam, modi praesentium unde, quod qui consequatur veniam quasi id voluptatibus aliquam vero numquam ducimus magnam. Asperiores tempore alias eligendi neque?</p>
            <hr>
            <form action="" method="post">
                @csrf
                <a href="/login" class="btn btn-warning">Login to buy</a>
                <span>Qty:&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <input type="number">
                <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <input type="submit" class="btn btn-warning" value="Add To Cart">
            </form>
        </div>
    </div>
</div>
@endsection