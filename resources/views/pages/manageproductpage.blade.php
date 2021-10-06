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
                <tr>
                    <td class="item-id">1</td>
                    <td class="item-image">
                        <img src="storage/assets/lenovo-legion.webp" class="m-1" alt="...">
                    </td>
                    <td class="item-name">[Item Name]</td>
                    <td class="item-description">[Item Description]</td>
                    <td class="item-price">[Item Price]</td>
                    <td class="item-category"></td>
                    <td class="item-action">
                        <div class="d-flex">
                            <form action="" method="post">
                                <input type="submit" value="Update" class="btn btn-warning">
                            </form>
                            <form action="" method="post">
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection