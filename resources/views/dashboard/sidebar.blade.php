<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
{{--        <img src=@vite(['resources/dist/img/AdminLTELogo.png']) alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--             style="opacity: .8">--}}
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{url('uploads/'.$user_avatar)}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{$user_name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
{{--                    <li class="nav-item has-treeview menu-open">--}}
                    <li class="nav-item has-treeview">
                        <a href="{{route('user.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-pie-chart"></i>
                            <p>
                                مشخصات من
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>

{{--                        <ul class="nav nav-treeview" style="display: block;">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="" class="nav-link">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>تغییر رمز عبور</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                        <ul class="nav nav-treeview" style="display: block;">
                            <li class="nav-item">
                                <a href="{{route('user.myorders')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p> لیست سفارشات من</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                        @if(auth()->user()->hasRole('admin'))
                            <li class="nav-item">
                                <a href="{{route('users.show')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p> لیست کاربران</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categories.index')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p> لیست دسته بندی ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categories.create')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد دسته بندی جدید</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('products.index')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست محصولات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('products.create')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد محصول جدید</p>
                                </a>
                            </li>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('logout')}}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                               خروج
                            </p>
                        </a>
                    </li>
                    @endif
                </ul>

            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
