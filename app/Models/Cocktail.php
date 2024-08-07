<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cocktail extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'name',
        'description',
        'method',
        'glass_type',
        'ingredients',
        'price',
    ];

    public function glasses()
    {
        return $this->belongsToMany(Glass::class, 'cocktail_glass');
    }
}
