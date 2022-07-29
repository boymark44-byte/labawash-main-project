<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Load;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'cost',
        'additional_expenses',
        'total',
        'modeOfPayment',
        'loads_id',
    ];

    public function loads(){
        return $this->belongsTo(Load::class);
    }
}
