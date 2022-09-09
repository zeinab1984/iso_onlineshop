@extends('dashboard.dashboard')
@section('title','لیست محصولات')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-2 text-bold">لیست محصولات</h5>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">ردیف</th>
                    <th>نام</th>
                    <th>دسته بندی</th>
                    <th>ویژگی ها</th>
                    <th>تعداد</th>
                    <th>قیمت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category->title}}</td>
                        <td>
                        @foreach($product->featuers as $featuer)
                            {{$featuer->key.':'.$featuer->value .' '}}
                        @endforeach
                        </td>
                        <td>{{$product->qty}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <a href="{{route('products.edit',['product'=>$product->id])}}" class="btn btn-sm btn-primary">ویرایش</a>
                            <a href="{{route('products.destroy',['product'=>$product->id])}}" onclick="return confirm('آیا مطمئن هستید؟')" class="btn btn-sm btn-danger">حذف</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
