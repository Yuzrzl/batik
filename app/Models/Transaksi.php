<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['cart_id', 'subtotal', 'total'];

    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }
}
