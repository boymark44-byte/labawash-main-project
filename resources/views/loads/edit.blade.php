// edit only the status

@extends('layouts.app')

@section('content')

    <form class="form bg-white p-6 border-1" method ="POST" action="{{route('loads.update', $load->id)}}">
        @csrf
        @method('PUT')

        <textarea name="status" placeholder= "Status..." value="{{ $load->status }}"></textarea>
            @error('status')
            <div class="form-error">{{$message}}</div>
            @enderror
        <br>
        <br>
                <button> Submit </button>
    </form>
@endsection
