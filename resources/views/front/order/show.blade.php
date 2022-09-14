@extends('front.index')
@section('content')
    <div class="box-container">
        <div class="box">
            <div class="content">
                <h4 class="card-title mb-2 text-bold">اطلاعات خرید</h4><br>
                <form action="{{route('order.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label> نام و نام خانوادگی کیرنده</label>
                        <input  name="name" type="text" class="form-control" value="{{$user->address->name}}" disabled>
                    </div>
                    <div class="form-group">
                        <label>نام استان</label>
                        <input  name="province" type="text" class="form-control" value="{{$user->address->province}}" disabled>
                    </div>
                    <div class="form-group">
                        <label>نام شهر</label>
                        <input  name="city" type="text" class="form-control" value="{{$user->address->city}}" disabled>
                    </div>
                    <div class="form-group">
                        <label>آدرس</label>
                        <input  name="address" type="text" class="form-control" value="{{$user->address->address}}" disabled/>
                    </div>
                    @foreach(session('cart') as $id => $item)
                    <div class="form-group">
                        <label>نام محصول</label>
                        <input  name="product_name" type="text" class="form-control" value="{{$item['name']}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>قیمت</label>
                        <input  name="price" type="text" class="form-control" value="{{$item['price']}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>تعداد</label>
                        <input  name="qty" type="text" class="form-control" value="{{$item['quantity']}}" disabled/>
                    </div>
                        <input type="hidden" value="{{$id}}" name="product_id">
                    @endforeach
                    <div class="form-group">
                        <label>مجموع</label>
                        <input  name="total" type="text" class="form-control" value="{{$total}}" disabled/>
                    </div>
                    <button type="submit" class="btn btn-block btn-outline-primary">تایید نهایی </button>

                </form>
            </div>
        </div>
    </div>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection
