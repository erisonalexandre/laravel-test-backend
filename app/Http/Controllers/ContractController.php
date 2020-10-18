<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContractRequest;
use App\Models\Contract;
use App\Services\Contract\DestroyContractService;
use App\Services\Property\PropertiesWithoutContractService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class ContractController extends Controller
{
    public function index()
    {
        return Inertia::render('Contract/Index', ['types' => Contract::TYPES, 'contracts' => Contract::with('property')->get()]);
    }

    public function create()
    {
        return Inertia::render('Contract/Create', ['types' => Contract::TYPES, 'properties' => PropertiesWithoutContractService::list()]);
    }

    public function destroy($id)
    {
        DestroyContractService::destroy($id);
        return back(303);
    }

    public function store(StoreContractRequest $request)
    {
        Contract::create(
            $request->all()
        );
        Session::flash('flash', [
            'title' => 'Sucesso!',
            'message' => 'Contrato cadastrado com sucesso!',
            'type' => 'success'
        ]);
        return Redirect::route('contract');
    }
}
