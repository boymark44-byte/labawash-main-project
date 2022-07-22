@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Form') }}</div>

                    @if(isset($customers))
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="padding:10px">Form Number</th>
                                    <th style="padding:10px">Name</th>
                                    <th style="padding:10px">Address</th>
                                    <th style="padding:10px">Contact Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($customers)>0)
                                    @foreach($customers as $customer)
                                        <tr>
                                        <td><a href="{{ route('showLoads', ['id' => $customer['id']]) }}">{{$customer->id}}</a></td>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->address}}</td>
                                        <td>{{$customer->contact_number}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td>No Forms to display</td></tr>
                                @endif
                            </tbody>
                        </table>
                    @endif
                    <button class ="btn"><a href ="{{route('shops.index')}}">Back</a></button>
            </div>
        </div>
    </div>
</div>

@endsection
