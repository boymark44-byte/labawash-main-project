<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'contact_number',
    ];

    public function customers(){
        return $this->hasMany(Customer::class);
    }
}
