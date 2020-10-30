<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {
        $categories = DB::table('categories')->get();
        return view('back_end.category.index',compact('categories'));
    }
}
