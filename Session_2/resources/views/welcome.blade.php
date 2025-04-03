@extends('layout.app')

@section('title', 'Website')
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
    <div class="container">
        <div class="row gap-3">
            <div class="col bg-success text-light p-4">
                <h2>Visi</h2>
                <p>Menjadi programmer handal</p>
            </div>
            <div class="col bg-success text-warning">
                <h2>Misi</h2>
                <p>Menjadi programmer handal</p>
            </div>
        </div>
    </div>
@endsection


