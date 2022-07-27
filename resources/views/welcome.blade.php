@extends('layouts.app')

@section('content')

<div class="header">
            <!-- Row -->
            <div class="row">
                <div class="col-2">
                    <h1>Choose your Laundry Shops Here!</h1>
                    <p>
                        Find a suitable and cheaper laundry shops within the area.
                    </p>

                    <!-- Button: Explore now! -->
                    @auth
                    <a href="{{route('shops.index')}}" class="btn">Find Laundry Shops &#8594;</a>
                    @else
                    <a href="/login" class="btn">Find Laundry Shops &#8594;</a>
                    @endauth

                </div>

                <!-- Image -->
                <div class="col-2">
                    <img src="images/woman-landing.png" alt="">
                </div>

            </div>
        </div>
    <!-- The Featured Category Section -->
    <div class="categories">
        <div class="small-container">

            <div class="row">
                <div class="col-3">
                    <h2 class="title">Coin Based</h2>
                    <img src="images/coin-based-shop.jpg" alt="">
                </div>
                <div class="col-3">
                    <h2 class="title">Drop Off</h2>
                    <img src="images/drop-off.jpg" alt="">
                </div>
                <div class="col-3">
                    <h2 class="title">Drop Off and Deliver</h2>
                    <img src="images/deliver.jpg" alt="">
                </div>
            </div>
        </div>
    </div>


    <!-- The Featured Laundry Shops -->
    <div class="small-container">
        <h2 class="title">Featured Laundry Shops</h2>

        <div class="row">
            @foreach ($images as $item)
            <div class="col-4">
                <a href="{{ route('shops.show', $item->id) }}"><img src="{{$item->image}}" alt=""></a>
                <a href="/details"><h4>{{ $item->shop_name }}</h4></a>

                <!-- Rating -->
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>

                <!-- Price -->
                <p>$50.00</p>
            </div>
            @endforeach
            {{-- <!-- Product 1 -->
            <div class="col-4">
                <a href="/details/1"><img src="https://res.cloudinary.com/dzk7k6owk/image/upload/v1658719348/agthbif8pcjbzack6c4y.jpg" alt=""></a>
                <a href="/details"><h4>A Plus Cleaners</h4></a>

                <!-- Rating -->
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>

                <!-- Price -->
                <p>$50.00</p>
            </div>

            <!-- Product 2 -->
            <div class="col-4">
                <a href="/details/2"><img src="https://res.cloudinary.com/dzk7k6owk/image/upload/v1658719377/p31ydy625nwlegqwem98.jpg" alt=""></a>
                <h4>Ace Laundromat</h4>

                <!-- Rating -->
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>

                <!-- Price -->
                <p>$51.00</p>
            </div>

            <!-- Product 3 -->
            <div class="col-4">
                <a href="/details/3"><img src="images/laundry-shop-6.jpg" alt=""></a>
                <h4>All Clean Laundry</h4>

                <!-- Rating -->
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>

                <!-- Price -->
                <p>$52.00</p>
            </div>

            <!-- Product 4 -->
            <div class="col-4">
                <a href="/details/4"><img src="images/laundry-shop-4.jpg" alt=""></a>
                <h4>Angels Home</h4>

                <!-- Rating -->
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>

                <!-- Price -->
                <p>$53.00</p>
            </div> --}}
        </div>


        <!-- Latest Products Section -->
        <h2 class="title">Newly Added Laundry Shops</h2>
        <div class="row">

            <!-- Product 5 -->
            <div class="col-4">
                <a href="/details/5"><img src="images/laundry-shop-1.jpg" alt=""></a>
                <h4>Best Coin Laundry</h4>

                <!-- Rating -->
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>

                <!-- Price -->
                <p>$50.00</p>
            </div>

            <!-- Product 6 -->
            <div class="col-4">
                <a href="/details/6"><img src="images/laundry-shop-2.jpg" alt=""></a>
                <h4>Bright and Beautiful Cleaning</h4>

                <!-- Rating -->
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>

                <!-- Price -->
                <p>$51.00</p>
            </div>

            <!-- Product 7 -->
            <div class="col-4">
                <a href="/details/7"><img src="images/laundry-shop-3.jpg" alt=""></a>
                <h4>City Limits Laundry</h4>

                <!-- Rating -->
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>

                <!-- Price -->
                <p>$52.00</p>
            </div>

            <!-- Product 8 -->
            <div class="col-4">
                <a href="/details/8"><img src="images/laundry-shop-4.jpg" alt=""></a>
                <h4>Clean Freedom</h4>

                <!-- Rating -->
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>

                <!-- Price -->
                <p>$53.00</p>
            </div>
        </div>

        <div class="row">

            <!-- Product 9 -->
            <div class="col-4">
                <a href="/details/9"><img src="images/laundry-shop-4.jpg" alt=""></a>
                <h4>Clean Sweep</h4>

                <!-- Rating -->
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>

                <!-- Price -->
                <p>$50.00</p>
            </div>

            <!-- Product 10 -->
            <div class="col-4">
                <a href="/details/10"><img src="images/laundry-shop-3.jpg" alt=""></a>
                <h4>COIN Less Laundry</h4>

                <!-- Rating -->
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>

                <!-- Price -->
                <p>$51.00</p>
            </div>

            <!-- Product 11 -->
            <div class="col-4">
                <a href="/details/11"><img src="images/laundry-shop-2.jpg" alt=""></a>
                <h4>Dirtbusters</h4>

                <!-- Rating -->
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>

                <!-- Price -->
                <p>$52.00</p>
            </div>

            <!-- Product 12 -->
            <div class="col-4">
                <a href="/details/12"><img src="images/laundry-shop-1.jpg" alt=""></a>
                <h4>Do Right Cleaning</h4>

                <!-- Rating -->
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>

                <!-- Price -->
                <p>$53.00</p>
            </div>
        </div>

    </div>


    <!--  Offer -->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                {{-- <div class="col-2">
                    <img src="" class="offer-img" alt="">
                </div> --}}
                <div class="col-2">
                    {{-- <p>Advertise Your Laundry Shop with us.</p> --}}
                    <h1>Advertise your Laundry Shop with us.</h1>
                    {{-- <small>

                    </small> --}}
                    @auth
                    <a href="{{route('shops.create')}}" class="btn">Inquire Now &#8594;</a>
                    @else
                    <a href="/login" class="btn">Inquire Now &#8594;</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>


    <!-- The Testimonial Section -->
    <div class="testimonial">
        <div class="small-container">
            <h2 class="title">Testimonials</h2>
            <div class="row">

                <!-- 1st User -->
                <div class="col-3">

                    <i class="fa fa-quote-left"></i>

                    <!-- Testimony Text -->
                    <p>Lorem Ipsum is simply dummy text of the printing
                    and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever</p>

                    <!-- User Rating -->
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>

                    </div>

                    <!-- Image -->
                    <img src="images/user-1.png" alt="">

                    <!-- Name of the User -->
                    <h3>Sean Parker</h3>
                </div>

                <!-- 2nd User -->
                <div class="col-3">

                    <i class="fa fa-quote-left"></i>

                    <!-- Testimony Text -->
                    <p>Lorem Ipsum is simply dummy text of the printing
                    and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever</p>

                    <!-- User Rating -->
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>

                    <!-- Image -->
                    <img src="images/user-2.png" alt="">

                    <!-- Name of the User -->
                    <h3>Mike Smith</h3>
                </div>

                <!-- 3rd User -->
                <div class="col-3">

                    <i class="fa fa-quote-left"></i>

                    <!-- Testimony Text -->
                    <p>Lorem Ipsum is simply dummy text of the printing
                    and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever</p>

                    <!-- User Rating -->
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>

                    </div>

                    <!-- Image -->
                    <img src="images/user-3.png" alt="">

                    <!-- Name of the User -->
                    <h3>Mabel Joe</h3>
                </div>
            </div>
        </div>
    </div>


    <!-- The Brands Section -->
    <div class="brands">
        <div class="small-container">
            <div class="row">

                <!-- 1st Brand -->
                <div class="col-5">
                    <img src="images/ariel.png" alt="">
                </div>

                <!-- 2nd Brand -->
                <div class="col-5">
                    <img src="images/downy.png" alt="">
                </div>


                <!-- 3rd Brand -->
                <div class="col-5">
                    <img src="images/unilever-logo.png" alt="">
                </div>
            </div>
        </div>
    </div>


    <!-- The Footer Section -->
    <div class="footer">
        <div class="container">
            <div class="row">

                <!-- 1st Column -->
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p> Download for Android and IOS mobile phone. </p>

                    <!-- App Logo -->
                    <div class="app-logo">
                        <img src="images/play-store.png" alt="">
                        <img src="images/app-store.png" alt="">
                    </div>
                </div>


                <!-- 2nd Column -->
                <div class="footer-col-2">
                    <a href="/"><img src="images/logo.png" alt=""></a>
                    <p> Our Goal is to make Laundry Shops nearby accessible to all people. </p>
                </div>


                <!-- 3rd Column -->
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>


                <!-- 4th Column -->
                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <hr>
            <p class="copyright">Copyright 2022</p>

        </div>
    </div>


    <!-- JavaScript for Toggle Menu -->
    <script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";

            function menutoggle() {
                if(MenuItems.style.maxHeight == "0px")
                    {
                        MenuItems.style.maxHeight == "200px";
                    }
                else
                    {
                        MenuItems.style.maxHeight == "0px";
                    }
            }

    </script>

@endsection
