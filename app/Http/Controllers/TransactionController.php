<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transactionHistory($user_id){
        $transactions = TransactionHeader::where('user_id', '=', $user_id)->get();

        return view('pages.historytransactionpage', ['transactions'=> $transactions]);
    }
}
