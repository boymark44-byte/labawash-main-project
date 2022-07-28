@extends('layouts.app')
@section('content')
@if ($shops->image == true)
<h1> Logo<img src="{{ $shops->image }}"></h1>
@else
<h1> No Logo <img src="../images/laundry-default.jpg" alt=""></h1>
@endif
             <h5>Name : {{ $shops->shop_name }}</h5>
        <p>Address : {{ $shops->shop_address }}</p>
        <p> Mobile : {{ $shops->description }}</p>

@endsection
