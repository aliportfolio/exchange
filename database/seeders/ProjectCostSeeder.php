<?php

namespace Database\Seeders;

use App\Models\ProjectCost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectCostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectCost::create([
            'name' => 'تكلفة بناء',
            'project_id' => 1,
            'currency_id' => 1,
            'cost' => 100000.00,
        ]);
        ProjectCost::create([
            'name' => 'تكلفة بناء',
            'project_id' => 1,
            'currency_id' => 2,
            'cost' => 1000000.00,
        ]);
    }
}
