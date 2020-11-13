<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
{

    public function index()
    {
        $categories = DB::table("categories")->get();
        $provinces = DB::table("province")->get(["_name","id"]);
        return view('front_end.index', compact('categories', 'provinces'));
    }

    public function getDistrict($id)
    {
        $districts= DB::table('district')->where('_province_id',$id)->get(["_name","id"]);
        return response()->json($districts);
    }
    public function getWard($id)
    {
        $wards = DB::table('ward')->where('_district_id',$id)->get(['_name','id']);
        return response()->json($wards);
    }



}
