<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyRequest;
use App\Models\Property;
use App\Services\Property\DestroyPropertyService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index()
    {
        return Inertia::render('Property/Index', ['properties' => Property::with('contract')->get()]);
    }

    public function destroy($id)
    {
        DestroyPropertyService::destroy($id);
        return back(303)->with('status', 'property-deleted');
    }

    public function create()
    {
        return Inertia::render('Property/Create');
    }

    public function store(StorePropertyRequest $storePropertyRequest)
    {
        Property::create(
            $storePropertyRequest->all()
        );
        Session::flash('flash', [
            'title' => 'Sucesso!',
            'message' => 'Propriedade cadastrada com sucesso!',
            'type' => 'success'
        ]);
        return Redirect::route('property');
    }
}
