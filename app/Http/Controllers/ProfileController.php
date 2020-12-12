<?php

namespace App\Http\Controllers;

use App\Accommondation;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
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
        $acc_news = Accommondation::ACC_NEW;
        $acc_new_type_days = Accommondation::ACC_NEW_TYPE_DAY;
        $acc_new_type_weeks = Accommondation::ACC_NEW_TYPE_WEEK;
        $acc_new_type_months = Accommondation::ACC_NEW_TYPE_MONTH;
        $acc_new_types = Accommondation::ACC_NEW_TYPE;
        $day_now = Carbon::now()->format('Y-m-d');
        return view('front_end.profile.add', compact('categories',
            'provinces', 'acc_type_toilets', 'items',
            'acc_close_times', 'acc_deposit_prices',
            'acc_user_genders', 'acc_user_objects',
            'acc_electric_calculate_methods', 'acc_water_calculate_methods',
            'acc_news', 'day_now', 'acc_new_types', 'acc_new_type_days',
            'acc_new_type_weeks', 'acc_new_type_months'));
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

    public function getWard($id, $id2): \Illuminate\Http\JsonResponse
    {
        $wards = DB::table('ward')->where('_district_id', $id)->where('_province_id', $id2)->get(['_name', 'id']);
        $streets = DB::table('street')->where('_district_id', $id)->where('_province_id', $id2)->get(['_name', 'id']);
        $projects = DB::table('project')->where('_district_id', $id)->where('_province_id', $id2)->get(['_name', 'id']);
        return response()->json([$wards, $streets, $projects]);
    }

    public function getAccNew($id, $id2, $id3, $id4): \Illuminate\Http\JsonResponse
    {
        $acc_news = Accommondation::ACC_NEW;

        foreach ($acc_news as $acc_new) {
            if ($id == $acc_new['id']) {
                $acc_news = $acc_new;
            }
        }
        if ($id2 == 'day') {
            $price = number_format($acc_news['count_day']).' vnd/ ngày';
            $price_total = number_format($acc_news['count_day']*$id3).' vnđ';
            $content = "Số ngày: ";
            $date = Carbon::createFromFormat('Y-m-d', $id4);
            $date->addDay($id3)->toFormattedDateString();
        } else if ($id2 == 'week') {
            $price = number_format($acc_news['count_week'])." vnd/ tuần";
            $price_total = number_format($acc_news['count_week']*$id3).' vnđ';
            $content = "Số tuần: ";
            $date = Carbon::createFromFormat('Y-m-d', $id4);
            $date->addWeek($id3)->toFormattedDateString();
        } else {
            $price = number_format($acc_news['count_month'])." vnd/ tháng";
            $price_total = number_format($acc_news['count_week']*$id3)." vnđ";
            $content = "Số tháng: ";
            $date = Carbon::createFromFormat('Y-m-d', $id4);
            $date->addMonth($id3)->toFormattedDateString();
        }
        return response()->json([$price, $price_total,$id3,$content,$date]);

    }


}
