@extends('layouts.app')

@section('content')

    <div class="container">

         @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (isset($user, $shops))
            <table class="table table-hover">
                @foreach ($user as $item)
                    <p>Owner Name: {{ $item->name }}</p>

                    <thead>
                        <tr>
                            <th style="padding:10px">ID </th>
                            <th style="padding:10px">Shop Image </th>
                            <th style="padding:10px">Shop Name </th>
                            <th style="padding:10px">Shop Address </th>
                            <th style="padding:10px">Description </th>
                            <th style="padding:10px">Action </th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($item->shops as $shop)
                    <tr>
                        <td>{{$shop->id}}</td>
                        @if ($shop->image == true)
                            <td><a href="{{ route('display', $shop->id) }}"><img src="{{ $shop->image }}" alt=""></a></td>
                        @else
                            <td><a href="{{ route('display', $shop->id) }}"><img src="../images/laundry-default.jpg" style="width: 150px" alt=""></a></td>
                        @endif
                        <td>{{$shop->shop_name}}</td>
                        <td>{{$shop->shop_address}}</td>
                        <td>{{$shop->description}}</td>
                        <td>
                            <a class="btn" href="{{route('shops.edit', $shop->id)}}">Edit</a>
                        <td>
                    </tr>

                    </tbody>
                    @endforeach
                @endforeach
            </table>
        @endif
    </div>
@endsection
