@extends('layout.app')

@section('content')
<h1>Our Inventory</h1>

<form action="{{route('product.search')}}" class="d-flex" role="search" method="post">
    @csrf
  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="Name">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>

@if(session('success'))
    <p class="alert alert-success">{{session('success')}}</p>
@endif

@forelse ($product as $p)
<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{$p->Name}}</h5>
      <h6 class="card-subtitle mb-2 text-body-secondary">{{$p->Stock}}</h6>
      <p class="card-text">{{$p->Description}}</p>
      <p class="card-text">{{$p->Price}} </p>
      <p class="card-text">{{$p->Production_Date}}</p>
      <h6 class="card-text">Brand: {{$p->brand->name}}</h6>
      @if (@isset($p->brand->detail->description))
      <p class="card-text">Description: {{$p->brand->detail->description}}</p>
      @endif

      <a href="{{route('product.update.page', $p->id)}}" class="btn btn-warning">Edit</a>

      {{-- <a href="#" class="btn btn-danger">Delete</a> --}}
      <form action="{{route('product.delete', $p->id)}}" method="POST">
        @csrf
        @method('delete')
        <button class="btn btn-danger">Delete</button>
    </form>

    </div>
  </div>
@empty
  <p class="alert alert-warning">No Inventory data Detected</p>
@endforelse
@endsection
