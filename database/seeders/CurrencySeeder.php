<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            'id' => 1,
            'name' => 'ليرة سورية',
            'code' => 'SYP',
            'rate' => '9000'
        ]);
        Currency::create([
            'id' => 2,
            'name' => 'ليرة لبنانية',
            'code' => 'LBP',
            'rate' => '90000'
        ]);
    }
}
