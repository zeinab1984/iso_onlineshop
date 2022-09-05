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

            <nav class="navbar">
                <a href="#">خانه</a>
                <a href="#">محصولات</a>
                <a href="#">ویژه</a>
                <a href="#">نظرات</a>
            </nav>

            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-user"></a>
            </div>

        </header>


                <!-- header section ends -->

                <!-- home section starts  -->

                <section class="home" id="home">

                    <div class="slide-container active">
                        <div class="slide">
                            <div class="content">
                                <span>کفش قرمز نایک</span>
                                <h3>کفش نایک metcon</h3>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است </p>
                                <a href="#" class="btn">افزودن به سبد خرید</a>
                            </div>
                            <div class="image">
                                <img src="images/home-shoe-1.png" class="shoe" alt="">
                                <img src="images/home-text-1.png" class="text" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="slide-container">
                        <div class="slide">
                            <div class="content">
                                <span>کفش آبی نایک</span>
                                <h3>کفش نایک metcon</h3>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است </p>
                                <a href="#" class="btn">افزودن به سبد خرید</a>
                            </div>
                            <div class="image">
                                <img src="images/home-shoe-2.png" class="shoe" alt="">
                                <img src="images/home-text-2.png" class="text" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="slide-container">
                        <div class="slide">
                            <div class="content">
                                <span>کفش زرد نایک</span>
                                <h3>کفش نایک metcon</h3>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است </p>
                                <a href="#" class="btn">افزودن به سبد خرید</a>
                            </div>
                            <div class="image">
                                <img src="images/home-shoe-3.png" class="shoe" alt="">
                                <img src="images/home-text-3.png" class="text" alt="">
                            </div>
                        </div>
                    </div>

                    <div id="prev" class="fas fa-chevron-left" onclick="prev()"></div>
                    <div id="next" class="fas fa-chevron-right" onclick="next()"></div>

                </section>

                <!-- home section ends -->

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

                    <h1 class="heading"> آخرین <span>محصولات</span> </h1>

                    <div class="box-container">

                        <div class="box">
                            <div class="icons">
                                <a href="#" class="fas fa-heart"></a>
                                <a href="#" class="fas fa-share"></a>
                                <a href="#" class="fas fa-eye"></a>
                            </div>
                            <img src="images/product-1.png" alt="">
                            <div class="content">
                                <h3>کفش های نایک</h3>
                                <div class="price">$120.99 <span>$150.99</span></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <a href="#" class="btn">افزودن به سبد خرید</a>
                            </div>
                        </div>

                        <div class="box">
                            <div class="icons">
                                <a href="#" class="fas fa-heart"></a>
                                <a href="#" class="fas fa-share"></a>
                                <a href="#" class="fas fa-eye"></a>
                            </div>
                            <img src="images/product-2.png" alt="">
                            &lt;<div class="content">
                                <h3>کفش های نایک</h3>
                                <div class="price">$120.99 <span>$150.99</span></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <a href="#" class="btn">افزودن به سبد خرید</a>
                            </div>
                        </div>

                        <div class="box">
                            <div class="icons">
                                <a href="#" class="fas fa-heart"></a>
                                <a href="#" class="fas fa-share"></a>
                                <a href="#" class="fas fa-eye"></a>
                            </div>
                            <img src="images/product-3.png" alt="">
                            <div class="content">
                                <h3>کفش های نایک</h3>
                                <div class="price">$120.99 <span>$150.99</span></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <a href="#" class="btn">افزودن به سبد خرید</a>
                            </div>
                        </div>

                        <div class="box">
                            <div class="icons">
                                <a href="#" class="fas fa-heart"></a>
                                <a href="#" class="fas fa-share"></a>
                                <a href="#" class="fas fa-eye"></a>
                            </div>
                            <img src="images/product-4.png" alt="">
                            <div class="content">
                                <h3>کفش های نایک</h3>
                                <div class="price">$120.99 <span>$150.99</span></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <a href="#" class="btn">افزودن به سبد خرید</a>
                            </div>
                        </div>

                        <div class="box">
                            <div class="icons">
                                <a href="#" class="fas fa-heart"></a>
                                <a href="#" class="fas fa-share"></a>
                                <a href="#" class="fas fa-eye"></a>
                            </div>
                            <img src="images/product-5.png" alt="">
                            <div class="content">
                                <h3>کفش های نایک</h3>
                                <div class="price">$120.99 <span>$150.99</span></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <a href="#" class="btn">افزودن به سبد خرید</a>
                            </div>
                        </div>

                        <div class="box">
                            <div class="icons">
                                <a href="#" class="fas fa-heart"></a>
                                <a href="#" class="fas fa-share"></a>
                                <a href="#" class="fas fa-eye"></a>
                            </div>
                            <img src="images/product-6.png" alt="">
                            <div class="content">
                                <h3>کفش های نایک</h3>
                                <div class="price">$120.99 <span>$150.99</span></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <a href="#" class="btn">افزودن به سبد خرید</a>
                            </div>
                        </div>

                    </div>

                </section>

                <!-- products section ends -->

                <!-- featured section starts  -->

                <section class="featured" id="featured">

                    <h1 class="heading"> محصولات <span>برجسته</span></h1>

                    <div class="row">
                        <div class="image-container">
                            <div class="small-image">
                                <img src="images/f-img-1.1.png" class="featured-image-1" alt="">
                                <img src="images/f-img-1.2.png" class="featured-image-1" alt="">
                                <img src="images/f-img-1.3.png" class="featured-image-1" alt="">
                                <img src="images/f-img-1.4.png" class="featured-image-1" alt="">
                            </div>
                            <div class="big-image">
                                <img src="images/f-img-1.1.png" class="big-image-1" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <h3>کفش جدید نایک ایرمکس</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است </p>
                            <div class="price">$80.99 <span>$120.99</span></div>
                            <a href="#" class="btn">افزودن به سبد خرید</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="image-container">
                            <div class="small-image">
                                <img src="images/f-img-2.1.png" class="featured-image-2" alt="">
                                <img src="images/f-img-2.2.png" class="featured-image-2" alt="">
                                <img src="images/f-img-2.3.png" class="featured-image-2" alt="">
                                <img src="images/f-img-2.4.png" class="featured-image-2" alt="">
                            </div>
                            <div class="big-image">
                                <img src="images/f-img-2.1.png" class="big-image-2" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <h3>کفش جدید نایک ایرمکس</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است </p>
                            <div class="price">$80.99 <span>$120.99</span></div>
                            <a href="#" class="btn">افزودن به سبد خرید</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="image-container">
                            <div class="small-image">
                                <img src="images/f-img-3.1.png" class="featured-image-3" alt="">
                                <img src="images/f-img-3.2.png" class="featured-image-3" alt="">
                                <img src="images/f-img-3.3.png" class="featured-image-3" alt="">
                                <img src="images/f-img-3.4.png" class="featured-image-3" alt="">
                            </div>
                            <div class="big-image">
                                <img src="images/f-img-3.1.png" class="big-image-3" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <h3>کفش جدید نایک ایرمکس</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است </p>
                            <div class="price">$80.99 <span>$120.99</span></div>
                            <a href="#" class="btn">افزودن به سبد خرید</a>
                        </div>
                    </div>

                </section>

                <!-- featured section ends -->

            @include('front.footer')


    </body>
</html>
