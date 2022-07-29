@extends('layouts.app')

@section('content')
<head>

</head>

    <form enctype="multipart/form-data" method ="POST" action="{{route('shops.store')}}">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
                @endif
                @csrf

                <label>Shop Name</label></br>
                <input type="text" name="shop_name" placeholder= "Type Shop Name..." value="{{old('shop_name')}}"></br>
                    @error('shop_name')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror

                    <label>Shop Address</label></br>
                    <input type="text" name="shop_address" placeholder= "Type Shop Address..." value="{{old('shop_address')}}"></br>
                    @error('shop_address')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror

                    <label>Price</label></br>
                    <input type="text" name="price" placeholder= "Price Per Load/Per Kg" value="{{old('price')}}"></br>
                    @error('price')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror

                    <label>Description</label></br>
                    <input type="text" name="description" placeholder= "Description..." value="{{old('description')}}"></br>
                    @error('description')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror

                    <label>Photo</label></br>
                    <input type="file" name="image" placeholder= "Insert photo..." value="{{old('image')}}"></br>
                    @error('image')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror

                <button class="btn"> Submit </button>
    </form>
@endsection
