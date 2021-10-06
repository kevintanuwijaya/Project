@extends('layout')
@section('title','Search Page')
@section('style')

    <style>
        .search-page{
            padding: 1vw;
        }

        .container{
            width: 100vw;
        }

        .row{
            width: 100vw;
        }

        .card-img-top{
            height: 30vh;
            width: 30vw;
        }

        .card{
            width: 30vw;
            margin: 1vw;
        }

    </style>
@endsection
@section('main')
<div class="search-page">
    <h2 class="text-center">New Product</h2>
    <div class="row row-cols-3">
        <div class="col">
            <div class="card" style="width: 30vw;">
                <img src="storage/assets/lenovo-legion.webp" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">[Item Name]</h5>
                        <span>[Jenis]</span>
                    </div>
                    <p>[Price]</p>
                    <a href="#" class="btn btn-warning">More Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
