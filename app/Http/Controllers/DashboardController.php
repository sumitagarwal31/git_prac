<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class DashboardController extends Controller
{
    public function home(){
        $transactions= Transaction::orderBy('created_at', 'desc')->get();
        return view('dashboard',compact('transactions'));
    }
    
    public function add(){
        return view('add');
     }

    public function submit(Request $request){
        $balance= Transaction::orderBy('created_at', 'desc')->first(['balance']);
        $transaction = new Transaction;
        $transaction->transaction_type = $request->transaction_type;
        $transaction->amount = $request->amount;
        $transaction->description = $request->description;
        if($balance == null){
            if( $request->transaction_type == 'credit'){
                $transaction->balance = $request->amount;
            }else{
                $transaction->balance = -($request->amount);
            }
        }else{
            if( $request->transaction_type == 'debit'){
                $transaction->balance = $balance->balance - $request->amount;
            }else{
                $transaction->balance = $balance->balance + $request->amount;
            }
        }
        $transaction->save();
        return redirect()->to('/');
    }
}