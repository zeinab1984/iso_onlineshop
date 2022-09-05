@extends('dashboard.dashboard')
@section('title','ایجاد دسته بندی جدید')

@section('content')
    <form action="{{route('categories.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>نام دسته بندی جدید</label>
            <input  name="title" type="text" class="form-control" placeholder="نام دسته بندی جدید را وارد کنید">
        </div>
            <button type="submit" class="btn btn-block btn-outline-primary">ارسال</button>
    </form>
@endsection
