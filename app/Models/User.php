<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use Sluggable;
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'first_name',
        'last_name',
        'slug',
        'email',
        'phone',
        'city',
        'address',
        'wallet',
        'points',
        'password',
        'google_id',
        'facebook_id',
        'bio', 'fb_link', 'youtube_vid', 'profile_picture'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'first_name'
            ]
        ];
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function wishListItems()
    {
        return $this->hasMany(WishListItem::class);
    }
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeSearchWord($query)
    {
        if ($search_word = request('search_word')) {
            return $query->where('first_name', 'LIKE', "%{$search_word}%")->orWhere('phone', 'LIKE', "%{$search_word}%")->orWhere('email', 'LIKE', "%{$search_word}%");
        }
    }
}
