<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Currency;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $currencies = Currency::get(['rate', 'name', 'code']);
        return view('projects.create', compact('currencies'));
    }

    public function store(ProjectRequest $request)
    {
        Project::create($request->validated());

        return redirect()->back()->with('msg', 'تمت الإضافة بنجاح');
    }

    // return project cost in any currency
    public function project_exchange($id, $currency)
    {
        $project = Project::findOrFail($id);
        $currency = Currency::findOrFail($currency);

        return round($project->cost * $currency->rate, 2);
    }

    public function exchange()
    {
        $currencies = Currency::all();
        return view('exchange.currencies', compact('currencies'));
    }

    // Exchange Currencies
    public function exchange_action(Request $request)
    {

        $fromRate = Currency::where('code', $request->from)->value('rate');
        $toRate = Currency::where('code', $request->to)->value('rate');

        if ($fromRate && $toRate)
        {
            // Result Of Function
            $result = $request->amount * ($toRate / $fromRate);
            $currencies = Currency::all();
            return view('exchange.currencies', compact('result', 'currencies'));
        } else {
            // Currency Error Handling
            return redirect()->back();
        }
    }
}
