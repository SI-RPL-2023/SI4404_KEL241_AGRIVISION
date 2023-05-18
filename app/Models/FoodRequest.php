<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodRequest extends Model
{
    use HasFactory;

    protected $table = 'food_request_need';

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

    public function food(){
        return $this->belongsTo(FoodCategory::class , 'food_id' , 'id');
    }
}
