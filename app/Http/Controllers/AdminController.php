<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Ramsey\Uuid\Exception\TimeSourceException;

class AdminController extends Controller
{
    public function index(){
        return view('dashboard.dashboard');
    }

    public function wargaProvinsiIndex(){
        $data = Provinsi::all();
        return view('dashboard.pemetaan.provinsiIndex' , ['data'=>$data]);
    }

    public function wargaKotaIndex(){
        $data = Kota::all();
        $provinsi = Provinsi::all();
        return view('dashboard.pemetaan.kotaIndex' , ['data'=>$data , 'provinsi' => $provinsi]);
    }

    public function wargaKecamatanIndex(){
        $data = Kecamatan::all();
        $kota = Kota::all();
        return view('dashboard.pemetaan.kecamatanIndex' , ['data'=>$data , 'kota'=>$kota]);
    }



    public function storeProvinsi(Request $request){
        $data = new Provinsi();
        $data->name = $request->name;
        $data->no_citizen = $request->no_citizen;
        $data->no_head_citizen = $request->no_head_citizen;
        $data->save();

        return redirect()->back()->with('success' , 'sukses menambah provinsi');
    }

    public function updateProvinsi($id , Request $request){
        $data = Provinsi::find($id);
        $data->name = $request->name;
        $data->no_citizen = $request->no_citizen;
        $data->no_head_citizen = $request->no_head_citizen;
        $data->update();

        return redirect()->back()->with('success' , 'sukses mengubah provinsi');
    }


    public function deleteProvinsi($id){
        $data = Provinsi::find($id);
        $data->delete();

        return redirect()->back()->with('success' , 'sukses mendelete provinsi');
    }

    public function storeKota(Request $request){
        $data = new Kota();
        $data->name = $request->name;
        $data->provinsi_id = $request->id_provinsi;
        $data->no_citizen = $request->no_citizen;
        $data->no_head_citizen = $request->no_head_citizen;
        $data->save();

        return redirect()->back()->with('success' , 'sukses menambah kota');
    }

    public function updateKota($id , Request $request){
        $data = Kota::find($id);
        $data->name = $request->name;
        $data->provinsi_id = $request->id_provinsi;
        $data->no_citizen = $request->no_citizen;
        $data->no_head_citizen = $request->no_head_citizen;
        $data->update();

        return redirect()->back()->with('success','succes mengubah data!!');
    }

    public function deleteKota($id){
        $data = Kota::find($id);
        $data->delete();
        return redirect()->back()->with('success' , 'sukses mendelete kota');
    }

    public function storeKecamatan(Request $request){
        $data = new Kecamatan();
        $data->name = $request->name;
        $data->kota_id = $request->kota_id ;
        $data->no_citizen = $request->no_citizen;
        $data->no_head_citizen = $request->no_head_citizen;
        $data->save();

        return redirect()->back()->with('success' , 'sukses menambahkan kecamatan');
    }

    public function updateKecamatan($id,Request $request){
        $data = Kecamatan::find ($id);
        $data->name = $request->name;
        $data->kota_id = $request->kota_id ;
        $data->no_citizen = $request->no_citizen;
        $data->no_head_citizen = $request->no_head_citizen;
        $data->update();

        return redirect()->back()->with('success' , 'sukses mengubah data');
    }

    public function deleteKecamatan($id){
        $data = Kecamatan::find($id);
        $data->delete();

        return redirect()->back()->with('success' , 'sukses menghapus data');
    }


}
