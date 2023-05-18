<?php

namespace App\Http\Controllers;

use App\Models\AgriMaping;
use App\Models\FoodCategory;
use App\Models\FoodProduction;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class agriController extends Controller
{
    public function index(){
        $data = AgriMaping::all();
        $kecamatan = Kecamatan::all();
        $food = FoodCategory::all();
        return view('dashboard.agri.index' , ['data'=>$data , 'kecamatan' => $kecamatan , 'food' => $food]);

    }

    public function storeAgri(Request $request){
        $data = new AgriMaping();
        $kecamatan = Kecamatan::find($request->kecamatan_id);
        $data->user_id = Auth::user()->id;
        $data->kecamatan_id = $kecamatan->id;
        $data->kota_id = $kecamatan->kota->id;
        $data->provinsi_id = $kecamatan->kota->provinsi_id;
        $data->place_code = 0;
        $data->food_id = $request->food_id;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->number = $request->number;
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success' , 'berhasil menambahkan data');
    }

    public function updateAgri($id , Request  $request){
        $data = AgriMaping::find($id);
        $kecamatan = Kecamatan::find($request->kecamatan_id);
        $data->user_id = Auth::user()->id;
        $data->kecamatan_id = $kecamatan->id;
        $data->kota_id = $kecamatan->kota->id;
        $data->provinsi_id = $kecamatan->kota->provinsi_id;
        $data->place_code = 0;
        $data->food_id = $request->food_id;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->number = $request->number;
        $data->status = $request->status;
        $data->update();

        return redirect()->back()->with('success' , 'berhasil memperbaharui data');

    }

    public function deleteAgri($id){
        $data =  AgriMaping::find($id);
        $data->delete();
        return redirect()->back()->with('success' , 'sukses menghapus data');
    }
}
