<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    use HasFactory;
    protected $fillable = [
        'count'
    ];

    public function pairs()
    {
        return $this->belongsTo(Pairs::class, "pairs_id");
    }

    public function count()
    {
        return $this->count;
    }

    public static function getPairById(Pairs $pairs)
    {
        $pairsId = $pairs->id;
        $pairs = self::where('pairs_id', $pairsId);
        if(!$pairs) return null;
        return $pairs;
    }
}
