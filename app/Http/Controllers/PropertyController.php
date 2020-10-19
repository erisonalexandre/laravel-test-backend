<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyRequest;
use App\Models\Property;
use App\Services\Property\DestroyPropertyService;
use App\Services\Property\StorePropertyService;
use Illuminate\Support\Facades\DB;
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
        return response()->json(DestroyPropertyService::destroy($id));
    }

    public function create()
    {
        return Inertia::render('Property/Create');
    }

    public function list()
    {
        return response()->json(Property::with('contract')->get());
    }

    public function store(StorePropertyRequest $storePropertyRequest)
    {
        try {
            DB::beginTransaction();
            StorePropertyService::store($storePropertyRequest->all());
            Session::flash('flash', [
                'title' => 'Sucesso!',
                'message' => 'Propriedade cadastrada com sucesso!',
                'type' => 'success'
            ]);
            DB::commit();

            return Redirect::route('property');
        } catch (\Throwable $th) {
            DB::rollback();
            Session::flash('flash', [
                'title' => 'Error!',
                'message' => 'Ocorreu um erro interno, entre em contato com o suporte!',
                'type' => 'error'
            ]);
            return back(303);
        }
    }
}
