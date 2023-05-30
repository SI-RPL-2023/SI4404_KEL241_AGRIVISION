<?php

namespace App\Http\Controllers;

use App\Models\FoodRequest;
use App\Models\Kecamatan;
use App\Models\NonFoodRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NonFoodRequestController extends Controller
{
    public function index(){
        $data = NonFoodRequest::where('status','requested')->get();
        $accepeted = NonFoodRequest::where('status' , 'accepted')->get();
        $onprog = NonFoodRequest::where('status' , 'on progress')->get();
        $done = NonFoodRequest::where('status' , 'done')->get();
        return view('dashboard.NonFoodRequest.index' , ['data' => $data , 'accepted' => $accepeted , 'onprog' => $onprog , 'done'=>$done]);
    }

    public function acceptRequest($id){
        $data = NonFoodRequest::find($id);
        $data->status = 'accepted';
        $data->update();

        return redirect()->back()->with('success' , 'berhasil di accept');
    }

    public function rejectedRequest($id){
        $data = NonFoodRequest::find($id);
        $data->status = 'rejected';
        $data->update();

        return redirect()->back()->with('success' , 'berhasil di tolak');
    }

    public function runProgress($id){
        $data = NonFoodRequest::find($id);
        $data->status = 'on progress';
        $data->update();

        return redirect()->back()->with('success' , 'status berhasil update');
    }

    public function doneRequest($id){
        $data = NonFoodRequest::find($id);
        $data->status = 'done';
        $data->update();

        return redirect()->back()->with('success' , 'status berhasil di selesaikan');
    }

    //user

    public function storeRequest(Request  $request){

        $data = new NonFoodRequest();
        $kecamatan = Kecamatan::find($request->kecamatan_id);
        $data->user_id = Auth::user()->id;
        $data->kecamatan_id = $kecamatan->id;
        $data->kota_id = $kecamatan->kota->id;
        $data->provinsi_id = $kecamatan->kota->provinsi_id;
        $data->place_code = 0;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->number = $request->number;
        $data->status = 'requested';
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $path = $file->storeAs('uploads' , $filename);
        $data->supported_document = $filename;
        $data->request_category = 'Non Food';
        $data->save();

        return redirect()->back()->with('success' , 'berhasil merequest kebutuhan pangan');

    }

    public function downloadFIle($id){
        $data = NonFoodRequest::find($id);
        return response()->download(storage_path( 'app/uploads/' . $data->supported_document));
    }

    public function downloadFIleFood($id){
        $data = FoodRequest::find($id);
        return response()->download(storage_path( 'app/uploads/' . $data->supported_document));
    }
}
