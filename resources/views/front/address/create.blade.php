@extends('front.index')
@section('content')
    <div class="box-container">
        <div class="box">
            <div class="content">
                <h4 class="card-title mb-2 text-bold">ثبت اطلاعات کاربر</h4><br>
                <form action="{{route('address.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label> نام و نام خانوادگی کیرنده</label>
                        <input  name="name" type="text" class="form-control" placeholder="نام و نام خانوادگی کیرنده را وارد کنید">
                    </div>
                    <div class="form-group">
                        <label>نام استان</label>
                        <input  name="province" type="text" class="form-control" placeholder="نام استان وارد کنید">
                    </div>
                    <div class="form-group">
                        <label>نام شهر</label>
                        <input  name="city" type="text" class="form-control" placeholder="نام شهر را وارد کنید">
                    </div>
                    <div class="form-group">
                        <label>آدرس</label>
                        <textarea  name="address" type="text" class="form-control" placeholder="آدرس را وارد کنید"></textarea>
                    </div>

                    <button type="submit" class="btn btn-block btn-outline-primary">ارسال</button>

                </form>
            </div>
        </div>
    </div>
@endsection
