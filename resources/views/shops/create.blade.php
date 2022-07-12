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
                <textarea name="shop_name" placeholder= "Enter Shop Name..." value="{{old('shop_name')}}"></textarea>
                    @error('shop_name')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror
                    <br>
                    <br>
                <textarea name="shop_address" placeholder= "Type Shop Address..." value="{{old('shop_address')}}"></textarea>
                    @error('shop_address')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror
                    <br>
                    <br>
                <textarea name="description" placeholder= "Description..." value="{{old('description')}}"></textarea>
                    @error('description')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror
                    <br>
                <button> Submit </button>
    </form>
@endsection
