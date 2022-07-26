@extends('layouts.app')
@section('content')

        {{-- Ibutang sa tunga ang image pls --}}
        
        <h1>Logo</h1>
        @if ($shops->image == true)
            <img src="{{ $shops->image }}" alt="">
        @else
            <img src="images/laundry-default.jpg" alt="">
        @endif

        <h5>Name : {{ $shops->shop_name }}</h5>
        <p>Address : {{ $shops->shop_address }}</p>
        <p>Description : {{ $shops->description }}</p>

@endsection
