@extends('dashboard.dashboard')
@section('title','ویرایش دسته بندی ها')

@section('content')

    <h4 class="card-title mb-2 text-bold">ویرایش محصول</h4><br>
    <img src="{{$image_path}}" style="width: 100px;height: auto">

    <form action="{{route('products.update',['product'=>$product->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>ویرایش نام محصول </label>
            <input  name="title" type="text" class="form-control" value="{{$product->name}}">
        </div>
        <div class="form-group">
            <label>نام دسته بندی</label>
            <select name="category_id" class="form-control">
                <option>انتخاب کنید:</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($category->id==$product->category_id)selected @endif>{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>قیمت</label>
            <input  name="price" type="text" class="form-control" value="{{$product->price}}">
        </div>
        <div class="form-group">
            <label>تعداد</label>
            <input  name="qty" type="text" class="form-control" value="{{$product->qty}}">
        </div>
        <div class="form-group">
            <label>توضیحات</label>
            <input  name="description" type="text" class="form-control" value="{{$product->description}}">
        </div>
        <div class="form-group">
            <label>انتخاب عکس</label>
            <input name="image" type="file" class="form-control" id="chooseFile">
        </div>
        <button type="submit" class="btn btn-block btn-outline-primary">ارسال</button>
    </form>
@endsection
