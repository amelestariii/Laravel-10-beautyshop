<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Menambahkan produk ke keranjang
    public function add_to_cart(Product $product, Request $request)
    {
        // Validasi jumlah yang diminta
        $request->validate([
            'amount' => 'required|gte:1|lte:' . $product->stock 
        ]);

        // Ambil ID pengguna yang sedang masuk
        $user_id = Auth::id();
        $product_id = $product->id;

        // Periksa apakah produk sudah ada di keranjang pengguna
        $existing_cart = Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();

        // Jika belum ada, tambahkan produk baru ke keranjang
        if($existing_cart == null)
        {
            $request->validate([
                'amount' => 'required|gte:1|lte:' . $product->stock 
            ]);

            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'amount' => $request->amount
            ]);
        } 
        // Jika sudah ada, update jumlah produk di keranjang
        else
        {
            $request->validate([
                'amount' => 'required|gte:1|lte:' . ($product->stock - $existing_cart->amount)
            ]);

            $existing_cart->update([
                'amount' => $existing_cart->amount + $request->amount
            ]);
        }

        // Redirect ke tampilan keranjang
        return Redirect::route('show_cart');
    }

    // Constructor untuk menerapkan middleware auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan keranjang belanja pengguna
    public function show_cart()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        return view('show_cart', compact('carts'));
    }

    // Mengupdate jumlah produk di keranjang
    public function update_cart(Cart $cart, Request $request)
    {
        $request->validate([
            'amount' => 'required|gte:1|lte:' . $cart->product->stock
        ]);

        $cart->update([
            'amount' => $request->amount
        ]);

        return Redirect::route('show_cart');
    }

    // Menghapus produk dari keranjang
    public function delete_cart(Cart $cart)
    {
        $cart->delete();
        return Redirect::back();
    }
}
