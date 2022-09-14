@include('front.header')
<body class="antialiased">

<section class="cart-details" >

    @if(session('cart')!=null)
    <div class="box-container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%" class="text-right">محصول</th>
                <th style="width:10%" class="text-center">قیمت</th>
                <th style="width:8%" class="text-center">تعداد</th>
                <th style="width:22%" class="text-center">مجموع قیمت</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>
            {{$total = 0 }}
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    {{$total += ($details['price'] * $details['quantity']) }}
                        <tr data-id="{{ $id }}">
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img src="{{url('storage/'.$details['image'])  }}" width="100" height="100" class="img-responsive"/></div>
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">{{ $details['price'] }} تومان</td>
                            <td data-th="Quantity">
                                <form action="{{route('update.cart',['product'=>$id])}}" method="post">
                                    @csrf
                                <input type="number"  name="quantity" value="{{ $details['quantity'] }}" class="form-control quantity update-cart"  />
                                    <button class="btn btn-warning  update-cart">تایید</button>
                                </form>
                            </td>
                            <td data-th="Subtotal" class="text-center">{{ $details['price'] * $details['quantity'] }} تومان </td>
                            <form action="{{route('destroy.cart',['product'=>$id])}}">
                                @csrf
                                <td class="actions" data-th="">
                                <button class="btn btn-danger  remove-from-cart">حذف</button>
                                </td>
                            </form>
                        </tr>
                @endforeach
            @endif
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" class="text-right"><h3><strong>  مجموع : {{ $total }}  تومان </strong></h3></td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>ادامه خرید</a>

                        <a href="{{ route('order.show',['total'=>$total]) }}" class="btn btn-success">ثبت سفارش</a>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
    @else
        <div class="box-container">
            <div class="box-container">
                <table id="cart" class="table table-hover table-condensed">
                    <tr>
                        <h3>سبد خرید شما خالی است !</h3>
                        <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>ادامه خرید</a>
                    </tr>
                </table>
            </div>
        </div>
    @endif
</section>
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
<div class="container">
    @if(session('tracking_code'))
        <div class="alert alert-info">
            <h4>کد رهگیری شما:</h4>
            {{ session('tracking_code') }}
        </div>
    @endif
</div>
@include('front.footer')
</body>
</html>
