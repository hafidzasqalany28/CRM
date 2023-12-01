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

    public function isOnSale()
    {
        return $this->promos()->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->exists();
    }

    public function averageRating()
    {
        return $this->orders()->where('status', 'completed')->avg('review');
    }

    public function originalPrice()
    {
        return $this->price;
    }

    public function currentPrice()
    {
        if ($this->isOnSale()) {
            $promo = $this->promos()->whereDate('start_date', '<=', now())
                ->whereDate('end_date', '>=', now())
                ->first();

            return $this->price - ($this->price * $promo->discount / 100);
        }

        return $this->price;
    }

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
