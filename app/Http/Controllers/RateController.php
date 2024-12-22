<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

use App\Models\Currency;
use App\Models\Rate;

class RateController extends Controller
{
    public function index(Request $request)
    {
        $baseCurrency = Currency::where('code', 'USD')->first();
        $rates = [];

        $dateInput = $request->date;

        $currencies = Currency::get()
            ->map(function ($item) use ($baseCurrency, $dateInput, &$rates) {
                $ratesData = Rate::where('base_currency_id', $baseCurrency->id)
                    ->where('target_currency_id', $item->id)
                    ->where('effective_date', '<=', $dateInput ?? Carbon::now()->format('Y-m-d'))
                    ->orderBy('effective_date', 'ASC')
                    ->groupby('code')
                    ->distinct()
                    ->get()
                    ->map(function($rate) use($item, &$rates) {
                        array_push ($rates, [
                            'code' => $rate->targetCurrency->code,
                            'name' => $rate->targetCurrency->name,
                            'rate' => $rate->rate,
                        ]);
                    });
            });

        return [
            'status' => 200,
            'message' => 'success',
            'data' => [
                'rates' => $rates,
            ]
        ];
    }
}
