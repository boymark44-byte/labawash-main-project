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

                    @if ($load->receive == true)
                        <h3>Loads</h3>
                        <p>Load Quantity: {{ $load->load_quantity }}</p>
                        <p>Load Selector: {{ $load->load_selector }}</p>
                        <p>Color Type: {{ $load->color_type }}</p>
                        <p>Load Type: {{ $load->load_type }}</p>
                        <p>Fabcon: {{ $load->fabcon }}</p>
                        <p>Detergent: {{ $load->detergent }}</p>
                        <p>Description: {{ $load->description }}</p>
                        <p>Status: {{ $load->status }}</p>
                        <br>

                        <h3>Expenses Breakdown</h3>
                        <?php
                        $cost = (int)$customer->shops->price * $load->load_quantity;
                        $a = (int)$load->fabcon * $customer->shops->fabcon;
                        $b = (int)$load->detergent * $customer->shops->detergent;
                        $total = $cost + $a + $b;
                        ?>
                        <p>Cost: <?php echo $cost ?></p>
                        <p>Fabcon Expenses: <?php echo $a ?></p>
                        <p> Detergent Expenses: <?php echo $b ?></p>
                        <h3>Total: <?php echo $total ?></h3>
                        <a href="{{ route('receive', $load->id)}}" class="btn">Laundry received</a>
                    @else
                        <p>Add a comment for your transaction with {{ $customer->shops->shop_name }}</p>
                        <a href="{{ route('comment.show', $customer->shops->id)}}" class="btn">Add Comment</a>
                    @endif
                @endforeach
            </div>
            @endforeach

        @else
            <p>No information to display</p>
        @endif
        @endif
    </div>
@endsection
