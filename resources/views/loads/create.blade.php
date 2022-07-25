@extends('layouts.app')

@section('content')
<head>

</head>

    <form class="form bg-white p-6 border-1" method ="POST" action="{{route('loads.store')}}">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @csrf
        <input type="hidden" name="customers_id" value="{{ $customers_id }}">
        <br>
            <textarea name="load_quantity" placeholder= "Load Quantity..." value="{{old('load_quantity')}}"></textarea>
            @error('load_quantity')
                <div class="form-error">{{$message}}</div>
            @enderror
        <br>
        <br>
            <textarea name="load_selector" placeholder= "Load Selector..." value="{{old('load_selector')}}"></textarea>
            @error('load_selector')
            <div class="form-error">{{$message}}</div>
            @enderror
        <br>
        <br>
            <textarea name="color_type" placeholder= "Color Type..." value="{{old('color_type')}}"></textarea>
            @error('color_type')
            <div class="form-error">{{$message}}</div>
            @enderror
        <br>
        <br>
            <textarea name="load_type" placeholder= "Load Type..." value="{{old('load_type')}}"></textarea>
            @error('load_type')
            <div class="form-error">{{$message}}</div>
            @enderror
        <br>
        <br>
            <textarea name="additional_expenses" placeholder= "Additional Expenses..." value="{{old('additional_expenses')}}"></textarea>
            @error('additional_expenses')
            <div class="form-error">{{$message}}</div>
            @enderror
        <br>
        <br>
            <textarea name="description" placeholder= "Description..." value="{{old('description')}}"></textarea>
            @error('description')
            <div class="form-error">{{$message}}</div>
            @enderror
        <br>
        <br>
                <button> Submit </button>
    </form>
@endsection
