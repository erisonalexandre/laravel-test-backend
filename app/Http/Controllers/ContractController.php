<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContractRequest;
use App\Models\Contract;
use App\Services\Contract\DestroyContractService;
use App\Services\Contract\StoreContractService;
use App\Services\Property\PropertiesWithoutContractService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function store(StoreContractRequest $storeContractRequest)
    {
        try {
            DB::beginTransaction();
            StoreContractService::store($storeContractRequest->all());
            Session::flash('flash', [
                'title' => 'Sucesso!',
                'message' => 'Contrato cadastrado com sucesso!',
                'type' => 'success'
            ]);
            DB::commit();

            return Redirect::route('contract');
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
