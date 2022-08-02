@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                        @if ( Auth::user()->role == 1)
                            @if(isset($shops))
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="padding:10px">User ID </th>
                                            <th style="padding:10px">Shop ID </th>
                                            <th style="padding: 10px">Shop Image</th>
                                            <th style="padding:10px">Shop Name </th>
                                            <th style="padding:10px">Shop Address </th>
                                            <th style="padding:10px">Price </th>
                                            <th style="padding:10px">Category </th>
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
                                                <td>{{$shop->user_id}}</td>
                                                <td>{{$shop->id}}</td>
                                                @if ($shop->image == true)
                                                    <td><img src="{{ $shop->image }}" alt=""></td>
                                                @else
                                                    <td><img src="images/laundry-default.jpg" alt=""></td>
                                                @endif

                                                <td>{{$shop->shop_name}}</td>
                                                <td>{{$shop->shop_address}}</td>
                                                <td>Php {{$shop->price}}</td>
                                                <td>{{$shop->category}}</td>
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
                                <div class="small-container">
                                    <h2 class="title">Choose Shop</h2>

                                    <div class="row">
                                        @foreach ($shops as $shop)
                                        <div class="col-4">
                                            @if ($shop->image == true)
                                            <a href="{{ route('shops.show', $shop->id) }}"><img src="{{$shop->image}}" alt=""></a>

                                            @else
                                            <a href="{{ route('shops.show', $shop->id) }}"><img src="images/laundry-default.jpg" alt="">

                                            @endif
                                            <a href="/details"><h4>{{ $shop->shop_name }}</h4></a>

                                            <!-- Rating -->
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>

                                            <!-- Price -->
                                            <p>$50.00</p>
                                        </div>
                                        @endforeach

                                    </div>
                            @endif
                        @endif

                </div>
            </div>
        </div>
    </div>

@endsection
