@extends('layouts.app')

@section('content')

    @if (isset($shops, $customers))
        <table class="table table-hover">
            @foreach ($shops as $item)
                <p>Shop Name: {{ $item->shop_name }}</p>

                <thead>
                    <tr>
                        <th style="padding:10px">Shop ID </th>
                        <th style="padding:10px">Customer Name </th>
                        <th style="padding:10px">Customer Address </th>
                        <th style="padding:10px">Contact Number </th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($item->customers as $customer)
                <tr>
                    <td>{{$customer->shop_id}}</td></a>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->address}}</td>
                    <td>{{$customer->contact_number}}</td>
                </tr>

                </tbody>
                @endforeach
            @endforeach
        </table>
    @endif
</div>
@endsection
