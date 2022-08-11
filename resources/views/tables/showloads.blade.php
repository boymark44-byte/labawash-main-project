{{-- For shop role, display all loads for specific customer --}}

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Form') }}</div>
                        @if(isset($loads))
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Load ID </th>
                                        <th>Load Quantity </th>
                                        <th>Load Selector </th>
                                        <th>Color Type </th>
                                        <th>Load Type </th>
                                        <th>Fabcon/s </th>
                                        <th>Detergent/s </th>
                                        <th>Description </th>
                                        <th>Status </th>
                                        <th>Edit Status </th>
                                    </tr>
                                </thead>
                                <tbody>

                                        @foreach($loads as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->load_quantity}}</td>
                                                <td>{{$item->load_selector}}</td>
                                                <td>{{$item->color_type}}</td>
                                                <td>{{$item->load_type}}</td>
                                                <td>{{$item->fabcon}}</td>
                                                <td>{{$item->detergent}}</td>
                                                <td>{{$item->description}}</td>
                                                <td>{{$item->status}}</td>
                                                <td class="card-header"><a href="{{ route('loads.edit', ['load' => $item->id]) }}" class="btn">Edit</a></td>
                                            </tr>
                                        @endforeach

                                </tbody>
                            </table>
                            
                        @endif
                        <a href ="/api/shop_dashboard/{{ Auth::user()->id }}" class="btn">Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection
