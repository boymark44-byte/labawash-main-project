@extends('layouts.app')
@section('content')
<head>

</head>
<div class="container">
    <form class="" method ="POST" action="/update/{{$shop[0]->id}}">
        @csrf
            @method('PUT')
                <label>Student Name</label>
                <input type="text" name="shop_name" value="{{$shop[0]->shop_name}}" id="shop_name"><</br>
                    {{-- @error('shop_name') --}}
                        {{-- <div class="form-error">
                            {{$message}}
                        </div>
                    @enderror --}}
                <label>Student Address</label>
                <input type="text" name="shop_address" value="{{$shop[0]->shop_address}}" id="shop_address"></br>
                    {{-- @error('shop_address')
                        <div class="form-error">
                            {{$message}}
                        </div>
                    @enderror --}}
                <label>Description</label>
                <input type="text" name="description" value="{{$shop[0]->description}}" id="description"></br>
                    {{-- @error('description')
                        <div class="form-error">
                            {{$message}}
                        </div>
                    @enderror --}}

                <button> Submit </button>
@endsection
