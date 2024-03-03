<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'user_id',
        'is_paid',
        'payment_receipt'
    ];

    // Relasi dengan model User, menunjukkan bahwa satu pesanan dimiliki oleh satu pengguna
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan model Transaction, menunjukkan bahwa satu pesanan dapat memiliki banyak transaksi
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
