@extends('front.index')
@section('content')
    <div class="box-container">
        <div class="box">
            <h4 class="card-title mb-2 text-bold">درگاه های پرداخت الکترونیکی</h4><br>
            <form action="{{route('transaction.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="content">
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
                    <button type="submit" class="btn btn-block btn-outline-primary"> پرداخت </button>
                </div>
            </form>
                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>ادامه خرید</a>
        </div>
    </div>


@endsection
