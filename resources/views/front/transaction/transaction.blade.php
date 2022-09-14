@extends('front.index')
@section('content')
    <div class="box-container">
        <div class="box">
            <div class="content">
                <h4 class="card-title mb-2 text-bold">درگاه های پرداخت الکترونیکی</h4><br>
                <form action="{{route('transaction.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-block btn-outline-primary"> پرداخت </button>
                </form>
                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>ادامه خرید</a>
            </div>
        </div>
    </div>


@endsection
