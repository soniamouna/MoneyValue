<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pairs extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate',
        'currency_from_id',
        'currency_to_id',
    ];

    public function currencyFrom()
    {
        return $this->belongsTo(Currency::class, 'currency_from_id');
    }

    public function currencyTo()
    {
        return $this->belongsTo(Currency::class, 'currency_to_id');
    }

    public function conversion()
    {
        return $this->hasOne(Conversion::class);
    }

    public function rate()
    {
        return $this->rate;
    }
    
    public static function getPairsByCurrencies(Currency $currencyFrom, Currency $currencyTo)
    {
        $from = $currencyFrom->id;
        $to = $currencyTo->id;
        $pairs = self::where('currency_from_id', $from)->orWhere('currency_from_id', $to)->where('currency_to_id', $to)->orWhere('currency_to_id', $from)->first();
        if(!$pairs) return null;
        return $pairs;
    }


}
