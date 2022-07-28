{{-- To display my cart --}}

@extends('layouts.app')

@section('content')
    <h1 class="title">Your Transactions</h1>

    <div class="container">

        @if (isset($customers))
        @if(count($customers)>0)

        @foreach ($customers as $customer)
            <h3>Shop Name: {{ $customer->shops->shop_name }}</h3>
            <p>Customer Name: {{ $customer->name }}</p>
            <p>Customer Address: {{ $customer->address }}</p>
            <p>Contact Number: {{ $customer->contact_number }}</p>
            <br>


            <div class="col-4">

                @foreach ($customer->loads as $load)
                    <h3>Loads</h3>
                    <p>Load Quantity: {{ $load->load_quantity }}</p>
                    <p>Load Selector: {{ $load->load_selector }}</p>
                    <p>Color Type: {{ $load->color_type }}</p>
                    <p>Load Type: {{ $load->load_type }}</p>
                    <p>Additional Expenses: {{ $load->additional_expenses }}</p>
                    <p>Description: {{ $load->description }}</p>
                    <p>Status: {{ $load->status }}</p>
                    <a href="{{ route('loads.index')}}" class="btn">Laundry received</a>
                @endforeach
                </div>

        @endforeach


        @else
            <p>No information to display</p>
        @endif
        @endif

    </div>
@endsection
