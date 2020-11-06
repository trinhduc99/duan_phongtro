<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $guarded = [];

    public static  $POST_STATUS = [
        'approved' => 'Approved',
        'pending' => 'Pending',
        'denied' => 'Denied',
        'violate' => 'Violate'
    ];

    public static $USER_TYPE = [
        'male' => 'Male',
        'female' => 'Female',
        'none' => 'None'
    ];

    public static $WATER_CALCULATE_METHOD = [
       'personal' => 'Personal',
        'm3' => 'm3',
        'negotiate' => 'Negotiate'
    ];

    public static $ELECTRIC_CALCULATE_METHOD = [
        'personal' => 'Personal',
        'kwh' => 'Kwh',
        'negotiate' => 'Negotiate'
    ];

    public static $MOTEL_ITEM = [
        // điều hòa, nóng lạnh,
        // vệ sinh khép kín, chung chủ/không chung chủ, bếp : description
        ['' => ['', 'Điều hòa']],
        ['' => ['', 'Bình nóng lạnh']],
        ['' => ['', 'Ban công']],
        ['' => ['', 'Tủ lạnh']],
        ['' => ['', 'Máy giặt']],
        ['' => ['', 'Giường']],
        ['' => ['', 'Quạt trần']],
        ['' => ['', 'Quạt treo tường']],
        ['' => ['', 'Giường']],
        ['' => ['', 'Tủ đựng quần áo']],
        ['' => ['', 'Bàn học']],
        ['' => ['', 'Ghế']],
        ['' => ['', 'Bàn học']],
        ['' => ['', 'Đèn học']],

    ];
    public function scopeSearchPost ($query, $arrSearch)
    {
        for ($i = 0; $i < count($arrSearch); $i++) {
            $element = $arrSearch[$i];
            if (!empty($element['value'])) {
                $query = $query->where($element['column'], $element['value']);
            }
        }
        return $query;
    }
    public function scopeUpdatePost ($query, $arrSearch)
    {
        $arr = [];
        for ($i = 0; $i < count($arrSearch); $i++) {
            $element = $arrSearch[$i];
            if (!empty($element['value'])) {
                array_push($arr, $element[$i]);
            }
        }
        return $query->update($arr);
    }

    public function scopeSearchByCategory ($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }
}
