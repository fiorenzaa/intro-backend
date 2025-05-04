@extends('products.layout')

@section('content')
<div class="row mb-3">
    <div class="col-lg-12">
        <div class="float-start">
            <h2>Tambahkan Produk Baru</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-primary" href="{{ route('products.index')}}">Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Ups!</strong>Ada beberapa masalah dengan input Anda.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="name"><strong>Nama:</strong></label>
                <input type="text" name="name" class="form-control" placeholder="Nama Produk">
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="detail"><strong>Detail:</strong></label>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail Produk"></textarea>
            </div>
        </div>

        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-success">Simpan Produk</button>
        </div>
    </div>
</form>
@endsection
