<?php

namespace KhetamHamdy\CurrencyExchange\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'is_main'];

    public function fromExchangeTransactions()
    {
        return $this->hasMany(ExchangeTransaction::class, 'from', 'id');
    }

    public function ToExchangeTransactions()
    {
        return $this->hasMany(ExchangeTransaction::class, 'to', 'id');
    }
}
