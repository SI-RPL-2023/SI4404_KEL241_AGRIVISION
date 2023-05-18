<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $table = 'kota';

    public function provinsi(){
        return $this->belongsTo(Provinsi::class , 'provinsi_id' , 'id');
    }

    public function kecamatan(){
        return $this->hasMany(Kecamatan::class , 'kota_id' , 'id');
    }


    public function pasar(){
        return $this->hasMany(MarketMaping::class , 'kota_id' , 'id');
    }

    public function pabrik(){
        return $this->hasMany(FoodProduction::class , 'kota_id' , 'id');
    }

    public function agri(){
        return $this->hasMany(AgriMaping::class , 'kota_id' , 'id');
    }

    public function foodRequest(){
        return $this->hasMany(FoodRequest::class , 'kota_id' , 'id');
    }

    public function nonFoodRequest(){
        return $this->hasMany(NonFoodRequest::class , 'kota_id' , 'id');
    }
}
