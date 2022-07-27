@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Name : {{ $shops->shop_name }}</h1>
        <h2>Address : {{ $shops->shop_address }}</h2>
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
