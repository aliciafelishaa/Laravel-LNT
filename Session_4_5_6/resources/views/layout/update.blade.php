@extends('layout.app')

@section('content')
<h1>Create New Inventory</h1>
<form action="{{route('product.update', $product->id)}}" method = "POST">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name = "Name" value="{{$product->Name}}">
    </div>
    @error('Name')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Description</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name = "Description" value="{{$product->Description}}">
    </div>
    @error('Description')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Stock</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" name = "Stock" value="{{$product->Stock}}">
    </div>
    @error('Stock')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Price</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" name = "Price" value="{{$product->Price}}">
    </div>
    @error('Price')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Production Date</label>
        <input type="date" class="form-control" id="exampleFormControlInput1" name = "Production_Date" value="{{$product->Production_Date}}">
    </div>
    @error('Production_Date')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Brand</label>
        <select name="brand_id" class="form-control">
            @forelse ($brands as $b)
                <option value="{{$b->id}}">{{ $b->name }}</option>
            @empty

            @endforelse
            </select>
    </div>
    @error('brand->id')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
    <button type="submit" class="btn btn-primary">Submit
    </button>

</form>
@endsection
