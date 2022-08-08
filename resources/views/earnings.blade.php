@extends('layouts.app')

@section('content')

    @if (isset($shops, $customers, $loads))
        @foreach ($shops as $shop)
            <h3>Shop Name: {{ $shop->shop_name }}</h3>

            @foreach ($shop->customers as $customer)
                <p>Customer ID: {{ $customer->id }}</p>

                @foreach ($customer->loads as $load)
                    <p>Load ID: {{ $load->id }}</p>

                    <?php
                    $cost = $customer->shops->price * $load->load_quantity;
                    $a = $load->fabcon * $customer->shops->fabcon;
                    $b = $load->detergent * $customer->shops->detergent;
                    $total = $cost + $a + $b;

                    ?>
                    <h3>Total: <?php echo $total ?></h3>

                @endforeach

            @endforeach
        <br>
        @endforeach
    @else
        <p>No information to display</p>
    @endif

@endsection
