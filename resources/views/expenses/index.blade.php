@extends('layouts.app')

@section('content')
    <h1>Breakdown of Expenses</h1>
    <div>
        @if (isset($loads, $expenses))
            @foreach ($loads as $item)
                <p>Load ID: {{ $item->id }}</p>


                <p>Cost: {{ $item->expenses->cost }}</p>
                <p>Fabcon: {{ $item->expenses->fabcon }}</p>
                <p>Detergent: {{ $item->expenses->detergent }}</p>
                <p>Total: {{$item->expenses->total }}</p>

            @endforeach

        @endif
        <button class="btn"><a href="{{ route('display', $id = Auth::id()) }}">Back</a></button>
    </div>
@endsection