@extends('layouts.app')
@section('content')
<head>

</head>
    <body>
        <div class="container">
            <form enctype="multipart/form-data" class="" method ="POST" action="/update/{{$shop[0]->id}}">
                @csrf
                    @method('PUT')
                        <label>Shop Name</label>
                        <input type="text" name="shop_name" value="{{$shop[0]->shop_name}}" id="shop_name"></br>

                        <label>Shop Address</label>
                        <input type="text" name="shop_address" value="{{$shop[0]->shop_address}}" id="shop_address"></br>

                        <label>Price</label>
                        <input type="text" name="price" value="{{$shop[0]->price}}" id="price"></br>

                        <label>Category</label>
                        <input type="text" name="category" value="{{$shop[0]->category}}" id="category"></br>

                        <label>Fabcon Price</label>
                        <input type="text" name="fabcon" value="{{$shop[0]->fabcon}}" id="fabcon"></br>

                        <label>Detergent Price</label>
                        <input type="text" name="detergent" value="{{$shop[0]->detergent}}" id="detergent"></br>

                        <label>Description</label>
                        <input type="text" name="description" value="{{$shop[0]->description}}" id="description"></br>

                        <label>Photo</label></br>
                        <input type="file" name="image" placeholder= "Insert photo..." value="{{old('image')}}"></br>
                        <button class="btn"> Submit </button>
            </form>
        </div>
    </body>
@endsection
