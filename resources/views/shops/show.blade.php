@extends('layouts.app')
@section('content')

        <h5>Name : {{ $shops->shop_name }}</h5>
        <p>Address : {{ $shops->shop_address }}</p>
        <p>Description : {{ $shops->description }}</p>

@endsection
