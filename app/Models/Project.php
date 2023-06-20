<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function costs()
    {
        return $this->hasMany(ProjectCost::class);
    }


    // Calculate The Cost Of a Project In Base Currency
    function costInBaseCurrency()
    {
        $total_cost = 0;

        foreach ($this->costs as $cost) {
            $total_cost += $cost->cost / $cost->currency->rate;
        }

        return round($total_cost, 3);
    }

    // Calculate The Cost Of A Project In Any Currency
    function costInCurrency(Currency $currency)
    {
        $total_cost = 0;

        foreach ($this->costs as $cost) {
            $total_cost += convertCurrency($cost->cost, $cost->currency, $currency);
        }

        return round($total_cost, 3);
    }


}
