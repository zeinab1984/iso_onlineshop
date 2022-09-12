@include('front.header')
    <body class="antialiased">
{{--        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">--}}

{{--        </div>--}}
                <!-- header section starts  -->
        <header>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div id="menu-bar" class="fas fa-bars"></div>

            <a href="#" class="logo">نایک</a>
            <div class="dropdown">
                <nav class="navbar">
                    <a href="{{route('home.index')}}">خانه</a>
                        <a  href="#" class="dropdown-toggle" type="button" data-toggle="dropdown">دسته بندی ها
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{route('categories.show',['category'=>$category->id])}}">{{$category->title}}</a>
                                </li>
                            @endforeach
                            </ul>
                    <a href="#">ویژه</a>
                    <a href="#">نظرات</a>

                </nav>
            </div>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="{{route('cart.show')}}" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-user"></a>
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
