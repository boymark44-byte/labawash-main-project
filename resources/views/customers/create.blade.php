@extends('layouts.app')

@section('content')
<head>

</head>
    <div class="container">
        <form method ="POST" action="{{route('customers.store')}}">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @csrf
                <input type="hidden" name="shop_id" value="{{ $shop_id }}">
                <label>Name</label></br>
                <input type="text" name="name" placeholder= "Type Your Name..." value="{{old('name')}}"></br>
                    @error('name')
                        <div class="form-error">
                            {{$message}}
                        </div>
                    @enderror

                <label>Address</label></br>
                <input type="text" name="address" placeholder= "Type Your Address..." value="{{old('address')}}"></br>
                    @error('address')
                        <div class="form-error">
                            {{$message}}
                        </div>
                    @enderror

                <label>Contact Number</label></br>
                <input type="text" name="contact_number" placeholder= "Type Your Contact Number..." value="{{old('contact_number')}}"></br>
                    @error('contact_number')
                        <div class="form-error">
                            {{$message}}
                        </div>
                    @enderror

                <button class="btn"> Submit </button>
        </form>
    </div>
@endsection
