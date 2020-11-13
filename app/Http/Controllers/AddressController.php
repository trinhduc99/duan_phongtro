<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provinces;
use App\Streets;
use App\Wards;
use App\Districts;

class AddressController extends Controller
{
    public function getAllProvince ()
    {
        $province = Provinces::select('id', 'name')->get();
        return view('pages.test', ['data' => $province]);
    }
    public function getAllDistrictByProvinceId ()
    {
        $provinceId = 1;
        $district = Districts::select('id', 'name')->where('province_id', $provinceId)->get();
        return view('pages.test', ['data' => $district]);
    }

    public function getAllWardByDistrictId ()
    {
        $districtId = 1;
        $ward = Wards::select('id', 'name')->where('district_id', $districtId)->get();
        return view('pages.test', ['data' => $ward]);
    }
    public function getAllStreetByDistrictId ()
    {
        $districtId = 1;
        $street = Streets::select('id', 'name')->where('district_id', $districtId)->get();
        return view('pages.test', ['data' => $street]);
    }

//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        //
//    }
//
//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
