{{-- Show shop info after clicking logo --}}

@extends('layouts.app')
@section('content')

    <div class="small-container">
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
        <h3>Description : {{ $shops->description }}</h3>

        {{-- check roles --}}
        @auth
            <label>Magpa laundry ka?</label>
            <a href="{{route('customers.show', ['customer' => $shops->id])}}" class="btn">Yes</a>
            <a href="/" class="btn">No</a>
        @else
            <label>Magpa laundry ka?</label>
            <a href="/login" class="btn">Yes</a>
            <a href="/" class="btn">No</a>
        @endauth
    </div>

@endsection
