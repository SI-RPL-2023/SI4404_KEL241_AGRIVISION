<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use App\Models\FoodProduction;
use App\Models\Kecamatan;
use App\Models\MarketMaping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketMapingController extends Controller
{
    public function index(){
        $data = MarketMaping::all();
        $kecamatan = Kecamatan::all();
        return view('dashboard.market.index' , ['data'=>$data , 'kecamatan' => $kecamatan ]);

    }

    public function storeMarket(Request $request){
        $data = new MarketMaping();
        $kecamatan = Kecamatan::find($request->kecamatan_id);
        $data->user_id = Auth::user()->id;
        $data->kecamatan_id = $kecamatan->id;
        $data->kota_id = $kecamatan->kota->id;
        $data->provinsi_id = $kecamatan->kota->provinsi_id;
        $data->place_code = 0;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->number = $request->number;
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success' , 'berhasil menambahkan data');
    }

    public function updateMarket($id , Request  $request){
        $data = FoodProduction::find($id);
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

    public function deleteMarket($id){
        $data =  MarketMaping::find($id);
        $data->delete();
        return redirect()->back()->with('success' , 'sukses menghapus data');
    }
}
