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

    public static $USER_GENDER = [
        'male' => 'Male',
        'female' => 'Female',
        'none' => 'None'
    ];

    public static $USER_OBJECT = [
       'none' => 'None',
       'student' => 'Student',
       'worker' => 'Worker',
        'family' => 'Family'
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

    public static $TOILET_TYPE = [
        'none' => 'None',
        'private' => 'Private',
        'public' => 'Public'
    ];
    public static $SERVICE_TYPE = [
        'day' => ['Đăng theo ngày', 'Day'],
        'week' => ['Đăng theo tuần', 'Week'],
        'month' => ['Đăng theo tháng', 'Month']
    ];

    public static $UNIT_POST = [
        'day'  => [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10,
            11, 12, 13, 14, 15, 16, 17, 18, 19, 20,
            21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31
        ],
        'week' => [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10
        ],
        'month' => [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12
        ]
    ];

    public static $NUMBER_RECORD_FAKE = 200;
    public static $MOTEL_ITEM = [
        // điều hòa, nóng lạnh,
        // vệ sinh khép kín, chung chủ/không chung chủ, bếp : description
        [
            'key' => 'loft',
            'value' => 'Gác xép'
        ],
        [
            'key' => 'window',
            'value' => 'Cửa sổ'
        ],
        [
            'key' => 'camera',
            'value' => 'Camera'
        ],
        [
            'key' => 'washing_machine',
            'value' => 'Máy giặt'
        ],
        [
            'key' => 'air_conditioner',
            'value' => 'Điều hòa'
        ],
        [
            'key' => 'fridge',
            'value' => 'Tủ lạnh'
        ],
        [
            'key' => 'television',
            'value' => 'Ti vi'
        ],
        [
            'key' => 'heater',
            'value' => 'Bình nước nóng'
        ],
        [
            'key' => 'berth',
            'value' => 'Giường ngủ'
        ],
        [
            'key' => 'mattress',
            'value' => 'Có đệm'
        ],
        [
            'key' => 'kitchen',
            'value' => 'Chỗ nấu nướng'
        ],
        [
            'key' => 'desk',
            'value' => 'Bàn làm việc'
        ],
        [
            'key' => 'closet',
            'value' => 'Tủ quần áo'
        ],
        [
            'key' => 'floor',
            'value' => 'Sàn gỗ'
        ],
        [
            'key' => 'balcony',
            'value' => 'Ban công'
        ],
        [
            'key' => 'san_phoi',
            'value' => 'Sân phơi'
        ],
        [
            'key' => 'don_ve_sinh',
            'value' => 'Dọn vệ sinh hàng tuần'
        ],
        [
            'key' => 'parking_area',
            'value' => 'Chỗ để xe'
        ],
        [
            'key' => 'gym',
            'value' => 'Gần phòng Gym'
        ],
        [
            'key' => 'fan',
            'value' => 'Quạt'
        ],


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
