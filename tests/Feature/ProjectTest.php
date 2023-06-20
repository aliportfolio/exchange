<?php

namespace Tests\Feature;

use App\Models\Currency;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        // Create Currencies
        $syp = Currency::create(['name' => 'ليرة سورية', 'code' => 'SYP', 'rate' => 1000]);
        $lbp = Currency::create(['name' => 'ليرة لبنانية', 'code' => 'LBP', 'rate' => 10000]);

        // Create Project
        $project = Project::create(['name' => 'مشروع رقم واحد', 'description' => 'وصف المشروع الأول']);

        // Add Costs to Project
        $project->costs()->createMany([
            [
                'name' => 'تكلفة أولية',
                'currency_id' => $syp->id,
                'cost' => 100000
            ],
            [
                'name' => 'تكلفة أولية',
                'currency_id' => $lbp->id,
                'cost' => 1000000
            ],
        ]);

        // Test Functions
        $totalCostInBaseCurrency = $project->costInBaseCurrency();
        $totalCostInSyp = $project->costInCurrency($syp);
        $totalCostInLbp = $project->costInCurrency($lbp);

        // Assert the results
        $this->assertEquals(200, $totalCostInBaseCurrency);
        $this->assertEquals(200000, $totalCostInSyp);
        $this->assertEquals(2000000, $totalCostInLbp);
    }
}
