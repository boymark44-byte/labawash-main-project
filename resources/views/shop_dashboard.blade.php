@extends('layouts.app')

@section('content')

    <div class="container">

         @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (isset($user, $shops))
            <div class="testimonials">
                <div class="small-container">

                    @foreach ($user as $user)
                        <h3 class="title">Shops under {{ $user->name }} </h3>

                        <div class="row">
                            @foreach ($user->shops as $shop)
                            <div class="col-6">
                                {{-- images --}}
                                @if ($shop->image == true)
                                <a href="{{ route('display', $shop->id) }}"><img src="{{ $shop->image }}" alt=""></a></td>
                                @else
                                <a href="{{ route('display', $shop->id) }}"><img src="../images/laundry-default.jpg" alt=""></a></td>
                                @endif
                                <br>
                                <h2>{{$shop->shop_name}}</h2>
                                <p>{{$shop->shop_address}}</p>
                                <p>{{$shop->description}}</p>
                                <a class="btn" href="{{route('shops.edit', $shop->id)}}">Edit</a>
                                <h4>{{$shop->id}}</h4>
                            </div>
                            @endforeach
                        </div>
                    @endforeach

                </div>

            </div>
        @endif
    </div>
@endsection
