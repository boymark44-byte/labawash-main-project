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

                    <label>Addition Expenses</label></br>
                    <input type="text" name="additional_expenses" placeholder= "Additional Expenses..." value="{{old('additional_expenses')}}"></br>
                    @error('additional_expenses')
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
