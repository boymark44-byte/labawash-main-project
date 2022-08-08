<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expense;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Load extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'load_quantity',
        'color_type',
        'load_selector',
        'load_type',
        'status',
        'fabcon',
        'detergent',
        'description',
        'customers_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }

    // public function expenses (){
    //     return $this->hasOne(Expense::class, 'loads_id', 'id');
    // }
}
