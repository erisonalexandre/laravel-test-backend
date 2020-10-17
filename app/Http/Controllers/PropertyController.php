<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Services\Property\DestroyPropertyService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index()
    {
        return Inertia::render('Property/Index', ['properties' => Property::all()]);
    }

    public function destroy($id)
    {
        DestroyPropertyService::destroy($id);
        return back(303)->with('status', 'property-deleted');
    }
}
