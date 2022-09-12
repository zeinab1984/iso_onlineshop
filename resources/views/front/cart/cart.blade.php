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
            @php $total = 0 @endphp
            @if(session('cart'))

                @foreach(session('cart') as $id => $details)
                    @php $total += ($details['price'] * $details['quantity']) @endphp
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
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                        </td>
                        <td data-th="Subtotal" class="text-center">{{ $details['price'] * $details['quantity'] }} تومان </td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                        </td>
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

                        <a href="{{ route('order.show') }}" class="btn btn-success">ثبت سفارش</a>
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
@include('front.footer')
</body>
</html>
