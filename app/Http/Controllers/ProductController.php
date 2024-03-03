<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    // Menampilkan form untuk membuat produk baru
    public function create_product()
    {
        return view('create_product');
    }

    // Menyimpan produk baru ke dalam database
    public function store_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        // Mengunggah gambar produk
        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
        Storage::disk('local')->put(
            'public/' . $path,
            file_get_contents($file)
        );

        // Menyimpan data produk ke dalam database
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path
        ]);

        // Redirect ke halaman daftar produk dengan pesan sukses
        return Redirect::route('index_product')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    // Menampilkan semua produk
    public function index_product()
    {
        $products = Product::all();
        return view('index_product', compact('products'));
    }

    // Menampilkan detail produk
    public function show_product(Product $product)
    {
        return view('show_product', compact('product'));
    }

    // Menampilkan form untuk mengedit produk
    public function edit_product(Product $product)
    {
        return view('edit_product', compact('product'));
    }

    // Menyimpan perubahan pada produk ke dalam database
    public function update_product(Product $product, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        // Mengunggah gambar produk
        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
        
        Storage::disk('local')->put('public/'. $path, file_get_contents($file));

        // Memperbarui data produk di database
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path
        ]);

        // Redirect ke halaman detail produk
        return Redirect::route('show_product', $product);
    }

    // Menghapus produk dari database
    public function delete_product(Product $product)
    {
        $product->delete();
        return Redirect::route('index_product');
    }
}
