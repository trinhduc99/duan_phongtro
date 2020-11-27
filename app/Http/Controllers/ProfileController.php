<?php

namespace App\Http\Controllers;

use App\Accommondation;
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
        return view('layouts.profile', compact('user'));
    }

    public function index()
    {
        return view('front_end.profile.index');
    }

    public function create()
    {
        // local city
        $categories = DB::table("categories")->get();
        $provinces = DB::table("province")->get(["_name", "id"]);
        $items = DB::table('items')->get(['name', 'id']);
        $acc_type_toilets = Accommondation::ACC_TYPE_TOILET;
        $acc_close_times = Accommondation::ACC_CLOSE_TIME;
        $acc_deposit_prices = Accommondation::ACC_DEPOSIT_PRICE;
        $acc_user_genders = Accommondation::ACC_USER_GENDER;
        $acc_user_objects = Accommondation::ACC_USER_OBJECT;
        $acc_electric_calculate_methods = Accommondation::ACC_ELECTRIC_CALCULATE_METHOD;
        $acc_water_calculate_methods = Accommondation::ACC_WATER_CALCULATE_METHOD;
        return view('front_end.profile.add', compact('categories',
            'provinces', 'acc_type_toilets', 'items',
            'acc_close_times', 'acc_deposit_prices',
            'acc_user_genders', 'acc_user_objects',
            'acc_electric_calculate_methods', 'acc_water_calculate_methods'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
    public function storeImage(Request $request)
    {
dd($request->all());
    }


    //local city
    public function getDistrict($id)
    {
        $districts = DB::table('district')->where('_province_id', $id)->get(["_name", "id"]);
        return response()->json($districts);
    }

    public function getWard($id, $id2)
    {
        $wards = DB::table('ward')->where('_district_id', $id)->where('_province_id', $id2)->get(['_name', 'id']);
        $streets = DB::table('street')->where('_district_id', $id)->where('_province_id', $id2)->get(['_name', 'id']);
        $projects = DB::table('project')->where('_district_id', $id)->where('_province_id', $id2)->get(['_name', 'id']);
        return response()->json([$wards, $streets,$projects]);
    }



}
