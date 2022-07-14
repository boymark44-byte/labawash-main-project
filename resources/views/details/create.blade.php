@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
   
<form class="form bg-white p-6 border-1" method="POST" action="{{route('details.store')}}">
   @csrf 
<div>
    <label class="text-sm" for="name">Store Name</label>
    <input class="text-lg border-1" type="text" id="name" value="{{old('name')}}" name="name">
    @error('name')
   <div class="form-error">
       {{$message}}
   </div>
    @enderror
 </div>
 <div> 
    <label class="text-sm" for="type">Type of Store</label>
    <input class="text-lg border-1" type="text" id="type" name="type" value="{{old('type')}}">
    @error('type')
   <div class="form-error">
       {{$message}}
   </div>
    @enderror
 </div>
 <div>
  <label class="text-sm" for="location">Location</label>
  <input class="text-lg border-1" type="text" id="location" name="location" value="{{old('location')}}">
  @error('location')
 <div class="form-error">
     {{$message}}
 </div>
  @enderror
</div>
 <div>
    <label class="text-sm" for="year_created">Year Established</label>
    <input class="text-lg border-1" type="text" id="year_created" name="year_created" value="{{old('year_created')}}">
    @error('year_created')
   <div class="form-error">
       {{$message}}
   </div>
    @enderror
 </div>
 <div>
    <button class="border-1" type="submit">Submit</button>
 </div>
</form>
</div>
@endsection