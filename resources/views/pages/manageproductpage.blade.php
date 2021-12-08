@extends('layout')
@section('title','Manage Product Page')
@section('style')
    <style>
        .manage-product-page{
            padding: 1vh 2vw 1vh 2vw;
        }

        .title{
            margin: 2vh 0 3vh 0;
        }

        .item-id{
            width: 1vw;
            vertical-align: middle;
        }

        .item-image{
            width: 15vw;
            
        }

        .item-name{
            width: 15vw;
        }

        .item-description{
            width: 35vw;
            
        }

        .item-price{
            width: 10vw;
        }

        .item-category{
            width: 10vw;
        }

        .item-action{
            width: 10vw;
        }

        table{
            width: 96vw;
        }

        img{
            height: 10vh;
        }
    </style>
@endsection

@section('main')
    <div class="manage-product-page">
        <h2 class="title">Manage Product</h2>
        <table class="table table-striped table-warning table-bordered border-primary">
            <thead class="border-primary">
                <tr>
                    <th>No</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Price</th>
                    <th>Product Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    

                <tr>
                    <td class="item-id">{{ $product->id }}</td>
                    <td class="item-image">
                        <img src="storage/product-assets/{{ $product->picture }}" class="m-1" alt="...">
                    </td>
                    <td class="item-name">{{ $product->name }}</td>
                    <td class="item-description">{{ $product->description }}</td>
                    <td class="item-price">{{ $product->price }}</td>
                    <td class="item-category">{{ $product->category->name }}</td>
                    <td class="item-action">
                        <div class="d-flex">
                            <a href="/product/edit/{{ $product->id }}" type="
                            button" class="btn btn-warning m-1">Update</a>
                            <form action="/product/{{ $product->id }}" method="POST">
                                @csrf
                                @method("delete")
                                <input type="submit" value="Delete" class="btn btn-danger m-1">
                            </form>
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
@endsection