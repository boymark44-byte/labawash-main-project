<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'shop_id',
        'address',
        'contact_number',
    ];

    public function shops(){
        return $this->belongsTo(Shop::class, 'shop_id');
    }
    public function loads(){
        return $this->hasMany(Load::class, 'customers_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
