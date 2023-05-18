<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'provinsi';

    public function kota(){
        return $this->hasMany(Kota::class , 'provinsi_id' , 'id');
    }

    public function pasar(){
        return $this->hasMany(MarketMaping::class , 'provinsi_id' , 'id');
    }

    public function pabrik(){
        return $this->hasMany(FoodProduction::class , 'provinsi_id' , 'id');
    }

    public function agri(){
        return $this->hasMany(AgriMaping::class , 'provinsi_id' , 'id');
    }

    public function foodRequest(){
        return $this->hasMany(FoodRequest::class , 'provinsi_id' , 'id');
    }

    public function nonFoodRequest(){
        return $this->hasMany(NonFoodRequest::class , 'provinsi_id  ' , 'id');
    }
}
