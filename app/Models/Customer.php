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
        'shop_id',
        'address',
        'contact_number',
    ];

    public function shops(){
        return $this->belongsTo(Shop::class);
    }
    public function loads(){
        return $this->hasMany(Load::class, 'customers_id', 'id');
    }
}
