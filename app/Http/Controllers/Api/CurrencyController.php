<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyRequest;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        return response()->json(Currency::latest()->get(), 200);
    }

    public function store(CurrencyRequest $request)
    {
        Currency::create($request->validated());

        return response()->json([
            'message' => 'Currency Created!'
        ], 200);
    }

    public function exchange($amount, Currency $from, Currency $to)
    {
        return response()->json(convertCurrency($amount, $from, $to), 200);
    }
}
