<?php

namespace KhetamHamdy\CurrencyExchange\Services;

use App\Models\ExchangeTransaction;
use Illuminate\Support\Facades\DB;
use Throwable;

class ExchangeTransactionService
{
    public function listTransactions()
    {
        return ExchangeTransaction::all();
    }

    public function createTransaction($data)
    {
        DB::beginTransaction();
        try {
            $item1 = ExchangeTransaction::where('from', $data['from'])->where('to', $data['to'])->first();
            $item2 = ExchangeTransaction::where('to', $data['to'])->where('from', $data['from'])->first();

            if ($item1 || $item2) {
                return false;
            }
            $item = new ExchangeTransaction();
            $item->fill($data);
            $item->save();

            $itemExchange = new ExchangeTransaction();
            $itemExchange->from = $item->to;
            $itemExchange->to = $item->from;
            $itemExchange->date = $item->date;
            $itemExchange->rate = number_format(1 / $item->rate, 3);
            $itemExchange->save();

            DB::commit();
            return true;
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateTransaction($id, $data)
    {
        $item = ExchangeTransaction::findOrFail($id);
        if (! $item) {
            return response()->json(['message' => 'not found Exchange Transaction']);
        }
        $item->fill($data);
        $item->save();

        $RateFrom = $data['RateFrom'];
        $RateTo = $data['RateTo'];
    }
}
