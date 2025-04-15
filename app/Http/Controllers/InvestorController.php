<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use Inertia\Inertia;
use Illuminate\Http\Request;

class InvestorController extends Controller
{

    public function index(Request $request)
    {
        $investors = Investor::orderBy('last_name')
            ->paginate(10);

        return Inertia::render('Investors/Index', [
            'investors' => $investors,
        ]);
    }

    public function create()
    {
        return Inertia::render('Investors/Create', [
            'investmentTypes' => ['micro', 'sponsor', 'benefactor'],
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'investment_type' => 'required|in:micro,sponsor,benefactor',
        ]);

        Investor::create($validated);

        return redirect()->route('investors.index')->with('success', 'Investor created successfully.');
    }
}
