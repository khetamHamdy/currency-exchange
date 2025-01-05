<?php

namespace KhetamHamdy\CurrencyExchange\Services;

use App\Models\Currency;

class CurrencyService
{
    public function getAllCurrencies()
    {
        return Currency::all();
    }

    public function addCurrency($data)
    {
        return Currency::create($data);
    }

    public function updateCurrency($id, $data)
    {
        $currency = Currency::findOrFail($id);
        if (! $currency) {
            return response()->json(['message' => 'not found currency']);
        }
        $currency->update($data);
        return $currency;
    }

    public function deleteCurrency($id)
    {
        $currency = Currency::findOrFail($id);
        $currency->delete();
        return true;
    }
}
