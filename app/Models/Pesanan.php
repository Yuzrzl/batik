<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function orders()
    {
        return $this->belongsTo('App\Models\Order', 'order');
    }
    

    public function cart()
    {
        return $this->belongsTo('App\Models\Cart', 'id');
    }
    
}
