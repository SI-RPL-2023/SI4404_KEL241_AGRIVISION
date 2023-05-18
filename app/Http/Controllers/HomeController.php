<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use App\Models\FoodRequest;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\NonFoodRequest;
use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $food = FoodCategory::all();
        $kecamatan = Kecamatan::all();

        $kecamatanDone = FoodRequest::where('status' , 'done')->get();
        $kecamatanNonFoodDone = NonFoodRequest::where('status' , 'done')->get();

        $kecamatanOnProg = FoodRequest::where('status' , 'on progress')->get();
        $kecamatanNonFoodOnProg = NonFoodRequest::where('status' , 'on progress')->get();

        $kecamatanRequested = FoodRequest::where('status' , 'requested')->get();
        $kecamatanNonFoodRequested = NonFoodRequest::where('status' , 'reqeuested')->get();

        $onprog = count($kecamatanOnProg) + count($kecamatanNonFoodOnProg);

        $done = count($kecamatanDone) + count($kecamatanNonFoodDone);

        $request = count($kecamatanRequested) + count($kecamatanNonFoodRequested);


        if (Auth::user()){
            $foodreq = FoodRequest::where('user_id' , Auth::user()->id)->get();
            $nonfoodreq = NonFoodRequest::where('user_id' , Auth::user()->id)->get();
            return view('landing-page.index' , ['food'=>$food , 'kecamatan'=>$kecamatan , 'foodreq' => $foodreq , 'foodnonreq'=>$nonfoodreq , 'done' => $done , 'onprog' => $onprog , 'requested' => $request]);
        }

        return view('landing-page.index' , ['food'=>$food , 'kecamatan'=>$kecamatan , 'done' => $done , 'onprog' => $onprog , 'requested' => $request]);

    }

    public function updateProfile(Request $request){
        $tes = User::find(Auth::user()->id);
        $tes->name = $request->name;
        $tes->NIK = $request->NIK;
        $tes->email = $request->email;
        $tes->update();

        return redirect()->back();
    }


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


        return view('banding' , ['kecamatan' =>$kecamatan , 'pasar' => $pasar , 'pabrik'=>$pabrik , 'agri'=>$agri ,
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


        return view('.banding' , ['kecamatan' =>$kecamatan , 'pasar' => $pasar , 'pabrik'=>$pabrik , 'agri'=>$agri ,
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


        return view('banding' , ['kecamatan' =>$kecamatan , 'pasar' => $pasar , 'pabrik'=>$pabrik , 'agri'=>$agri ,
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



        return view('banding' , ['kecamatan' =>$kecamatan , 'pasar' => $pasar , 'pabrik'=>$pabrik , 'agri'=>$agri ,
            'foodRequest' => $foodRequest , 'nonFoodRequest'=>$nonFoodRequest , 'kecamatanAll' => $kecamatanAll , 'provinsi' => $provinsi ,
            'kota' => $kota , 'kecamatan2' =>$kecamatan2 ,
            'pasar2'=>$pasar2 , 'pabrik2' => $pabrik2 , 'agri2' => $agri2 , 'foodRequest2' => $foodRequest2 , 'nonFoodRequest2' => $nonFoodRequest2]);

    }
}
