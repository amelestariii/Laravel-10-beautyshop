<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'order_id',
        'product_id',
        'amount'
    ];

    // Relasi dengan model Order, menunjukkan bahwa satu transaksi dimiliki oleh satu pesanan
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi dengan model Product, menunjukkan bahwa satu transaksi dimiliki oleh satu produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
