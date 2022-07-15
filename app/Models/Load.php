<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
    use HasFactory;

    protected $fillable = [
        'load_quantity',
        'additional_expenses',
        'color_type',
        'load_selector',
        'load_type',
        'description',
        'customers_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function expense (){
        return $this->hasOne(Expense::class, 'loads_id');
    }
}
