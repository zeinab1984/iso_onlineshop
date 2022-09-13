@include('front.header')
    <body class="antialiased">
{{--        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">--}}

{{--        </div>--}}
                <!-- header section starts  -->
        <header>

            <div id="menu-bar" class="fas fa-bars"></div>
            <a href="#" class="logo">نایک</a>

                <nav class="navbar">
                    <div class="dropdown">
                        <a  href="#" class="dropdown-toggle" type="button" data-toggle="dropdown">دسته بندی ها
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{route('categories.show',['category'=>$category->id])}}">{{$category->title}}</a>
                                </li>
                            @endforeach
                            </ul>
{{--                    <a href="#">ویژه</a>--}}
{{--                    <a href="#">نظرات</a>--}}
                    </div>
                </nav>

            <div class="icons">
                <a href="{{route('home.index')}}" class="fa fa-home"></a>
{{--                <a href="#" class="fas fa-heart"></a>--}}
                <a href="{{route('cart.show')}}" class="fas fa-shopping-cart"></a>
                    @if (Route::has('login'))
                        <img src="{{url('storage/'.$user_avatar)}}" class="img-circle elevation-2" alt="User Image" style="width:50px ">
                            @auth
                                <a href="{{ url('/dashboard') }}">داشبورد</a>
                                <a href="{{ url('logout') }}" class="fa login-box"> خروج</a>
                            @else
                                <a href="{{ route('login') }}" class="fas fa-user"></a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="fa fa-registered"> </a>
                                @endif
                            @endauth
                    @endif
            </div>
        </header>


                <!-- header section ends -->


                <!-- service section starts  -->

                <section class="service">

                    <div class="box-container">

                        <div class="box">
                            <i class="fas fa-shipping-fast"></i>
                            <h3>تحویل سریع</h3>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ </p>
                        </div>

                        <div class="box">
                            <i class="fas fa-undo"></i>
                            <h3>10 روز تعویض</h3>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ </p>
                        </div>

                        <div class="box">
                            <i class="fas fa-headset"></i>
                            <h3>پشتیبانی 24 * 7</h3>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ </p>
                        </div>

                    </div>

                </section>
                <!-- service section ends -->

                <!-- products section starts  -->

                <section class="products" id="products">
                        @yield('all products')
                        @yield('product each of category')
                        @yield('content')
                </section>

                <!-- products section ends -->

                <!-- featured section starts  -->



            @include('front.footer')


    </body>
</html>
