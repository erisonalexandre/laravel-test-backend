<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index()
    {
        Inertia::share('header', 'Properties');
        return Inertia::render('Property/Index', ['properties' => Property::all()]);
    }
}
