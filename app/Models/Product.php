<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'stock'
    ];

     // Relasi dengan model Transaction, menunjukkan bahwa satu produk dapat memiliki banyak transaksi
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // Relasi dengan model Cart, menunjukkan bahwa satu produk dapat berada dalam banyak keranjang
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
