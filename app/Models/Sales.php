<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'salesperson_id',
        'amount',
        'commission_amount',
        'sale_date',
    ];

    public function salesperson()
    {
        return $this->belongsTo(Salesperson::class, 'salesperson_id', 'id');
    }
}
