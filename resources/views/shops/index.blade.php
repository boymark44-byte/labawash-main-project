@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Shop') }}</div>

                        @if ( Auth::user()->role == 1)
                            @if(isset($shops))
                                <table class="table table-hover">
                                    <thead>
                                        <tr>

                                            <th>Shop ID |</th>
                                            <th>Shop Name |</th>
                                            <th>Shop Address |</th>
                                            <th>Description |</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($shops)>0)
                                            @foreach($shops as $shop)
                                                <tr>
                                                <td>{{$shop->id}}</td>
                                                <td>{{$shop->shop_name}}</td>
                                                <td>{{$shop->shop_address}}</td>
                                                <td>{{$shop->description}}</td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr><td>No Shop to display</td></tr>
                                        @endif
                                    </tbody>
                                </table>
                                <button class="btn"><a href ="{{route('shops.create')}}">Add Shop</a></button>
                            @endif


                        @else
                            @if(isset($shops))
                                <table class="table table-hover">
                                    <thead>
                                        <tr>

                                            <th>Shop ID |</th>
                                            <th>Shop Name |</th>
                                            <th>Shop Address |</th>
                                            <th>Description |</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($shops)>0)
                                            @foreach($shops as $shop)
                                                <tr>
                                                <td>{{$shop->id}}</td>
                                                <td><a href="{{route('customers.create')}}">{{$shop->shop_name}}</td>
                                                <td>{{$shop->shop_address}}</td>
                                                <td>{{$shop->description}}</td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr><td>No Shop to display</td></tr>
                                        @endif
                                    </tbody>
                                </table>
                            @endif
                        @endif
                </div>
            </div>
        </div>
    </div>

@endsection
