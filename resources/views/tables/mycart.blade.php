{{-- To display my cart --}}

@extends('layouts.app')

@section('content')
    <h1>Your Information</h1>

    <div>
        @if (isset($customers))
        @if(count($customers)>0)
            @foreach ($customers as $customer)

                <p>Customer: {{ $customer->address }}</p>
                <p>Contact Number: {{ $customer->contact_number }}</p>
                <p>Shop Name: {{ $customer->shops->shop_name }}</p>

                @foreach ($customer->loads as $load)
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
        @else
        <p>No information to display</p>
        @endif
        @endif

    </div>
@endsection
