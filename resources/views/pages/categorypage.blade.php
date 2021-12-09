@extends('layout')
@section('style')
    <style>
        .edit-category-page{
            height: 72vh;
        }

        .edit-category-title{
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

        .error-message{
            color: red;
        }

    </style>
@endsection

@section('main')
    <div class="edit-category-page d-flex flex-column justify-content-center align-items-center">
        <div class="d-flex flex-column m-4 p-4 form">

            @if ($category == null)
                <h2 class="edit-category-title">Insert New Category</h2>
            @else
                <h2 class="edit-category-title">Edit Category</h2>
            @endif
            <form method="POST" action="
            
                @if ($category == null)
                    @section('title','Add Category Page')
                    /category/insert
                @else
                    @section('title','Edit Category Page')
                    /category/{{ $category->id }}
                @endif

            ">
                @csrf
                @if ($category == null)
                    @method('PUT')    
                @else
                    @method('PATCH')
                @endif
                <div class="form-floating mb-3">
                    <input name="name" placeholder="Category Name" type="text" id="floatingName" class="form-control" value="@if($category != null && old('name')){{old('name')}}@else @if ($category != null && old('name') == null) {{ $category->name }} @else {{ old('name') }} @endif @endif"> 
                    <label for="floatingName">Category Name</label>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    @if ($category == null)
                        <button type="submit" class="btn btn-warning">Add</button>    
                    @else
                        <button type="submit" class="btn btn-warning">Save</button>
                    @endif
                </div>
            </form>
        </div>
    </div>

@endsection