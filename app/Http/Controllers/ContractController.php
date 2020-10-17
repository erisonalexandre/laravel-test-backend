<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContractController extends Controller
{
    public function index()
    {
        Inertia::share('header', 'Contratos');
        return Inertia::render('Contract/Index', ['contracts' => Contract::with('property')->get()]);
    }
}
