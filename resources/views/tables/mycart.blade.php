{{-- To display my cart --}}

@extends('layouts.app')

@section('content')
    <h1>Your Information</h1>

    <div>
        @if (isset($customers))
        @if(count($customers)>0)
            @foreach ($customers as $item)
                <p>Shop ID: {{ $item->shop_id }}</p>
                <p>Customer: {{ $item->address }}</p>
                <p>Contact Number: {{ $item->contact_number }}</p>

                @foreach ($item->loads as $load)
                    <p>Load Quantity: {{ $load->load_quantity }}</p>
                    <p>Load Selector: {{ $load->load_selector }}</p>
                    <p>Color Type: {{ $load->color_type }}</p>
                    <p>Load Type: {{ $load->load_type }}</p>
                    <p>Additional Expenses: {{ $load->additional_expenses }}</p>
                    <p>Description: {{ $load->description }}</p>
                    <p>Status: {{ $load->status }}</p>
                @endforeach

                <br>
            @endforeach
        @endif
        @endif

    </div>
@endsection
