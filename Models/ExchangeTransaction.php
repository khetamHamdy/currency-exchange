<?php

namespace KhetamHamdy\CurrencyExchange\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExchangeTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to', 'date', 'rate'];

    public function from_currency()
    {
        return $this->belongsTo(Currency::class, 'from', 'id');
    }

    public function to_currency()
    {
        return $this->belongsTo(Currency::class, 'to', 'id');
    }
}
