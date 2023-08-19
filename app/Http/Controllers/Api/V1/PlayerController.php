<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Player;
use App\Http\Requests\V1\StorePlayerRequest;
use App\Http\Requests\V1\UpdatePlayerRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\playerResource;



class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Player::all();
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
    public function store(StorePlayerRequest $request)
    {
        return new PlayerResource(Player::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        
        return $player;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayerRequest $request, Player $player)
    {
        $player->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        $player->delete();
        return response()->json(['message' => 'Element deleted successfully']);
    }
}
