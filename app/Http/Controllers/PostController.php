<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Validation\Rule;
use function MongoDB\BSON\toJSON;


class PostController extends Controller
{
    public function index ()
    {
        $data = Post::where('is_delete', 0)->where('in_duration', 1)->where('is_booked', 0)->limit(10)->orderBy('service_id', 'desc')->get();
        return view('pages.test', ['data' => $data]);
    }
    public function searchPost (Request $request) {

        $validator = Validator::make($request->all(), [
            'category_id' => 'nullable|bail|integer',
            'province_id' => 'nullable|bail|integer',
            'district_id' => 'nullable|bail|integer',
            'street_id' => 'nullable|bail|integer',
            'ward_id' => 'nullable|bail|integer',
        ]);
        $data = [];
        if ($validator->fails()) {
            $data = ['http_error' => 400, 'error' => true, 'message' => 'Bad request'];
            $data = json_encode($data);
            return view('pages.test', ['data' => $data]);
        }
        $categoryId = $request['category_id'];
        $provinceId = $request['province_id'];
        $districtId = $request['district_id'];
        $streetId = $request['street_id'];
        $wardId = $request['ward_id'];
        $priceMin = '';
        $priceMax = '';
        $arrSearch = [
            [
                'column' => 'category_id',
                'value' => $categoryId
            ],
            [
                'column' => 'province_id',
                'value' => $provinceId
            ],
            [
                'column' => 'district_id',
                'value' => $districtId
            ],
            [
                'column' => 'street_id',
                'value' => $streetId
            ],
            [
                'column' => 'ward_id',
                'value' => $wardId
            ],

        ];
        $data = Post::where('is_delete', 0)->where('in_duration', 1)->SearchPost($arrSearch)->where('is_booked', 0)->limit(10)->orderBy('service_id', 'desc')->get();
        return view('pages.test', ['data' => $data]);
    }


    function create (Request $request) {

        $validator = Validator::make($request->all(), [
            'category_id' => 'required|bail|integer',
            'title' => 'required|bail|min:10|max:90',
            'description' => 'required|bail|min:100',
            'province_id' => 'required|bail|integer',
            'district_id' => 'required|bail|integer',
            'street_id' => 'required|bail|integer',
            'ward_id' => 'required|bail|integer',
            'address' => 'required|bail|min:8',
            'price' => 'required|bail|numeric',
            'area' => 'required|bail|numeric',
            'gender_user' => ['required', 'bail', Rule::in(Post::$POST_STATUS)],
            'user_type' => ['required', 'bail', Rule::in(Post::$USER_TYPE)],
            'electric_price' => 'required|bail|numeric',
            'electric_calculate_method' => ['required', 'bail', Rule::in(Post::$USER_TYPE)],

        ]);
        $data = [];
        $post = Post::create([
            'category_id' => $request['category_id'],
            'title' => $request['title'],
            'description' => $request['description'],
            'province_id' => $request['province_id'],
            'district_id' => $request['district_id'],
            'street_id' => $request['street_id'],
            'ward_id' => $request['ward_id'],
            'address' => $request['address'],
            'price' => $request['price'],
            'area' => $request['area'],
            'gender_user' => $request['gender_user'],
            'user_type' => $request['user_type'],
            'electric_price' => $request['electric_price'],
            'electric_calculate_method' => $request['electric_calculate_method'],
            'water_price' => $request['water_price'],
            'water_calculate_method' => $request['water_calculate_method'],
            'close_time' => $request['close_time'],
            'deposit' => $request['deposit'],
            'is_booked' => $request['is_booked'],
            'status' => Post::$POST_STATUS['pending'],
            'creator_id' => $request['creator_id'],
            'start_date' => $request['start_date'],
            'finish_date' => $request['finish_date'],
            'service_id' => $request['service_id'],
            'service_type' => $request['service_type'],
            'number_day_up' => $request['number_day_up']

        ]);
        $data = $post;
        return view('pages.test', ['data' => $data]);
    }

    function store () {
        $request = '';
        if (isset($request['id'])) {
            // save all data change
        } else {
            // return Thao tac gap van de
        }
        // return Thao tac thanh cong
    }


}
