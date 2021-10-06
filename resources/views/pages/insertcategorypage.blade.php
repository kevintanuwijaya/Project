@extends('layout')
@section('title','Insert Category Page')
@section('style')
    <style>
        .insert-category-page{
            height: 72vh;
        }

        .insert-category-title{
            margin-bottom: 2vh;
        }

        .form{
            background-color: rgb(248, 249, 250);
        }
        
        .mb-3{
            width: 60vw;
            height: 7vh;
        }

        .form-control{
            height: 5vh;
        }

    </style>
@endsection

@section('main')
    <div class="insert-category-page d-flex flex-column justify-content-center align-items-center">
        <div class="d-flex flex-column m-4 p-4 form">
            <h2 class="insert-category-title">Insert New Category</h2>
            <form method="POST" action="">
                @csrf
                <div class="form-floating mb-3">
                    <input name="name" placeholder="Full Name" type="text" id="floatingName" class="form-control"> 
                    <label for="floatingName">Category Name</label>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-warning">Add</button>
                </div>
            </form>
        </div>
    </div>

@endsection