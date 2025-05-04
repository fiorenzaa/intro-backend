@extends('products.layout')

@section('content')
<div class="row mb-3">
    <div class="col-lg-12 d-flex justify-content-between align-item-center">
        <h2>Tampilkan Produk</h2>
        <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-3">
        <div class="form-group">
            <strong>Nama:</strong>
            {{ $product->name }}
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <div class="form-group">
            <strong>Detail:</strong>
            {{ $product->detail }}
        </div>
    </div>
</div>
@endsection
