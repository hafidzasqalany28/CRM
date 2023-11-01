<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Promo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'price', 'stock', 'image', 'seller_id'
    ];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }
    public function promos()
    {
        return $this->hasMany(Promo::class, 'product_id');
    }
}
