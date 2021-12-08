@extends('layout')
@section('title','History Transaction Page')
@section('style')
    <style>
        .history-page{
            padding: 2vh 2vw;
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
            margin: 1vh 1vw 2vh 0;
        }

        .accordion-show{
            padding-bottom: 0%;
        }

        .accordion-hide{
            padding-top: 0%;
        }

    </style>
@endsection

@section('main')
<div class="history-page">
    @foreach ($transactions as $transaction)

    @php
        $totalPrice = 0;
    @endphp

    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $transaction->id }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $transaction->id }}" aria-expanded="true" aria-controls="collapse{{ $transaction->id }}">
                    {{ $transaction->created_at }}
                </button>
            </h2>

            @php
                $subtotalPrice = $transaction->transactionDetail[0]->quantity * $transaction->transactionDetail[0]->product->price;
                $totalPrice = $totalPrice + $subtotalPrice;

                $priceStr = number_format($transaction->transactionDetail[0]->product->price,2,',',',');
                $subtotalPriceStr = number_format($subtotalPrice,2,',',',');
            @endphp
            <div class="accordion-body accordion-show">
                <div class="card card-body rounded">
                    <div class="d-flex">
                        <div class="w-25 d-flex justify-content-center p-3">
                            <img src="/storage/product-assets/{{ $transaction->transactionDetail[0]->product->picture }}" class="w-50 rounded" alt="" srcset="">
                        </div>
                        <div class="d-flex flex-column justify-content-between p-3 w-75">
                            <div class="d-flex">
                                <h4>{{ $transaction->transactionDetail[0]->product->name }}</h4>
                                <span>(IDR. {{ $priceStr }} )</span>
                            </div>
                            <p>x{{ $transaction->transactionDetail[0]->quantity }} pcs</p>
                            <p class="text-end">IDR. {{ $subtotalPriceStr }} </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="collapse{{ $transaction->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $transaction->id }}">
                <div class="accordion-body accordion-hide">
                @for ($i = 1; $i < count($transaction->transactionDetail); $i++)

                    @php
                    $subtotalPrice = $transaction->transactionDetail[$i]->quantity * $transaction->transactionDetail[$i]->product->price;
                    $totalPrice = $totalPrice + $subtotalPrice;

                    $priceStr = number_format($transaction->transactionDetail[$i]->product->price,2,',',',');
                    $subtotalPriceStr = number_format($subtotalPrice,2,',',',');
                    @endphp
                    <div class="card card-body rounded">
                        <div class="d-flex">
                            <div class="w-25 d-flex justify-content-center p-3">
                                <img src="/storage/product-assets/{{ $transaction->transactionDetail[$i]->product->picture }}" class="w-50 rounded" alt="" srcset="">
                            </div>
                            <div class="d-flex flex-column justify-content-between p-3 w-75">
                                <div class="d-flex">
                                    <h4>{{ $transaction->transactionDetail[$i]->product->name }}</h4>
                                    <span>(IDR. {{ $priceStr }} )</span>
                                </div>
                                <p>x{{ $transaction->transactionDetail[$i]->quantity }} pcs</p>
                                <p class="text-end">IDR. {{ $subtotalPriceStr }} </p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>  
            </div>
            @php
                $totalPriceStr = number_format($totalPrice,2,',',',');
            @endphp

            <div class="grand-total">
                <h5 class="text-end">Total Price: IDR {{ $totalPriceStr }}</h5>
            </div>
        </div>
    </div>

    @endforeach
@endsection
