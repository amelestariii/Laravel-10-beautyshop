<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    // Checkout untuk proses pembayaran
    public function checkout()
    {
        // Mendapatkan ID pengguna yang sedang masuk
        $user_id = Auth::id();

        // Mengambil produk dari keranjang pengguna
        $carts = Cart::where('user_id', $user_id)->get();

        // Jika keranjang kosong, redirect kembali
        if ($carts == null) {
            return Redirect::back();
        }

        // Membuat pesanan baru untuk pengguna
        $order = Order::create([
            'user_id' => $user_id
        ]);

        // Memproses setiap produk di keranjang
        foreach ($carts as $cart) {
            // Mengurangi stok produk
            $product = Product::find($cart->product_id);
            $product->update([
                'stock' => $product->stock - $cart->amount
            ]);

            // Membuat transaksi
            Transaction::create([
                'amount' => $cart->amount,
                'order_id' => $order->id,
                'product_id' => $cart->product_id
            ]);

            // Menghapus produk dari keranjang
            $cart->delete();
        }

        // Redirect kembali
        return Redirect::back();
    }

    // Menampilkan daftar pesanan
    public function index_order()
    {
        // Mendapatkan pengguna yang sedang masuk
        $user = Auth::user();
         // Menentukan apakah pengguna adalah admin
        $is_admin = $user->is_admin;
            // Jika admin, ambil semua pesanan. Jika tidak, ambil pesanan untuk pengguna tersebut.
            if ($is_admin) {
                $orders = Order::all();
            } else {
                $orders = Order::where('user_id', $user->id)->get();
            }

        // Tampilkan daftar pesanan
        return view('index_order', compact('orders'));
    }

    // Menampilkan detail pesanan
    public function show_order(Order $order)
    {
        // Mendapatkan pengguna yang sedang masuk
        $user = Auth::user();
        // Menentukan apakah pengguna adalah admin
        $is_admin = $user->is_admin;
            // Jika admin atau pengguna yang membuat pesanan, tampilkan detail pesanan.
            if ($is_admin || $order->user_id == $user->id) {
                return view('show_order', compact('order'));
            }

        // Jika bukan admin atau pembuat pesanan, tetap tampilkan detail pesanan.
        return view ('show_order', compact('order'));
    }

    // Mengirim bukti pembayaran
    public function submit_payment_receipt(Order $order, Request $request)
    {
        // Mengunggah bukti pembayaran
        $file = $request->file('payment_receipt');
        $path = time() . '_' . $order->id . '.' . $file->getClientOriginalExtension();
        Storage::disk('local')->put('public/' . $path, file_get_contents($file));
        // Memperbarui bukti pembayaran dalam pesanan
        $order->update([
            'payment_receipt' => $path
        ]);

        // Redirect kembali
        return Redirect::back();
    }

     // Mengonfirmasi pembayaran
    public function confirm_payment(Order $order)
    {
        // Mengonfirmasi pembayaran dalam pesanan
        $order->update([
            'is_paid' => true
        ]);

        // Redirect kembali
        return Redirect::back();
    }

    // Menampilkan nota transaksi
    public function NotaTransaksi(Order $order)
    {
        return view('nota', compact('order'));
    }
}
