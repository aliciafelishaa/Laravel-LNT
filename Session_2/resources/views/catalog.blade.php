@extends('layout.app')

    @section('title', 'Catalog')

    {{-- <div class="container">
        <div class="row">
            <div class="col bg-primary text-light border border-dark">1</div>
            <div class="col bg-primary text-light border border-dark">1</div>
            <div class="col bg-primary text-light border border-dark">1</div>
            <div class="col bg-primary text-light border border-dark">1</div>
            <div class="col bg-primary text-light border border-dark">1</div>
            <div class="col bg-primary text-light border border-dark">1</div>
            <div class="col bg-primary text-light border border-dark">1</div>
            <div class="col bg-primary text-light border border-dark">1</div>
        </div>
    </div> --}}

{{-- Buat naruh navbar diatas, pake section(sblm itu pake yield dlu di appnya) --}}
@section('content')
<br>
<div class="card-container">
    <div class="row row-cols-3 gap-2 justify-content-center">
        @include('include.card')
        @include('include.card')
        @include('include.card')
        @include('include.card')
        @include('include.card')
        @include('include.card')
    </div>
</div>
@endsection




