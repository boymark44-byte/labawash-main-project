@extends('layouts.app')

@section('content')
<head>

</head>

    <form class="form bg-white p-6 border-1" method ="POST" action="{{route('shops.store')}}">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
                @endif
                @csrf
                <br>
                <label>Shop Name</label></br>
                <input type="text" name="shop_name" placeholder= "Type Shop Name..." value="{{old('shop_name')}}"></br>
                    @error('shop_name')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror
                    <br>
                    <br>
                    <label>Shop Address</label></br>
                    <input type="text" name="shop_address" placeholder= "Type Shop Address..." value="{{old('shop_address')}}"></br>
                    @error('shop_address')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror
                    <br>
                    <br>
                    <label>Description</label></br>
                    <input type="text" name="description" placeholder= "Description..." value="{{old('description')}}"></br>
                    @error('description')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror
                    <br>
                <button class="btn"> Submit </button>
    </form>
@endsection
