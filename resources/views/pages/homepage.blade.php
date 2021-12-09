@extends('layout')
@section('title','Home Page')
@section('style')

    <style>
        .home-page{
            padding: 1vw;
        }

        .container{
            width: 100vw;
        }

        .row{
            width: 100vw;
        }

        .card-img-top{
            height: 44vh;
            width: 29vw;
        }

        .card{
            width: 30vw;
            margin: 1vw;
        }

        .pagination{
            margin: 0.5%;
        }

    </style>
@endsection
@section('main')
<div class="home-page">
    <h2 class="text-center">New Product</h2>
    <div class="row row-cols-3">
        @foreach ($products as $product)
            <div class="col">
                <div class="card border border-warning" style="width: 30vw;">
                    <img src="storage/product-assets/{{ $product->picture }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <span>{{ $product->category->name }}</span>
                        </div>

                        @php
                            $priceStr = number_format($product->price,2,',',',');
                        @endphp

                        <p>IDR. {{$priceStr}}</p>
                        <a href="/product/{{ $product->id }}" class="btn btn-warning">More Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="pagination">
        {{ $products->withQueryString()->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
