<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectCostRequest;
use App\Http\Requests\ProjectRequest;
use App\Models\Currency;
use App\Models\Project;
use App\Models\ProjectCost;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::latest()->get();
        return response()->json($projects, 200);
    }

    public function store(ProjectRequest $request)
    {
        Project::create($request->validated());

        return response()->json([
            'message' => 'Project Created!'
        ], 200);
    }

    public function store_costs(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'costs' => 'required|array',
            'costs*.currency_id' => 'required|exists:currencies,id',
            'costs*.cost' => 'required|numeric|min:0',
        ]);

        foreach ($request->costs as $cost)
        {
            $project_cost = new ProjectCost();
            $project_cost->name = $data['name'];
            $project_cost->currency_id = $cost['currency_id'];
            $project_cost->cost = $cost['cost'];

            $project->costs()->save($project_cost);
        }

        return response()->json([
            'message' => 'Project Costs Created!'
        ], 200);
    }

    public function get_total(Project $project, Currency $currency = null)
    {
        // Get Total Cost in Base Currency
        if($currency == null) {
            return response()->json([
                $project->costInBaseCurrency()
            ], 200);
        } else {
            return response()->json([
                $project->costInCurrency($currency)
            ], 200);
        }
    }

}
