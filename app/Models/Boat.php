<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BoatFeatures;
use App\Models\Additions;


class Boat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'high_season_price',
        'low_season_price',
        'is_recomended'
    ];

    public function features(){
        return $this->hasOne(BoatFeatures::class);
    }

    public function additions()
    {
        return $this->belongsToMany(Additions::class);
    }
}
