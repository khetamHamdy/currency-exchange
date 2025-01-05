<?php

namespace KhetamHamdy\CurrencyExchange\Http\Controllers;

use Illuminate\Http\Request;
use KhetamHamdy\CurrencyExchange\Services\CurrencyService;

use CurrencyExchange\Models\Currency;

class CurrencyController
{
    protected $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function index()
    {
        return response()->json($this->currencyService->getAllCurrencies());
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
        ]);

        return response()->json($this->currencyService->addCurrency($validated));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
        ]);
        return response()->json($this->currencyService->updateCurrency($id, $validated));
    }

    public function delete($id)
    {
        return response()->json($this->currencyService->deleteCurrency($id));
    }
}
