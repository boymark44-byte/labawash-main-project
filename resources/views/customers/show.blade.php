@extends('layouts.app')
@section('content')

<div class>
    <div>
        <h3>Form ID: {{$customers->id}}}</h3>
        <h3>User ID: {{$customers->user_id}}}</h3>
        <h3>Name: {{$customers->name}}}</h3>
        <h3>Address: {{$customers->address}}}</h3>
        <h3>Contact Number: {{$customers->contact_number}}}</h3>


    </div>
</div>
@endsection
