@extends('layouts.app')

@section('content')

    @if(isset($shops))
        <div class="small-container">
            <h2 class="title">Choose Shop</h2>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <br>
                <form class="title" method ="GET" action="{{route('search')}}">
                    <textarea name="query" cols="50" placeholder= "Search shop name or description or category..."></textarea>
                    @error('query')
                        <div class="form-error">
                            {{$message}}
                        </div>
                    @enderror
                <br>
                <button> Submit </button>

            </div>
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
                    <p>Php {{ $shop->price }} {{$shop->category}}</p>
                    <p>{{ $shop->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
