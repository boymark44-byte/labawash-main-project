{{-- Show shop info after clicking logo --}}

@extends('layouts.app')
@section('content')

        <h5>Name : {{ $shops->shop_name }}</h5>
        <p>Address : {{ $shops->shop_address }}</p>
        <p>Description : {{ $shops->description }}</p>

        @auth
            <label>Magpa laundry ka?</label>
            <a href="{{ route('customers.show', ['customer' => $shops->id]) }}">Yes</a>
            <a href="/">No</a>
        @else
            <label>Magpa laundry ka?</label>
            <a href="/login">Yes</a>
            <a href="/">No</a>
        @endauth
@endsection
