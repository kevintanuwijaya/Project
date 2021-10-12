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

    </style>
@endsection
@section('main')
    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="d-flex flex-column m-4 p-4 form">
            <h2 class="add-title">Insert New Product</h2>
            <form method="POST" action="">
                @csrf
                <div class="form-floating mb-3">
                    <input name="productname" placeholder="Product Name" type="text" id="floatingProductName" class="form-control" value=""> 
                    <label for="floatingProductName">Product Name</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="description" placeholder="Description" class="form-control" id="floatingDescription" rows="5"></textarea>
                    <label for="floatingDescription">Description</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="price" placeholder="Product Price" type="number" class="form-control" id="floatingPrice">
                    <label for="floatingPrice">Product Price</label>
                </div>
                <p>Product Category</p>
                <select class="form-select mb-3" aria-label="Default select example">
                    <option selected>Choose One</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <p>Product Image</p>
                <div class="mb-3">
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-warning">Register Now</button>
                </div>
            </form>
        </div>
    </div>
@endsection