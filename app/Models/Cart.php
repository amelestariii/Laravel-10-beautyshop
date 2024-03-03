<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'user_id',
        'product_id',
        'amount'
    ];

    // Relasi dengan model User, menunjukkan bahwa satu keranjang dimiliki oleh satu pengguna
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan model Product, menunjukkan bahwa satu keranjang berisi satu produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
