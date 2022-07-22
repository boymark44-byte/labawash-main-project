@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Choose Shop') }}</div>

                        @if ( Auth::user()->role == 1)
                            @if(isset($shops))
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="padding:10px">Shop ID </th>
                                            <th style="padding:10px">Shop Name </th>
                                            <th style="padding:10px">Shop Address </th>
                                            <th style="padding:10px">Description </th>
                                            <th style="padding:10px">Status </th>
                                            <th style="padding:10px">Approve </th>
                                            <th style="padding:10px">Cancel </th>

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
                                                <td>{{$shop->approve}}</td>

                                                <td>
                                                    <a class="" href="{{route('accept', $shop->id)}}">Approved</a>
                                                </td>
                                                <td>
                                                    <a class="" href="{{route('cancel', $shop->id)}}">Canceled</a>
                                                </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr><td>No Shop to display</td></tr>
                                        @endif
                                    </tbody>
                                </table>
                            @endif
                        @else
                            @if(isset($shops))
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="padding:10px">Shop Name </th>
                                            <th style="padding:10px">Shop Address </th>
                                            <th style="padding:10px">Description </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($shops)>0)
                                            @foreach($shops as $shop)
                                                <tr>
                                                <td><a href="{{route('customers.show', ['customer' => $shop->id])}}">{{$shop->shop_name}}</td>
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
