@extends('layouts.app')

@section('content')
<head>

</head>

    <form enctype="multipart/form-data" method ="POST" action="{{route('expenses.store')}}">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
                @endif
                @csrf
                <input type="hidden" name="loads_id" value="{{ $loads_id }}">
                <label>Cost</label></br>
                <input type="text" name="cost" placeholder= "Cost..." value="{{old('cost')}}"></br>
                    @error('cost')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror

                    <label>Fabcon Expenses</label></br>
                    <input type="text" name="fabcon" placeholder= "Fabcon Expenses..." value="{{old('fabcon')}}"></br>
                    @error('fabcon')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror

                    <label>Detergent Expenses</label></br>
                    <input type="text" name="detergent" placeholder= "Detergent Expenses..." value="{{old('detergent')}}"></br>
                    @error('detergent')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror

                    <label>Total</label></br>
                    <input type="text" name="total" placeholder= "Total" value="{{old('total')}}"></br>
                    @error('total')
                      <div class="form-error">
                          {{$message}}
                      </div>
                    @enderror
                <button class="btn"> Submit </button>
    </form>
@endsection
