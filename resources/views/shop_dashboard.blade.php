@extends('layouts.app')

@section('content')

    <div class="container">


         @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
                <form class="form bg-white p-6 border-1" method ="GET" action="{{route('shop_dashboard')}}">
                    <textarea name="query" cols="50" placeholder= "Search shop ID..."></textarea>
                        @error('query')
                            <div class="form-error">
                                {{$message}}
                            </div>
                        @enderror
                            <button class="btn"> Submit </button>
                </form>
                        @if(isset($shops))
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="padding:10px">Shop Image </th>
                                    <th style="padding:10px">Shop Name </th>
                                    <th style="padding:10px">Shop Address </th>
                                    <th style="padding:10px">Description </th>
                                    <th style="padding:10px">Action </th>

                                </tr>
                            </thead>
                                <tbody>
                                    @if(count($shops)>0)
                                        @foreach($shops as $shop)
                                            <tr>
                                            @if ($shop->image == true)
                                                <td><img src="{{ $shop->image }}" alt=""></td>
                                            @else
                                                <td><img src="images/laundry-default.jpg" style="width: 150px" alt=""></td>
                                            @endif
                                            <td>{{$shop->shop_name}}</td>
                                            <td>{{$shop->shop_address}}</td>
                                            <td>{{$shop->description}}</td>
                                            <td>
                                                <a class="" href="{{route('shops.edit', $shop->id)}}">Edit</a>
                                            <td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr><td>No Shop to display</td></tr>
                                    @endif
                                </tbody>
                            </table>
                        @endif

                    @if(isset($customers))
                        <table class="table table-hover">
                            <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($customers)>0)
                                    @foreach($customers as $customer)
                                        <tr>
                                        <td><a href="{{ route('showLoads', ['id' => $customer->id]) }}">{{$customer->name}}</a></td>
                                        <td>{{$customer->address}}</td>
                                        <td>{{$customer->contact_number}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td>No result found!</td></tr>
                                @endif
                            </tbody>
                        </table>
                    @endif

    </div>
@endsection
