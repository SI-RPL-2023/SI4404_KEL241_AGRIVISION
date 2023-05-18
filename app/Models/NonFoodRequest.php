<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonFoodRequest extends Model
{
    use HasFactory;

        protected $table = 'non_food_production';

    public function kota(){
        return $this->belongsTo(Kota::class , 'kota_id' , 'id');
    }

    public function provinsi(){
        return $this->belongsTo(Provinsi::class , 'provinsi_id' , 'id');
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class , 'kecamatan_id' , 'id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

}
