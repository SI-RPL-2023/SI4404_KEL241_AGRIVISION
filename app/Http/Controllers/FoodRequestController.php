<?php

namespace App\Http\Controllers;

use App\Models\FoodRequest;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodRequestController extends Controller
{
    //
    public function index(){
        $data = FoodRequest::where('status','requested')->get();
        $accepeted = FoodRequest::where('status' , 'accepted')->get();
        $onprog = FoodRequest::where('status' , 'on progress')->get();
        $done = FoodRequest::where('status' , 'done')->get();
        return view('dashboard.foodReq.index' , ['data' => $data , 'accepted' => $accepeted , 'onprog' => $onprog , 'done'=>$done]);
    }

    public function acceptRequest($id){
        $data = FoodRequest::find($id);
        $data->status = 'accepted';
        $data->update();

        return redirect()->back()->with('success' , 'berhasil di accept');
    }

    public function rejectedRequest($id){
        $data = FoodRequest::find($id);
        $data->status = 'rejected';
        $data->update();

        return redirect()->back()->with('success' , 'berhasil di tolak');
    }

    public function runProgress($id){
        $data = FoodRequest::find($id);
        $data->status = 'on progress';
        $data->update();

        return redirect()->back()->with('success' , 'status berhasil update');
    }

    public function doneRequest($id){
        $data = FoodRequest::find($id);
        $data->status = 'done';
        $data->update();

        return redirect()->back()->with('success' , 'status berhasil di selesaikan');
    }


//    user section


        public function storeFoodRequest(Request $request){
        $data = new FoodRequest();
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
        $data->status = 'requested';
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $path = $file->storeAs('uploads' , $filename);
        $data->supported_document = $filename;
        $data->request_category = 'food';
        $data->save();

        return redirect()->back()->with('success' , 'berhasil merequest kebutuhan pangan');

        }


        public function downloadFIle($id){
            $data = FoodRequest::find($id);
            return response()->download(storage_path( 'app/uploads/' . $data->supported_document));
        }
}
