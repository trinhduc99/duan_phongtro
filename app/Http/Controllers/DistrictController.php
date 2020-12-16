<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Districts;

class DistrictController extends Controller
{
    public function getAllDistrict () {
        $districts = Districts::select('id', 'name')->get();
        return $districts;
    }
}
