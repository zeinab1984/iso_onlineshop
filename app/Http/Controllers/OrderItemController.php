<?php

namespace App\Http\Controllers;

use App\Events\OrderDone;
use App\Models\Address;
use App\Models\Category;
use App\Models\Order_detail;
use App\Models\Order_item;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

        $user_id = Auth::user()->id;
        $tracking_code = uniqid('ORD.');
//        dd($tracking_code);
        $total = 0;
        foreach (session('cart') as $id => $item)
        {
            $order_item = new Order_item();
            $order_item->user_id = $user_id;
            $order_item->product_id = $id;
            $order_item->qty = $item['quantity'];
            $order_item->save();

            $order_detail = new Order_detail();
            $order_detail->order_item_id = $order_item->id;
            if($order_detail->discount){
                $order_detail->discount_id = $order_detail->discount->id;
            }else{
                $order_detail->discount_id = null;
            }

            $order_detail->price = $item['price'];
            $order_detail->total = $item['quantity']* $item['price'];
            $order_detail->save();
            $total += $item['quantity']*$item['price'];
        }

        $transaction = new Transaction();
        $transaction->user_id = $user_id;
        $transaction->amount = $total;
        $transaction->status = 'paid';
        $transaction->tracking_code = $tracking_code;
        $transaction->save();

        OrderDone::dispatch($user_id);
        session()->forget('cart');
        return redirect('cart')->with('success','پرداخت شما با موفقیت انجام شد')
            ->with('tracking_code',$tracking_code);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_item  $order_item
     * @return \Illuminate\Http\Response
     */
    public function show(Order_item $order_item)
    {
        $user = Auth::user();
        $categories = Category::showCategory();

        $data = [
            'user' => $user,
             'categories'=> $categories,
        ];
        if(Auth::check()){
            if(filled($user->address)){
                return view('front.order.show',$data);
            }else{
                return view('front.address.create',compact('categories'));
            }
        }else{
            return view('auth.login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_item  $order_item
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_item $order_item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order_item  $order_item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order_item $order_item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_item  $order_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_item $order_item)
    {
        //
    }
}
