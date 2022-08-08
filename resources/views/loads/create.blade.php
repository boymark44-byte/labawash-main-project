@extends('layouts.app')

@section('content')
<head>

</head>
    <div class="container">
        <div class="row justify-content-center" >
            <form method ="POST" action="{{route('loads.store')}}">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @csrf
                <input type="hidden" name="customers_id" value="{{ $customers_id }}">
                <br>
                <label>Load Quantity</label>
                <input type="text" name="load_quantity" value="{{old('load_quantity')}}">
                    @error('load_quantity')
                        <div class="form-error">{{$message}}</div>
                    @enderror
                <br>
                <br>
                <label>Load Selector</label>
                <input type="text" name="load_selector" value="{{old('load_selector')}}">
                    @error('load_selector')
                    <div class="form-error">{{$message}}</div>
                    @enderror
                <br>
                <br>
                <label>Color Type</label>
                <input type="text" name="color_type" value="{{old('color_type')}}">
                    @error('color_type')
                    <div class="form-error">{{$message}}</div>
                    @enderror
                <br>
                <br>
                <label>Load Type</label>
                <input type="text" name="load_type" value="{{old('load_type')}}">
                    @error('load_type')
                    <div class="form-error">{{$message}}</div>
                    @enderror
                <br>
                <br>
                <label>How many fabcon</label>
                <input type="text" name="fabcon" placeholder="Php10/fabcon" value="{{old('fabcon')}}">
                    @error('fabcon')
                    <div class="form-error">{{$message}}</div>
                    @enderror
                <br>
                <br>
                <label>How many detergent</label>
                <input type="text" name="detergent" placeholder="Php10/detergent" value="{{old('detergent')}}">
                    @error('detergent')
                    <div class="form-error">{{$message}}</div>
                    @enderror
                <br>
                <br>
                <label>Description</label>
                <input type="text" name="description" value="{{old('description')}}">
                    @error('description')
                    <div class="form-error">{{$message}}</div>
                    @enderror
                <br>
                <br>
                        <button class="btn"> Submit </button>
            </form>
        </div>
        <a href="{{ route('customertransaction', $customers_id) }}" class="btn">Back</a>
    </div>
@endsection
