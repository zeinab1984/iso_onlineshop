<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\Order_item;
use App\Models\Product;
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
        $order_item = new Order_item();
        $user_id = Auth::user()->id;
        foreach (session('cart') as $id => $item)
        {
            $order_item->user_id = $user_id;
            $order_item->product_id = $id;
            $order_item->qty = $item['quantity'];
            $order_item->save();
        }
        session()->forget('cart');
        return redirect('cart')->with('success','پرداخت شما با موفقیت انجام شد');

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
