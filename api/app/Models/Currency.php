<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function name()
    {
        return $this->name;
    }

    public  function pairs()
    {
        return $this->belongsToMany(Pairs::class);
    }

    public static function getByName($name)
    {
        return self::where('name', $name);
    }
}
