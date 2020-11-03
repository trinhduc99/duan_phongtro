<?php

namespace App\Http\Controllers;

use App\GroupUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Validation\Rule;


class PostController extends Controller
{
    /*
     *  Get all post
    */
    public function index ()
    {
        $data = Post::where('is_deleted', 0)->where('in_duration', 1)->where('is_booked', 0)->limit(10)->orderBy('service_id', 'desc')->get();
        return view('pages.test', ['data' => $data]);
    }

    /*
     *  Search post
    */
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
        $data = Post::where('is_deleted', 0)->where('in_duration', 1)->SearchPost($arrSearch)->where('is_booked', 0)->limit(10)->orderBy('service_id', 'desc')->get();
        return view('pages.test', ['data' => $data]);
    }

    /*
     * Create new Post
    */
    public function create (Request $request) {

        $validator = Validator::make($request->all(), [
            'creator_id' => 'required|bail|integer',
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
            'electric_calculate_method' => ['required', 'bail', Rule::in(Post::$ELECTRIC_CALCULATE_METHOD)],
            'water_price' => 'required|bail|numeric',
            'water_calculate_method' => ['required', 'bail', Rule::in(Post::$WATER_CALCULATE_METHOD)]
        ]);
        $data = [];
        if ($validator->fails()) {
            $data = ['http_error' => 400, 'error' => true, 'message' => 'Bad request'];
            $data = json_encode($data);
            return view('pages.test', ['data' => $data]);
        }
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

    /*
     * Get all creator post
    */

    public function myPost (Request $request) {
        $validator = Validator::make($request->all(), [
            'creator_id' => 'required|bail|integer',
            'category_id' => 'nullable|bail|integer',
            'service_id' =>  'nullable|bail|integer'
        ]);
        $data = [];
        if ($validator->fails()) {
            $data = ['http_error' => 400, 'error' => true, 'message' => 'Bad request'];
            $data = json_encode($data);
            return view('pages.test', ['data' => $data]);
        }
        $conditions = [
            ['creator_id', $request['creator_id']],
            ['is_deleted', 0]
        ];
        $serviceId = $request['service_id'];
        $categoryId = $request['category_id'];
        $arrSearch = [
            ['column' => 'service_id',
            'value' => $serviceId],
            ['column' => 'category_id',
                'value' => $categoryId],
        ];
        $allPost = Post::where($conditions)->SearchPost($arrSearch)->orderBy('created_at', 'desc')->take(10)->get();
        $posted = Post::where($conditions)->SearchPost($arrSearch)->where('status', Post::$POST_STATUS['approved'])->orderBy('created_at', 'desc')->get();
        $pending = Post::where($conditions)->SearchPost($arrSearch)->where('status', Post::$POST_STATUS['pending'])->orderBy('created_at', 'desc')->get();
        $denied = Post::where($conditions)->SearchPost($arrSearch)->where('status', Post::$POST_STATUS['denied'])->orderBy('created_at', 'desc')->get();

        $data['all'] = $allPost;
        $data['posted'] = $posted;
        $data['pending'] = $pending;
        $data['denied'] = $denied;
        $data = json_encode($data);
        return view('pages.test', ['data' => $data]);
    }

    /*
     * Update post status, content.
     * not test
    */
    public function update (Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|bail|integer',
            'creator_id' => 'required|bail|integer',
            'category_id' => 'nullable|bail|integer',
            'title' => 'nullable|bail|min:10|max:90',
            'description' => 'nullable|bail|min:100',
            'province_id' => 'nullable|bail|integer',
            'district_id' => 'nullable|bail|integer',
            'street_id' => 'nullable|bail|integer',
            'ward_id' => 'nullable|bail|integer',
            'address' => 'nullable|bail|min:8',
            'price' => 'nullable|bail|numeric',
            'area' => 'nullable|bail|numeric',
            'gender_user' => ['nullable', 'bail', Rule::in(Post::$POST_STATUS)],
            'user_type' => ['nullable', 'bail', Rule::in(Post::$USER_TYPE)],
            'electric_price' => 'nullable|bail|numeric',
            'electric_calculate_method' => ['nullable', 'bail', Rule::in(Post::$ELECTRIC_CALCULATE_METHOD)],
            'water_price' => 'nullable|bail|numeric',
            'water_calculate_method' => ['nullable', 'bail', Rule::in(Post::$WATER_CALCULATE_METHOD)],
            'is_booked' => 'nullable|boolean'


        ]);
        $data = [];
        if ($validator->fails()) {
            $data = ['http_error' => 400, 'error' => true, 'message' => 'Bad request'];
            $data = json_encode($data);
            return view('pages.test', ['data' => $data]);
        }
        $conditions = [
            ['id', $request['id']],
            ['creator_id', $request['creator_id']]
        ];

        $categoryId = $request['category_id'];
        $title = $request['title'];
        $description = $request['description'];
        $provinceId = $request['province_id'];
        $districtId = $request['district_id'];
        $streetId = $request['street_id'];
        $wardId = $request['ward_id'];
        $address = $request['address'];
        $price = $request['price'];
        $area = $request['area'];
        $genderUser = $request['gender_user'];
        $userType = $request['user_type'];
        $electricPrice = $request['electric_price'];
        $electricCalculateMethod = $request['electric_calculate_method'];
        $waterPrice = $request['water_price'];
        $waterCalculateMethod = $request['water_calculate_method'];
        $isBooked = $request['is_booked'];

        $arrUpdate = [
            [
                'column' => 'category_id',
                'value' => $categoryId
            ],
            [
                'column' => 'title',
                'value' => $title
            ],
            [
                'column' => 'description',
                'value' => $description
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
            [
                'column' => 'address',
                'value' => $address
            ],
            [
                'column' => 'price',
                'value' => $price
            ],
            [
                'column' => 'area',
                'value' => $area
            ],
            [
                'column' => 'gender_user',
                'value' => $genderUser
            ],
            [
                'column' => 'user_type',
                'value' => $userType
            ],
            [
                'column' => 'electric_price',
                'value' => $electricPrice
            ],
            [
                'column' => 'electric_calculate_method',
                'value' => $electricCalculateMethod
            ],
            [
                'column' => 'water_price',
                'value' => $waterPrice
            ],
            [
                'column' => 'water_calculate_method',
                'value' => $waterCalculateMethod
            ],
            [
                'column' => 'is_booked',
                'value' => $isBooked
            ],

        ];
        $post = Post::where($conditions)->UpdatePost($arrUpdate);
        $data['post'] = $post;
        $data = json_encode($data);
        return view('pages.test', ['data' => $data]);
    }

    /*
     * Delete post
    */
    public function delete (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'creator_id' => 'required|bail|integer',
            'id' => 'required|bail|integer'
        ]);
        $data = [];
        if ($validator->fails()) {
            $data = ['http_error' => 400, 'error' => true, 'message' => 'Bad request'];
            $data = json_encode($data);
            return view('pages.test', ['data' => $data]);
        }

        $conditions = [
            ['creator_id', $request['creator_id']],
            ['id', $request['id']],
            ['status', Post::$POST_STATUS['approved']]
        ];
        $result = Post::where($conditions)->update(['is_deleted' => 1]);

        $data['result'] = $result;
        $data = json_encode($data);
        return view('pages.test', ['data' => $data]);

    }

    /*
     * Admin update status post: not test
     */
    public function changeStatusPost (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|bail|integer',
            'group_user' =>  ['required', 'bail', Rule::in(GroupUser::$GROUP['admin'])],
            'processor_id' => 'required|bail|integer',
            'status' => ['required', 'bail', Rule::in(Post::$POST_STATUS['approved'], Post::$POST_STATUS['denied'], Post::$POST_STATUS['violate'])]
        ]);
        $data = [];
        if ($validator->fails()) {
            $data = ['http_error' => 400, 'error' => true, 'message' => 'Bad request'];
            $data = json_encode($data);
            return view('pages.test', ['data' => $data]);
        }
        $conditions = [
          [
              ['processor_id', $request['processor_id']],
              ['status', $request['status']]
          ]
        ];
        $post = Post::where(['id' => $request['id']])->update($conditions);
        $data['result'] = $post;
        $data = json_encode($data);
        return view('pages.test', ['data' => $data]);
    }



}
