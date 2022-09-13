@extends('dashboard.dashboard')
@section('title','لیست کاربران')

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="width: 10px">ردیف</th>
            <th>نام و نام خانوادگی</th>
            <th>ایمیل</th>
            <th>نقش</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @foreach($user->roles as $role)
                        <ul>
                            <li>{{$role->display_name .','}}</li>
                        </ul>
                    @endforeach
                </td>
                <td>
                    <a href="{{route('users.assignment.role',['user'=>$user->id])}}" class="btn btn-sm btn-primary">انتساب نقش</a>
                    <a href="{{route('users.destroy',['user'=>$user->id])}}" onclick="return confirm('آیا مطمئن هستید؟')" class="btn btn-sm btn-danger"> حذف کاربر</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
