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
                                    <th style="padding:10px">Shop Logo </th>
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
                                            <td><img src="{{ $shop->image }}" alt=""></td>
                                            <td>{{$shop->shop_name}}</td>
                                            <td>{{$shop->shop_address}}</td>
                                            <td>{{$shop->description}}</td>
                                            <td>
                                                <a class="btn" href="{{route('shops.edit', $shop->id)}}">Edit</a>
                                                {{-- <a class="" href="{{url('/shop', $shop->id)}}">View</a> --}}
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
                                    <th>Action</th>
                                    {{-- <th style="padding:10px">View </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($customers)>0)
                                    @foreach($customers as $customer)
                                        <tr>
                                        <td><a href="{{ route('showLoads', ['id' => $customer->id]) }}">{{$customer->name}}</a></td>
                                        <td>{{$customer->address}}</td>
                                        <td>{{$customer->contact_number}}</td>
                                        <td>
                                            <form method="POST" action="{{url('/destroy', $customer->id)}}">
                                            @csrf
                                            @method('DELETE')
                                                <button class="btn">Delete</button>
                                        </td>
                                        {{-- <td>
                                            <a class="" href="{{url('/show', $customer->id)}}">View</a>
                                        </td> --}}
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td>No result found!</td></tr>
                                @endif
                            </tbody>
                        </table>
                    @endif

                    {{-- <div>
                        @if (isset($shops, $customers))
                            @foreach ($shops as $item)
                                <p>User ID: {{ $item->user_id}}</p>
                                <p>Name: {{ $item->shop_name }}</p>
                                <p>Address: {{ $item->shop_address }}</p>
                                <p>Description: {{ $item->description }}</p>
                            @endforeach

                            <h1>Customers</h1>

                            @foreach ($customers as $item)
                                <p>Name: {{ $item->name }}</p>
                                <p>Address: {{ $item->address }}</p>
                                <p>Contact Number: {{ $item->contact_number }}</p>

                                <br>
                            @endforeach


                            <label>Would you like to add another load?</label>
                            <a href="{{ route('loads.show', ['load'=>$index->id]) }}">Yes</a>
                            <a href="{{ route('shops.index') }}">No</a>
                        @endif

                    </div> --}}

    </div>
@endsection
