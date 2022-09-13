@extends('dashboard.dashboard')
@section('title','لیست سفارشات من')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-2 text-bold">لیست محصولات</h5>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">ردیف</th>
                    <th>نام</th>
                    <th>قیمت</th>
                    <th>تعداد</th>
                    <th>ویژگی محصول</th>
                    <th>مجموع قیمت</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$order->product->name}}</td>
                        <td>{{$order->product->price}}</td>
                        <td>{{$order->qty}}</td>
                        <td>
                            @foreach($order->product->featuers as $featuer)
                                {{$featuer->key.':'.$featuer->value .' '}}
                            @endforeach
                        </td>
                        <td>{{$order->orderDetail->total}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
