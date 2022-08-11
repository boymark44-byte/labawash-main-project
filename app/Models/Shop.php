<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\User;
use App\Models\Comment;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class Shop extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'shop_name',
        'user_id',
        'shop_address',
        'price',
        'category',
        'fabcon',
        'detergent',
        'description',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function customers(){
        return $this->hasMany(Customer::class, 'shop_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'shop_id', 'id');
    }
}
