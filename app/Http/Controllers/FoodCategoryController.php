<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{

    public function index(){
        $data = FoodCategory::all();
        return view('dashboard.food.index' , ['data'=>$data]);
    }
    public function storeFood(Request $request){
        $data = new FoodCategory();
        $data->food_name = $request->food_name;
        $data->unit = $request->unit;
        $data->save();

        return redirect()->back()->with('success' , 'berhasil menambahkan food request');
    }

    public function updateFood($id,Request $request){
        $data = FoodCategory::find($id);
        $data->food_name = $request->food_name;
        $data->unit = $request->unit;
        $data->update();
        return redirect()->back()->with('success' , 'berhasil mengubah food request');
    }

    public function deleteFood($id){
        $data = FoodCategory::find($id);
        $data->delete() ;

        return redirect()->back()->with('success' , 'Berhasil Mengahpus Data');
    }
}
