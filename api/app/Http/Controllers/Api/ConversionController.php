<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversion;
use App\Models\Currency;
use App\Models\Pairs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConversionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function convert(Request $request){
        $validate = Validator::make($request->all(), [
            'from' => 'required|alpha',
            'to' => 'required|alpha',
            'amount' => 'required|min:0',
            'reverse'=>'required|boolean'
        ]);
        // Si les paramètres ne conviennent un message d'erreur est renvoyé
        if($validate->fails()){
            return response()->json(['message' => 'Validation failed', 'errors' => $validate->errors()], 422);
        }
        $from=$request->query('from');
        $to=$request->query('to');

        //Récupérer les devises par leur nom
        $currencyFrom = Currency::getByName($from)->first();
        $currencyTo = Currency::getByName($to)->first();
        $amount = $request->query('amount') ?? 1;
        $reverse=$request->query('reverse');

        //Si les paires n'existent pas, renvoyer un message d'erreur 
        if (!$currencyFrom || !$currencyTo) return response()->json(['error' => '`from` or `to` parameters must be valid currency codes'], 404);
        //Si les paires sont identiques, renvoyer un message d'erreur 
        if ($from == $to) return response()->json(['error' => '`from` and `to` cannot be the same'], 400);

        //Récupérer la paire en fonction des devises données
        $pairs = Pairs::getPairsByCurrencies($currencyFrom, $currencyTo);
        //Vérifier si la paire existe, sinon un message d'erreur sera renvoyé
        if ($pairs == null) return response()->json(['error' => 'Pairs not found'], 404);
        
        //Si la paire existe 
        //Vérifier s'il faut faire le reverse
        if($reverse == true) {
            $converted = $amount * 1/$pairs->rate;
            $data = [
                'amount_currency_from' => $amount,
                'code_currency_from' => $request->query('to'),
                'code_currency_to' => $request->query('from'),
                'amount_currency_to' => $converted,
                
            ];
        }else {
            $converted = $amount * $pairs->rate;

            $data = [
                'amount_currency_from' => $amount,
                'code_currency_from' => $request->query('from'),
                'code_currency_to' => $request->query('to'),
                'amount_currency_to' => $converted,
                
            ];
        }

        //Renvoyer la donnée après la conversion 
        return response()->json(['message' => 'Convert success', $data],200);
    
    
    }
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conversion  $conversion
     * @return \Illuminate\Http\Response
     */
    public function show(Conversion $conversion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conversion  $conversion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conversion $conversion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conversion  $conversion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversion $conversion)
    {
        //
    }
}
