<?php

// Convert Currencies
function convertCurrency($amount, $from_currency, $to_currency)
{
    $from_rate = $from_currency->rate;
    $to_rate = $to_currency->rate;

    if ($from_rate == 0 || $to_rate == 0) {
        return abort(500);
    }

    return ($amount / $from_rate) * $to_rate;
}
