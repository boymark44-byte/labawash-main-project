@extends('layouts.app')

@section('content')

    <div class="container">

        {{-- to store comments/feedbacks --}}
        <div class="row justify-content-center">
            <form method="POST" action="{{ route('comment.store') }}">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @csrf
                <input type="hidden" name="shop_id" value="{{ $shop_id }}">

                <label>Send feedback?</label>
                <input type="text" name="comment_body" placeholder="Add comment/feedback">

                <p>Rate</p>
                <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>
                {{-- <a href="{{ route('mycart') }}" class="btn">Submit</a> --}}

                <button class="btn">Submit</button>
            </form>

            {{-- Charchar muna to store rating --}}
            {{-- <p>Rate</p>
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
            </div>
            <a href="{{ route('mycart') }}" class="btn">Submit</a> --}}
        </div>
    </div>

@endsection
