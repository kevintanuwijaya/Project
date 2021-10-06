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
                <tr>
                    <td class="item-id">[Number]</td>
                    <td class="item-name">[Item Name]</td>
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