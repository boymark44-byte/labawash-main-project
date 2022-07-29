{{-- Show shop info after clicking logo --}}

@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($shops->image == true)
            <h1> Logo<img src="{{ $shops->image }}"></h1>
        @else
            <h1> No Logo <img src="../images/laundry-default.jpg" alt=""></h1>
        @endif
        <h1>Name : {{ $shops->shop_name }}</h1>
        <h2>Address : {{ $shops->shop_address }}</h2>
        <h3>Price : {{ $shops->price}}</h3>
        <h3>Description : {{ $shops->description }}</h3>

        @auth
        <label>Magpa laundry ka?</label>
        <a href="{{route('customers.show', ['customer' => $shops->id])}}">Yes</a>
        <a href="/">No</a>
        @else
        <label>Magpa laundry ka?</label>
        <a href="/login">Yes</a>
        <a href="/">No</a>
        @endauth

    </div>
@endsection
