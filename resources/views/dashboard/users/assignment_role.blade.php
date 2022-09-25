@extends('dashboard.dashboard')

@section('title','انتساب نقش')


@section('content')

    <form method="post" action="{{route('users.store.role',['user'=>$user->id])}}">
        @csrf
        <div class="card-body">
            <div class="card-header">
                <h3 class="card-title">انتساب نقش </h3>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" name="role[]" type="checkbox" value="5" id="flexCheckDefault" @if($user->hasRole('admin'))checked @endif>
                    <label class="form-check-label" for="flexCheckDefault">مدیر سایت</label>
                </div>
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" name="role[]" type="checkbox" value="4" id="flexCheckChecked" @if(@in_array('writer',$roles))checked @endif>--}}
{{--                    <label class="form-check-label" for="flexCheckChecked">نویسنده</label>--}}
{{--                </div>--}}
                <div class="form-check">
                    <input class="form-check-input" name="role[]" type="checkbox" value="6" id="flexCheckChecked" @if($user->hasRole('editor'))checked @endif>
                    <label class="form-check-label" for="flexCheckChecked">ویرایش گر</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="role[]" type="checkbox" value="7" id="flexCheckChecked" @if($user->hasRole('customer'))checked @endif>
                    <label class="form-check-label" for="flexCheckChecked">مشتری</label>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>

        </div>
    </form>
@endsection
