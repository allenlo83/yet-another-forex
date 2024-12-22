<?php

namespace App\Models;

use App\Models\Model;

class Rate extends Model
{    
    protected $fillable = [
        'base_currency_id',
        'target_currency_id',
        'rate',
        'effective_date',
    ];

    public $timestamps = true;

    public function baseCurrency()
    {
        return $this->belongsTo(Currency::class, 'base_currency_id', 'id');
    }

    public function targetCurrency()
    {
        return $this->belongsTo(Currency::class, 'target_currency_id', 'id');
    }
}
