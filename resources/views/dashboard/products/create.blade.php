@extends('dashboard.dashboard')
@section('title','ایجاد دسته بندی جدید')

@section('content')
    <h4 class="card-title mb-2 text-bold">محصول جدید</h4><br>
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>نام محصول جدید</label>
            <input  name="title" type="text" class="form-control" placeholder="نام محصول جدید را وارد کنید">
        </div>
        <div class="form-group">
            <label>نام دسته بندی</label>
            <select name="category_id" class="form-control">
                <option>انتخاب کنید:</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>قیمت</label>
            <input  name="price" type="text" class="form-control" placeholder="قیمت را وارد کنید">
        </div>
        <div class="form-group">
            <label>تعداد</label>
            <input  name="qty" type="text" class="form-control" placeholder="تعداد را وارد کنید">
        </div>

        <div class="form-group" >
            <label>ویژگی:</label>
{{--            <div class="input-group m-3">--}}
{{--                <div class="input-group-prepend">--}}
{{--                    <button class="btn btn-danger" id="DeleteRow" type="button">حذف</button>--}}
{{--                </div>--}}
{{--                <input  name="inp1" type="text" class="form-control m-input">--}}
{{--            </div>--}}
            <div id="newinput">
                <button id="rowAdder" type="button" class="btn btn-success">
                    <span class="bi bi-plus-square-dotted"> اضافه </span>
                </button>
            </div>
        </div>
        <div class="form-group">
            <label>توضیحات</label>
            <input  name="description" type="text" class="form-control" placeholder="توضیحات محصول جدید را وارد کنید">
        </div>
        <div class="form-group">
            <label>انتخاب عکس</label>
             <input name="image" type="file" class="form-control" id="chooseFile">
        </div>
            <button type="submit" class="btn btn-block btn-outline-primary">ارسال</button>
    </form>
@endsection


@section('my-script')

<script type="text/javascript">
    var i = 0;
    $("#rowAdder").click(function () {

            var newRowAdd =
                '<div id="row"> <div class="input-group m-3">' +
                '<div class="input-group-prepend">' +
                '<button class="btn btn-danger" id="DeleteRow" type="button">' +
                '<i class="bi bi-trash"></i> Delete</button> </div>' +
                '<input type="text" class="form-control m-input"  name="key[' + i + ']">' +
                '<input type="text" class="form-control  m-input" name="value[' + i + ']" style="margin-right: 10px" >' +
                ' </div>' +
                ' </div>';

            $('#newinput').append(newRowAdd);
            i++;

    });

    $("body").on("click", "#DeleteRow", function () {
        $(this).parents("#row").remove();
    });
</script>
@endsection
