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
                            <button> Submit </button>
                </form>





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
