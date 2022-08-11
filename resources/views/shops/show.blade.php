{{-- Show shop info after clicking logo --}}

@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-4">
                {{-- check to display logo --}}
                @if ($shops->image == true)
                    <img src="{{ $shops->image }}">
                @else
                    <img src="../images/laundry-default.jpg" alt="">
                @endif

            </div>
        </div>

        <h1>Name : {{ $shops->shop_name }}</h1>
        <h2>Address : {{ $shops->shop_address }}</h2>
        <h3>Price : {{ $shops->price}}</h3>
        <h3>Description : {{ $shops->description }}</h3>
        {{-- check roles --}}

        @auth
            <label>Magpa laundry ka?</label>
            <a href="{{route('customers.show', ['customer' => $shops->id])}}" class="btn">Yes</a>
            <a href="/" class="btn">No</a>

            <h2 class="title">Testimonials</h2>
            <div class="testimonial">
                <div class="row">

                    @foreach ($comments as $comment)
                    <!-- 1st User -->
                    <div class="col-3">

                            <i class="fa fa-quote-left"></i>

                            <!-- Testimony Text -->
                            <p>{{$comment->comment_body}}</p>

                            <!-- User Rating -->
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>

                            </div>

                            <!-- Name of the User -->
                            <h3>{{$comment->user->username}}</h3>
                    </div>
                    @endforeach
                </div>
            </div>

        @else
            <label>Magpa laundry ka?</label>
            <a href="/login" class="btn">Yes</a>
            <a href="/" class="btn">No</a>


            <h2 class="title">Testimonials</h2>
            <div class="testimonial">
                <div class="row">

                    @foreach ($comments as $comment)
                    <!-- 1st User -->
                    <div class="col-3">

                            <i class="fa fa-quote-left"></i>

                            <!-- Testimony Text -->
                            <p>{{$comment->comment_body}}</p>

                            <!-- User Rating -->
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>

                            </div>

                            <!-- Name of the User -->
                            <h3>{{$comment->user->username}}</h3>
                    </div>
                    @endforeach
                </div>
            </div>
        @endauth
    </div>

@endsection
