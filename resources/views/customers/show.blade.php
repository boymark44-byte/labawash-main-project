@extends('layouts.app')
@section('content')

             Name : {{ $customers->name }}
        <p>Address : {{ $customers->address }}</p>
        <p> Mobile : {{ $customers->contact_number }}</p>

@endsection
