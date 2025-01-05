<?php

namespace KhetamHamdy\CurrencyExchange\Http\Controllers;

use Illuminate\Http\Request;
use CurrencyExchange\Models\ExchangeTransaction;
use KhetamHamdy\CurrencyExchange\Services\ExchangeTransactionService;


class ExchangeTransactionController
{

    protected $exchangeTransactionService;

    public function __construct(ExchangeTransactionService $exchangeTransactionService)
    {
        $this->exchangeTransactionService = $exchangeTransactionService;
    }

    public function index()
    {
        return response()->json($this->exchangeTransactionService->listTransactions());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'from_country_id' => 'required|exists:currencies,id',
            'to_country_id' => 'required|exists:currencies,id',
            'rate' => 'required|numeric',
            'date' => 'required|date',
        ]);
        return response()->json($this->exchangeTransactionService->createTransaction($validated));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'from_country_id' => 'required|exists:currencies,id',
            'to_country_id' => 'required|exists:currencies,id',
            'rate' => 'required|numeric',
            'date' => 'required|date',
        ]);
        return response()->json($this->exchangeTransactionService->updateTransaction($id, $validated));
    }
}
