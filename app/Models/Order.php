<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        'user_id',
        'status',
        'total',
        'tracking_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function scopeSearchWord($query)
    {
        if ($search_word = request('search_word')) {
            return $query->where('tracking_id', 'LIKE', "%{$search_word}%");
        }
    }
}
