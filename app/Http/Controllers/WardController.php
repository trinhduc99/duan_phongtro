<?php

namespace App\Http\Controllers;

use App\Wards;
use Illuminate\Http\Request;

class WardController extends Controller
{
    public function getAllWard () {
        $wards = Wards::select('id', 'name')->get();
        return $wards;
    }
}
