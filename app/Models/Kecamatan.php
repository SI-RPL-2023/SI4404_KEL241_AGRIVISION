<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';

    public function kota(){
        return $this->belongsTo(Kota::class , 'kota_id' , 'id');
    }

    public function pasar(){
        return $this->hasMany(MarketMaping::class , 'kecamatan_id' , 'id');
    }

    public function pabrik(){
        return $this->hasMany(FoodProduction::class , 'kecamatan_id' , 'id');
    }

    public function agri(){
        return $this->hasMany(AgriMaping::class , 'kecamatan_id' , 'id');
    }

    public function foodRequest(){
        return $this->hasMany(FoodRequest::class , 'kecamatan_id' , 'id');
    }

    public function nonFoodRequest(){
        return $this->hasMany(NonFoodRequest::class , 'kecamatan_id' , 'id');
    }
}
