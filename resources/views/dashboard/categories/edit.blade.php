@extends('dashboard.dashboard')
@section('title','ویرایش دسته بندی ها')

@section('content')
    {{$category}}
    <form action="{{route('categories.update',['category'=>$category->id])}}" method="post">
        @csrf
        <div class="form-group">
            <label>ویرایش دسته بندی</label>
            <input  name="title" type="text" class="form-control" value="{{$category->title}}">
        </div>
        <button type="submit" class="btn btn-block btn-outline-primary">ارسال</button>
    </form>
@endsection
