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
                                        <th>Load Quantity |</th>
                                        <th>Load Selector |</th>
                                        <th>Color Type |</th>
                                        <th>Load Type |</th>
                                        <th>Additional Expenses |</th>
                                        <th>Description |</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        @foreach($loads as $item)
                                            <tr>
                                                <td>{{$item->load_quantity}}</td>
                                                <td>{{$item->load_selector}}</td>
                                                <td>{{$item->color_type}}</td>
                                                <td>{{$item->load_type}}</td>
                                                <td>{{$item->additional_expenses}}</td>
                                                <td>{{$item->description}}</td>
                                            </tr>
                                        @endforeach

                                </tbody>
                            </table>
                        @endif
                        <button class ="btn"><a href ="{{route('customers.index')}}">Back</a></button>
                </div>
            </div>
        </div>
    </div>

@endsection
