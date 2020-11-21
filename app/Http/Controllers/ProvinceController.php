<?php

namespace App\Http\Controllers;

use App\Provinces;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function getAllProvince ()
    {
        $provinces = Provinces::select('id', 'name')->get();
        return $provinces;
    }
}
