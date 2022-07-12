@extends('layouts.app')

@section('content')
<head>

</head>

    <form class="form bg-white p-6 border-1" method ="POST" action="{{route('customers.store')}}">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
                @endif
                @csrf
                <br>
                <textarea name="name" placeholder= "Type Your Name..." value="{{old('name')}}"></textarea>
                    @error('name')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror
                    <br>
                    <br>
                <textarea name="address" placeholder= "Type Your Address..." value="{{old('address')}}"></textarea>
                    @error('address')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror
                    <br>
                    <br>
                <textarea name="contact_number" placeholder= "Type Your Contact Number..." value="{{old('contact_number')}}"></textarea>
                    @error('contact_number')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror
                    <br>
                <button> Submit </button>
    </form>
@endsection
