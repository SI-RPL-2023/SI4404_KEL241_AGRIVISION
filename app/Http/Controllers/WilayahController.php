<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\NonFoodRequest;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class WilayahController extends Controller
{

    public function banding(){
        $kecamatan = Kecamatan::inRandomOrder()->first();
        $kecamatan2 = Kecamatan::inRandomOrder()->first();

        $kecamatanAll = Kecamatan::all();
        $provinsi = Provinsi::all();
        $kota = Kota::all();

        //1
        $pasar = count($kecamatan->pasar);
        $pabrik = count($kecamatan->pabrik);
        $agri = count($kecamatan->agri);
        $foodRequest = count($kecamatan->foodRequest);
        $nonFoodRequest = count($kecamatan->nonFoodRequest);

        //2
        $pasar2 = count($kecamatan2->pasar);
        $pabrik2 = count($kecamatan2->pabrik);
        $agri2 = count($kecamatan2->agri);
        $foodRequest2 = count($kecamatan2->foodRequest);
        $nonFoodRequest2 = count($kecamatan2->nonFoodRequest);


        return view('dashboard.visualisasi.banding' , ['kecamatan' =>$kecamatan , 'pasar' => $pasar , 'pabrik'=>$pabrik , 'agri'=>$agri ,
            'foodRequest' => $foodRequest , 'nonFoodRequest'=>$nonFoodRequest , 'kecamatanAll' => $kecamatanAll , 'provinsi' => $provinsi ,
            'kota' => $kota , 'kecamatan2' =>$kecamatan2 ,
            'pasar2'=>$pasar2 , 'pabrik2' => $pabrik2 , 'agri2' => $agri2 , 'foodRequest2' => $foodRequest2 , 'nonFoodRequest2' => $nonFoodRequest2]);
    }

    public function bandingKota(Request  $request){
        $kecamatan = Kota::find($request->kecamatan_id);
        $kecamatan2 = Kota::find($request->kecamatan_id2);

        $kecamatanAll = Kecamatan::all();
        $provinsi = Provinsi::all();
        $kota = Kota::all();

        //1
        $pasar = count($kecamatan->pasar);
        $pabrik = count($kecamatan->pabrik);
        $agri = count($kecamatan->agri);
        $foodRequest = count($kecamatan->foodRequest);
        $nonFoodRequest = count($kecamatan->nonFoodRequest);

        //2
        $pasar2 = count($kecamatan2->pasar);
        $pabrik2 = count($kecamatan2->pabrik);
        $agri2 = count($kecamatan2->agri);
        $foodRequest2 = count($kecamatan2->foodRequest);
        $nonFoodRequest2 = count($kecamatan2->nonFoodRequest);


        return view('dashboard.visualisasi.banding' , ['kecamatan' =>$kecamatan , 'pasar' => $pasar , 'pabrik'=>$pabrik , 'agri'=>$agri ,
            'foodRequest' => $foodRequest , 'nonFoodRequest'=>$nonFoodRequest , 'kecamatanAll' => $kecamatanAll , 'provinsi' => $provinsi ,
            'kota' => $kota , 'kecamatan2' =>$kecamatan2 ,
            'pasar2'=>$pasar2 , 'pabrik2' => $pabrik2 , 'agri2' => $agri2 , 'foodRequest2' => $foodRequest2 , 'nonFoodRequest2' => $nonFoodRequest2]);

    }


    public function bandingKecamatan(Request  $request){
        $kecamatan = Kecamatan::find($request->kecamatan_id);
        $kecamatan2 = Kecamatan::find($request->kecamatan_id2);

        $kecamatanAll = Kecamatan::all();
        $provinsi = Provinsi::all();
        $kota = Kota::all();

        //1
        $pasar = count($kecamatan->pasar);
        $pabrik = count($kecamatan->pabrik);
        $agri = count($kecamatan->agri);
        $foodRequest = count($kecamatan->foodRequest);
        $nonFoodRequest = count($kecamatan->nonFoodRequest);

        //2
        $pasar2 = count($kecamatan2->pasar);
        $pabrik2 = count($kecamatan2->pabrik);
        $agri2 = count($kecamatan2->agri);
        $foodRequest2 = count($kecamatan2->foodRequest);
        $nonFoodRequest2 = count($kecamatan2->nonFoodRequest);


        return view('dashboard.visualisasi.banding' , ['kecamatan' =>$kecamatan , 'pasar' => $pasar , 'pabrik'=>$pabrik , 'agri'=>$agri ,
            'foodRequest' => $foodRequest , 'nonFoodRequest'=>$nonFoodRequest , 'kecamatanAll' => $kecamatanAll , 'provinsi' => $provinsi ,
            'kota' => $kota , 'kecamatan2' =>$kecamatan2 ,
            'pasar2'=>$pasar2 , 'pabrik2' => $pabrik2 , 'agri2' => $agri2 , 'foodRequest2' => $foodRequest2 , 'nonFoodRequest2' => $nonFoodRequest2]);

    }

    public function bandingProvinsi(Request $request){
        $kecamatan = Provinsi::find($request->kecamatan_id);
        $kecamatan2 = Provinsi::find($request->kecamatan_id2);

        $kecamatanAll = Kecamatan::all();
        $provinsi = Provinsi::all();
        $kota = Kota::all();

        //1
        $pasar = count($kecamatan->pasar);
        $pabrik = count($kecamatan->pabrik);
        $agri = count($kecamatan->agri);
        $foodRequest = count($kecamatan->foodRequest);
        $nonFoodRequest = count(NonFoodRequest::where('provinsi_id' , $request->kecamatan_id)->get());


        //2
        $pasar2 = count($kecamatan2->pasar);
        $pabrik2 = count($kecamatan2->pabrik);
        $agri2 = count($kecamatan2->agri);
        $foodRequest2 = count($kecamatan2->foodRequest);
        $nonFoodRequest2 = count(NonFoodRequest::where('provinsi_id' , $request->kecamatan_id2)->get());



        return view('dashboard.visualisasi.banding' , ['kecamatan' =>$kecamatan , 'pasar' => $pasar , 'pabrik'=>$pabrik , 'agri'=>$agri ,
            'foodRequest' => $foodRequest , 'nonFoodRequest'=>$nonFoodRequest , 'kecamatanAll' => $kecamatanAll , 'provinsi' => $provinsi ,
            'kota' => $kota , 'kecamatan2' =>$kecamatan2 ,
            'pasar2'=>$pasar2 , 'pabrik2' => $pabrik2 , 'agri2' => $agri2 , 'foodRequest2' => $foodRequest2 , 'nonFoodRequest2' => $nonFoodRequest2]);

    }

    public function wilayah(){
        $kecamatan = Kecamatan::inRandomOrder()->first();
        $kecamatanAll = Kecamatan::all();
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $pasar = count($kecamatan->pasar);
        $pabrik = count($kecamatan->pabrik);
        $agri = count($kecamatan->agri);
        $foodRequest = count($kecamatan->foodRequest);
        $nonFoodRequest = count($kecamatan->nonFoodRequest);
        return view('dashboard.visualisasi.wilayah' , ['kecamatan' =>$kecamatan , 'pasar' => $pasar , 'pabrik'=>$pabrik , 'agri'=>$agri ,
            'foodRequest' => $foodRequest , 'nonFoodRequest'=>$nonFoodRequest , 'kecamatanAll' => $kecamatanAll , 'provinsi' => $provinsi ,
            'kota' => $kota]);

    }

    public function kecamatan(Request $request){
        $kecamatan = Kecamatan::find($request->kecamatan_id);
        $kecamatanAll = Kecamatan::all();
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $pasar = count($kecamatan->pasar);
        $pabrik = count($kecamatan->pabrik);
        $agri = count($kecamatan->agri);
        $foodRequest = count($kecamatan->foodRequest);
        $nonFoodRequest = count($kecamatan->nonFoodRequest);
        return view('dashboard.visualisasi.wilayah' , ['kecamatan' =>$kecamatan , 'pasar' => $pasar , 'pabrik'=>$pabrik , 'agri'=>$agri ,
            'foodRequest' => $foodRequest , 'nonFoodRequest'=>$nonFoodRequest , 'kecamatanAll' => $kecamatanAll , 'provinsi' => $provinsi ,
            'kota' => $kota]);
    }

    public function kota(Request $request){
        $kecamatan = Kota::find($request->kecamatan_id);
        $kecamatanAll = Kecamatan::all();
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $pasar = count($kecamatan->pasar);
        $pabrik = count($kecamatan->pabrik);
        $agri = count($kecamatan->agri);
        $foodRequest = count($kecamatan->foodRequest);
        $nonFoodRequest = count($kecamatan->nonFoodRequest);
        return view('dashboard.visualisasi.wilayah' , ['kecamatan' =>$kecamatan , 'pasar' => $pasar , 'pabrik'=>$pabrik , 'agri'=>$agri ,
            'foodRequest' => $foodRequest , 'nonFoodRequest'=>$nonFoodRequest , 'kecamatanAll' => $kecamatanAll , 'provinsi' => $provinsi ,
            'kota' => $kota]);

    }

    public function provinsi(Request $request){
        $kecamatan = Provinsi::find($request->kecamatan_id);
        $kecamatanAll = Kecamatan::all();
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $pasar = count($kecamatan->pasar);
        $pabrik = count($kecamatan->pabrik);
        $agri = count($kecamatan->agri);
        $foodRequest = count($kecamatan->foodRequest);
        $nonFoodRequest = count(NonFoodRequest::where('provinsi_id' , $request->kecamatan_id)->get());


        return view('dashboard.visualisasi.wilayah' , ['kecamatan' =>$kecamatan , 'pasar' => $pasar , 'pabrik'=>$pabrik , 'agri'=>$agri ,
            'foodRequest' => $foodRequest , 'nonFoodRequest'=>$nonFoodRequest , 'kecamatanAll' => $kecamatanAll , 'provinsi' => $provinsi ,
            'kota' => $kota]);
    }
}
