@extends('layout.app')

@section('content')
<h1>Create Brand</h1>
<form action="{{route ('brand.store')}}" method = "POST">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Brand Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name = "name" value="{{old('name')}}">

    </div>
    @error('name')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Brand Description</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name = "description" value="{{old('description')}}">

    </div>
    @error('description')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
    <button type="submit" class="btn btn-primary">Submit
    </button>

</form>
@endsection
