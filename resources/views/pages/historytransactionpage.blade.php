@extends('layout')
@section('title','History Transaction Page')
@section('style')
    <style>
        .history-page{
            padding: 1vh 2vw 1vh 2vw;
        }

        .history-items{
            padding: 1rem;
            background-color: rgb(255, 255, 255);
        }

        .card{
            margin: 2vh 0 2vh 0;
            padding: 0;
        }

        .grand-total{
            margin: 2vh 0 2vh 0;
        }

    </style>
@endsection

@section('main')
<div class="history-page">
    <div class="history-items">
        <div class="d-flex justify-content-between">
            <span>[Tanggal]</span>
            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1" ></button>
        </div>
        <div class="collapse" id="collapseExample1">
            @foreach ($transactions as $transaction)
                @foreach ($transaction->transactionDetail as $transactionDetail)
            <div class="card card-body rounded">
               <div class="d-flex">
                    <div class="w-25">
                        <img src="storage/assets/lenovo-legion.webp" class="w-100 rounded" alt="" srcset="">
                    </div>
                    <div class="d-flex flex-column justify-content-between p-3 w-75">
                        <div class="d-flex">
                            <h4>{{ $transactionDetail->products->name }}</h4>
                            <span>(IDR. [Price])</span>
                        </div>
                        <p>x[jumlah] pcs</p>
                        <p class="text-end">IDR. [Harga] </p>
                    </div>
               </div>
            </div>
                @endforeach
            @endforeach
            {{-- <div class="card card-body rounded">
               <div class="d-flex">
                    <div class="w-25">
                        <img src="storage/assets/lenovo-legion.webp" class="w-100 rounded" alt="" srcset="">
                    </div>
                    <div class="d-flex flex-column justify-content-between p-3 w-75">
                        <div class="d-flex">
                            <h4>[Item Name]</h4>
                            <span>(IDR. [Price])</span>
                        </div>
                        <p>x[jumlah] pcs</p>
                        <p class="text-end">IDR. [Harga] </p>
                    </div>
               </div>
            </div> --}}
            <div class="grand-total">
                <h5 class="text-end">Total Price: IDR [Grand Total]</h5>
            </div>
        </div>
    </div>
    <div class="history-items">
        <div class="d-flex justify-content-between">
            <span>[Tanggal]</span>
            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" ></button>
        </div>
        <div class="collapse" id="collapseExample2">
            <div class="card card-body rounded">
               <div class="d-flex">
                    <div class="w-25">
                        <img src="storage/assets/lenovo-legion.webp" class="w-100 rounded" alt="" srcset="">
                    </div>
                    <div class="d-flex flex-column justify-content-between p-3 w-75">
                        <div class="d-flex">
                            <h4>[Item Name]</h4>
                            <span>(IDR. [Price])</span>
                        </div>
                        <p>x[jumlah] pcs</p>
                        <p class="text-end">IDR. [Harga] </p>
                    </div>
               </div>
            </div>
            <div class="grand-total">
                <h5 class="text-end">Total Price: IDR [Grand Total]</h5>
            </div>
        </div>
    </div>
</div>
@endsection
