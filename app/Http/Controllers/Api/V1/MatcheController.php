<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Matche;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\V1\MatcheResource;
use App\Http\Requests\V1\StoreMatcheRequest;
use App\Http\Requests\V1\UpdateMatcheRequest;
use App\Http\Requests\V1\DeleteMatcheRequest;





class MatcheController extends Controller
{
    public function index()
    {
        $matches = DB::table('matches')
        ->join('teams','matches.team_Id','=','teams.id')
        ->select('matches.*','teams.name')
        ->get();
    
        return $matches;

    }

    public function store(StoreMatcheRequest $request)
    {
        return new MatcheResource(Matche::create($request->all()));
    }

    public function update(UpdateMatcheRequest $request, $id)
    {
        $matche = Matche::find($id);

        if (!$matche) {
            return response()->json(['message' => 'Match not found'], 404);
        }

        $updatedMatchData = $request->json()->all();
        $matche->fill($updatedMatchData);
        $matche->save();
    }


    public function show($id)
    {
        $matche = new MatcheResource(Matche::find($id));
        return $matche;
    }

    public function destroy(DeleteMatcheRequest $request, $id)
    {   
        $matche = Matche::findOrFail($id);
        $matche->delete();

        return response()->json(['message' => 'Element deleted successfully']);
    }

    


}
