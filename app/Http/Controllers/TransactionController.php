<?php

namespace App\Http\Controllers;

use App\Events\OrderDone;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $total=0;
        foreach (session('cart') as $id => $item)
        {
            $total += $item['quantity']*$item['price'];
        }
        $user_id = Auth::user()->id;
        $tracking_code = uniqid('ORD.');


        $transaction = new Transaction();
        $transaction->user_id = $user_id;
        $transaction->order_item_id = $user_id;
        $transaction->amount = $total;
        $transaction->status = 'paid';
        $transaction->tracking_code = $tracking_code;
        $transaction->save();

//send email to use and admin after transaction
//        OrderDone::dispatch($user_id);

        session()->forget('cart');

        return redirect('cart')->with('success','پرداخت شما با موفقیت انجام شد')
            ->with('tracking_code',$tracking_code);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('transaction.transaction');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
