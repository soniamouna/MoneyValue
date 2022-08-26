<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pairs;
use Illuminate\Http\Request;

class PairsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pairs = Pairs::with('currencyFrom', 'currencyTo')->get();
        if(!$pairs) return response()->json(['error' => 'Aucune paire disponible'], 404);
        return response()->json($pairs, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pairs = Pairs::create($request->all());
        return response()->json($pairs);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pairs  $pairs
     * @return \Illuminate\Http\Response
     */
    public function show(Pairs $pairs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pairs  $pairs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pairs = Pairs::find($id);
        $pairs->update($request->all());
        return response()->json($pairs);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pairs  $pairs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pairs = Pairs::find($id);
        // On supprime l'utilisateur
        $pairs->delete();

        // On retourne la réponse JSON
        return response()->json(['message'=>'supp reussi']);
    }
}
