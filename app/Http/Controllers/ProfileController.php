<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function layout()
    {
        $user = Auth::user();
        return view('layouts.profile', compact('user'));
    }

    public function index()
    {
        return view('front_end.profile.index');
    }

    public function create()
    {
        $categories = DB::table("categories")->get();
        $provinces = DB::table("province")->get(["_name", "id"]);
        return view('front_end.profile.add', compact('categories', 'provinces'));
    }


    public function getDistrict($id)
    {
        $districts = DB::table('district')->where('_province_id', $id)->get(["_name", "id"]);
        return response()->json($districts);
    }

    public function getWard($id, $id2)
    {
        $wards = DB::table('ward')->where('_district_id', $id)->where('_province_id',$id2)->get(['_name', 'id']);
        $streets = DB::table('street')->where('_district_id', $id)->where('_province_id',$id2)->get(['_name', 'id']);
        return response()->json([$wards,$streets]);
    }
    public function getStreet($id, $id2)
    {
        $streets = DB::table('street')->where('_district_id', $id)->where('_province_id',$id2)->get(['_name', 'id']);
        return response()->json([$streets]);
    }


}
