@extends('products.layout')

@section('content')
<div class="row mb-3">
    <div class="col-lg-12">
        <div class="float-start">
            <h2>Contoh CRUD Laravel</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-success" href="{{ route('products.create')}}">Buat Produk Baru</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message}}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Detail</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ ++$i}}</td>
        <td>{{ $product->name}}</td>
        <td>{{ $product->detail}}</td>
        <td>
            <form action="{{ route('products.destroy', $product->id)}}" method="POST">
                <a class="btn btn-info" href="{{ route('products.show', $product->id)}}">Show</a>
                <a class="btn btn-primary" href="{{ route('products.edit', $product->id)}}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $products->links() !!}
@endsection


