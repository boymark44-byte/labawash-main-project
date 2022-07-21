@extends('layouts.app')

@section('content')
<head>

</head>

    <form method ="POST" action="{{route('customers.store')}}">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
                @endif
                @csrf
                <br>
                {{-- <select name="shop_id" id="shop_id">
                    @foreach ($shop as $item)
                        <option value="{{ $item->id }}">{{ $item->shop_name }}</option>
                    @endforeach
                </select> --}}
                <input type="hidden" name="shop_id" value="{{ $shop_id }}">
                <label>Name</label></br>
                <input type="text" name="name" placeholder= "Type Your Name..." value="{{old('name')}}"></br>
                    @error('name')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror
                    <br>
                    <br>
                <label>Address</label></br>
                <input type="text" name="address" placeholder= "Type Your Address..." value="{{old('address')}}"></br>
                    @error('address')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror
                    <br>
                    <br>
                <label>Contact Number</label></br>
                <input type="text" name="contact_number" placeholder= "Type Your Contact Number..." value="{{old('contact_number')}}"></br>
                    @error('contact_number')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror
                    <br>
                <button class="btn"> Submit </button>
    </form>
@endsection
