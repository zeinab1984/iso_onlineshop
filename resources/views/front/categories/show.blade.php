@extends('front.index')

@section('content')
    <h1 class="heading">  <span>محصولات</span> {{$category->title}} </h1>

    <div class="box-container">
        <div class="box">
            {{-- <div class="icons"></div>--}}
            <div class="content ">
                @foreach($products as $product)
                    @if(filled($product->pic))
                        <img src="{{url('storage/'.$product->pic->file_path)}}" alt="">
                    @else
                     <p>عکسی برای محصول پیدا نشد!</p>
                    @endif

                <div class="content">
                    <h3>{{$product->name}}</h3>
                    <div class="price">{{$product->price}} تومان
                        <span></span>
                    </div>
                    @foreach($product->featuers as $featuer)
                    <div class="products box-container">
                       <h4> {{$featuer->key .':'.$featuer->value}}</h4>
                    </div>
                    @endforeach
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <a href="#" class="btn">افزودن به سبد خرید</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
