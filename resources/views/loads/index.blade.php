{{-- To display customer and load information after fill up --}}

@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Your Information</h1>
        @if (isset($customers, $loads))
            @foreach ($customers as $item)
                <p>Name: {{ $item->name }}</p>
                <p>Address: {{ $item->address }}</p>
                <p>Contact Number: {{ $item->contact_number }}</p>
                <p>Shop: {{ $item->shop_id }}</p>

                <h1>Your Loads</h1>
                @foreach ($item->loads as $load)
                    <p>Load Quantity: {{ $load->load_quantity }}</p>
                    <p>Load Selector: {{ $load->load_selector }}</p>
                    <p>Color Type: {{ $load->color_type }}</p>
                    <p>Load Type: {{ $load->load_type }}</p>
                    <p>How many fabon: {{ $load->fabcon }}</p>
                    <p>How many detergent: {{ $load->detergent }}</p>
                    <p>Description: {{ $load->description }}</p>
                    <p>Status: {{ $load->status }}</p>
                    <br>
                @endforeach

            @endforeach
        @endif
            <label>Would you like to add another load?</label>
            <a href="{{ route('loads.show', ['load'=>$index->id]) }}" class="btn">Yes</a>
            <a href="{{ route('mycart') }}" class="btn">No</a>
@endsection
