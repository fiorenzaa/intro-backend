<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Menampilkan daftar produk
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    // Form tambah produk
    public function create()
    {
        return view('products.create');
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dibuat.');
    }

    // Edit produk
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Tampilkan detail produk
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Simpan perubahan produk
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    // Hapus produk
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

}
