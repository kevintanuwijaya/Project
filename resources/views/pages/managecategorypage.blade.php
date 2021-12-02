@extends('layout')
@section('title','Manage Category')
@section('style')
    <style>
        .manage-category-page{
            padding: 1vh 2vw 1vh 2vw;
        }

        .title{
            margin: 2vh 0 3vh 0;
        }

        .item-name{
            width: 80vw;
        }

        .item-id{
            width: 3vw;
        }

        .item-action{
            width: 13vw;
        }

        table{
            width: 96vw;
        }
    </style>
@endsection

@section('main')
    <div class="manage-category-page">
        <h2 class="title">Manage Category</h2>
        <table class="table table-striped table-warning table-bordered border-primary">
            <thead class="border-primary">
                <tr>
                    <th>No</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($categories  as $category )
                    
                    <tr>
                        <td class="item-id">{{ $category->id }}</td>
                        <td class="item-name">{{ $category->name }}</td>
                        <td class="item-action">
                            <div class="d-flex">
                                <a href="/category/{{ $category->id }}" type="
                                button" class="btn btn-warning">Update</a>
                                <form action="/category/{{ $category->id }}" method="POST">
                                    @csrf
                                    @method('Delete')
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </div>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
@endsection