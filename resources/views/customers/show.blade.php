@extends('layouts.app')
@section('content')
    <div class>
        <div>
            <h3>Form ID: {{$customer->id}}</h3>
            <h3>User ID: {{$customer->user_id}}>/h3>
            <h3>Name: {{$customer->name}}</h3>
            <h3>Address: {{$customer->address}}</h3>
            <h3>Contact Number: {{$customer->contact_number}}</h3>


        </div>
    </div>
@endsection
