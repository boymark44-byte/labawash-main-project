{{-- edit only the status --}}

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <form class="form bg-white p-6 border-1" method ="POST" action="{{route('loads.update', $load->id)}}">
                @csrf
                @method('PUT')
                <label for="status" class="inline-block text-lg mb-2">Status</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="status"/>
                {{-- <textarea name="status" placeholder= "Status..." value="{{ $load->status }}"></textarea> --}}
                    @error('status')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                <br>
                <br>
                    <button class="btn">Submit</button>
                    <button class="btn">Back</button>
            </form>

        </div>
    </div>
@endsection
