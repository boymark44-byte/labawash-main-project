@extends('layouts.app')

@section('content')
    <h1>Your Information</h1>

    <div>
        @if (isset($customers, $loads))
            @foreach ($customers as $item)
                <p>Name: {{ $item->name }}</p>
                <p>Address: {{ $item->address }}</p>
                <p>Contact Number: {{ $item->contact_number }}</p>
            @endforeach

            <h1>Your Loads</h1>

            @foreach ($loads as $item)
                <p>Load Quantity: {{ $item->load_quantity }}</p>
                <p>Load Selector: {{ $item->load_selector }}</p>
                <p>Color Type: {{ $item->color_type }}</p>
                <p>Load Type: {{ $item->load_type }}</p>
                <p>Additional Expenses: {{ $item->additional_expenses }}</p>
                <p>Description: {{ $item->description }}</p>
                <p>Status: {{ $item->status }}</p>
                <br>
            @endforeach


            <label>Would you like to add another load?</label>
            <a href="{{ route('loads.show', ['load'=>$index->id]) }}">Yes</a>
            <a href="{{ route('shops.index') }}">No</a>
        @endif

    </div>
@endsection
