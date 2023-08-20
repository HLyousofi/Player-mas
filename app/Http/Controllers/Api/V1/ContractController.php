<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Contract;
use App\Http\Requests\V1\StoreContractRequest;
use App\Http\Requests\V1\UpdateContractRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\contractResource;
use Illuminate\Support\Facades\DB;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = 'staff';$player = 'player';
        $playerContracts = DB::table('contracts')
                   ->join('players','players.id','=','contracts.beneficiary_Id')
                   ->select('players.name','contracts.*')
                   ->where(`'contract.beneficiary_Type','=',$player`)
                   ->get();
        $staffContracts = DB::table('contracts')
                   ->join('staff','staff.id','=','contracts.beneficiary_Id')
                   ->select('staff.name','contracts.*')
                   ->where(`'contract.beneficiary_Type','=',$staff`)
                   ->get();       
        $result =   $playerContracts->union($staffContracts);             
                   
                   
        return  $result;
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContractRequest $request)
    {
        
         return new ContractResource(Contract::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        return new ContractResource($contract);;
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Contract $contract)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractRequest $request, Contract $contract)
    {
        
        $contract->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);
        $contract->delete();
        return response()->json(['message' => 'Element deleted successfully']);
    }
}
