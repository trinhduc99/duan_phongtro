<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accommondation extends Model
{
    protected $table = 'accommondations';
    // Loai nha ve sinh
    public const ACC_TYPE_TOILET = [
        [
            "id" => "none",
            "name" => "Chưa xác định"
        ], [
            "id" => "private_type",
            "name" => "Nhà vệ sinh riêng"
        ], [
            "id" => "public_type",
            "name" => "Nhà vệ sinh chung"
        ],
    ];

    // Loai gio dong cua
    public const ACC_CLOSE_TIME = [
        [
            "id" => "0",
            "name" => "-- Khong quy dinh--"
        ], [
            "id" => "1",
            "name" => "Sau 22h30"
        ], [
            "id" => "2",
            "name" => "Sau 23h"
        ], [
            "id" => "3",
            "name" => "Sau 23h30"
        ], [
            "id" => "4",
            "name" => "Sau 24h"
        ],
    ];

    // Loai Tien dat coc
    public const  ACC_DEPOSIT_PRICE = [
        [
            "id" => "0",
            "name" => "-- Không yêu cầu --"
        ], [
            "id" => "1",
            "name" => "Đặt cọc 1 tháng"
        ], [
            "id" => "2",
            "name" => "Đặt cọc 2 tháng"
        ], [
            "id" => "3",
            "name" => "Đặt cọc 3 tháng"
        ], [
            "id" => "4",
            "name" => "Đặt cọc 4 tháng"
        ], [
            "id" => "5",
            "name" => "Đặt cọc 5 tháng"
        ], [
            "id" => "6",
            "name" => "Đặt cọc 6 tháng"
        ], [
            "id" => "7",
            "name" => "Đặt cọc 7 tháng"
        ], [
            "id" => "8",
            "name" => "Đặt cọc 8 tháng"
        ], [
            "id" => "9",
            "name" => "Đặt cọc 9 tháng"
        ], [
            "id" => "10",
            "name" => "Đặt cọc 10 tháng"
        ], [
            "id" => "11",
            "name" => "Đặt cọc 11 tháng"
        ], [
            "id" => "11",
            "name" => "Đặt cọc 12 tháng"
        ],
    ];

    // Loai nha ve sinh
    public const ACC_USER_GENDER = [
        [
            "id" => "none",
            "name" => "Không quy định"
        ], [
            "id" => "male",
            "name" => "Nam"
        ], [
            "id" => "female",
            "name" => "Nữ"
        ],
    ];


    // Loai doi tuong cho thue
    public const ACC_USER_OBJECT = [
        [
            "id" => "1",
            "name" => "Người đi làm"
        ], [
            "id" => "2",
            "name" => "Hộ gia đình"
        ], [
            "id" => "3",
            "name" => "Sinh viên"
        ]
    ];

    public const ACC_ELECTRIC_CALCULATE_METHOD = [
        [
            "id" => "0",
            "name" => "đồng/Kwh/tháng"
        ], [
            "id" => "1",
            "name" => "đồng/người/tháng"
        ],
    ];
    public const ACC_WATER_CALCULATE_METHOD = [
        [
            "id" => "0",
            "name" => "đồng/người/tháng"
        ], [
            "id" => "1",
            "name" => "đồng/m3/tháng"
        ],
    ];

    public const ACC_NEW = [
        [
            "id" => "1",
            "name" => "Tin thường",
            'count_day' =>'2000',
            'count_week'=>'12000',
            'count_month'=>'48000'
        ],
        [
            "id" => "2",
            "name" => "Tin VIP 3",
            'count_day' =>'10000',
            'count_week'=>'63000',
            'count_month'=>'240000'
        ],
        [
            "id" => "3",
            "name" => "Tin VIP 2",
            'count_day' =>'20000',
            'count_week'=>'133000',
            'count_month'=>'540000'
        ],
        [
            "id" => "4",
            "name" => "Tin VIP 1",
            'count_day' =>'30000',
            'count_week'=>'190000',
            'count_month'=>'800000'
        ],
        [
            "id" => "5",
            "name" => "Tin VIP nổi bật",
            'count_day' =>'50000',
            'count_week'=>'315000',
            'count_month'=>'1200000'
        ],
    ];

    public const ACC_NEW_TYPE = [
        [
            "id" => "day",
            "name" => "Đăng theo ngày"
        ],
        [
            "id" => "week",
            "name" => "Đăng theo tuần"
        ],
        [
            "id" => "month",
            "name" => "Đăng theo tháng"
        ]
    ];

    public const ACC_NEW_TYPE_DAY = [
        [
            "id" => "3",
            'parent_id' =>"day",
            "name" => "3 ngày"
        ],[
            "id" => "4",
            'parent_id' =>"day",
            "name" => "4 ngày"
        ],[
            "id" => "5",
            'parent_id' =>"day",
            "name" => "5 ngày"
        ],[
            "id" => "6",
            'parent_id' =>"day",
            "name" => "6 ngày"
        ],[
            "id" => "7",
            'parent_id' =>"day",
            "name" => "7 ngày"
        ],[
            "id" => "8",
            'parent_id' =>"day",
            "name" => "8 ngày"
        ],[
            "id" => "9",
            'parent_id' =>"day",
            "name" => "9 ngày"
        ],[
            "id" => "10",
            'parent_id' =>"day",
            "name" => "10 ngày"
        ],[
            "id" => "11",
            'parent_id' =>"day",
            "name" => "11 ngày"
        ],[
            "id" => "12",
            'parent_id' =>"day",
            "name" => "12 ngày"
        ],[
            "id" => "13",
            'parent_id' =>"day",
            "name" => "13 ngày"
        ],[
            "id" => "14",
            'parent_id' =>"day",
            "name" => "14 ngày"
        ],[
            "id" => "15",
            'parent_id' =>"day",
            "name" => "15 ngày"
        ],[
            "id" => "16",
            'parent_id' =>"day",
            "name" => "16 ngày"
        ],[
            "id" => "17",
            'parent_id' =>"day",
            "name" => "17 ngày"
        ],[
            "id" => "18",
            'parent_id' =>"day",
            "name" => "18 ngày"
        ],[
            "id" => "19",
            'parent_id' =>"day",
            "name" => "19 ngày"
        ],[
            "id" => "20",
            'parent_id' =>"day",
            "name" => "20 ngày"
        ],[
            "id" => "21",
            'parent_id' =>"day",
            "name" => "21 ngày"
        ],[
            "id" => "22",
            'parent_id' =>"day",
            "name" => "22 ngày"
        ],[
            "id" => "23",
            'parent_id' =>"day",
            "name" => "23 ngày"
        ],[
            "id" => "24",
            'parent_id' =>"day",
            "name" => "24 ngày"
        ],[
            "id" => "25",
            'parent_id' =>"day",
            "name" => "25 ngày"
        ],[
            "id" => "26",
            'parent_id' =>"day",
            "name" => "26 ngày"
        ],[
            "id" => "27",
            'parent_id' =>"day",
            "name" => "27 ngày"
        ],[
            "id" => "28",
            'parent_id' =>"day",
            "name" => "28 ngày"
        ],[
            "id" => "29",
            'parent_id' =>"day",
            "name" => "29 ngày"
        ],[
            "id" => "30",
            'parent_id' =>"day",
            "name" => "30 ngày"
        ]
    ];
    public const ACC_NEW_TYPE_WEEK = [
        [
            "id" => "1",
            'parent_id' =>"week",
            "name" => "1 tuần"
        ],[
            "id" => "2",
            'parent_id' =>"week",
            "name" => "2 tuần"
        ],[
            "id" => "3",
            'parent_id' =>"week",
            "name" => "3 tuần"
        ],[
            "id" => "4",
            'parent_id' =>"week",
            "name" => "4 tuần"
        ],[
            "id" => "5",
            'parent_id' =>"week",
            "name" => "5 tuần"
        ],[
            "id" => "6",
            'parent_id' =>"week",
            "name" => "6 tuần"
        ],[
            "id" => "7",
            'parent_id' =>"week",
            "name" => "7 tuần"
        ],[
            "id" => "8",
            'parent_id' =>"week",
            "name" => "8 tuần"
        ],[
            "id" => "9",
            'parent_id' =>"week",
            "name" => "9 tuần"
        ],[
            "id" => "10",
            'parent_id' =>"week",
            "name" => "10 tuần"
        ],[
            "id" => "11",
            'parent_id' =>"week",
            "name" => "11 tuần"
        ],[
            "id" => "12",
            'parent_id' =>"week",
            "name" => "12 tuần"
        ],
    ];


    public const ACC_NEW_TYPE_MONTH = [
        [
            "id" => "1",
            'parent_id' =>"month",
            "name" => "1 tháng"
        ],[
            "id" => "2",
            'parent_id' =>"month",
            "name" => "2 tháng"
        ],[
            "id" => "3",
            'parent_id' =>"month",
            "name" => "3 tháng"
        ],[
            "id" => "4",
            'parent_id' =>"month",
            "name" => "4 tháng"
        ],[
            "id" => "5",
            'parent_id' =>"month",
            "name" => "5 tháng"
        ],[
            "id" => "6",
            'parent_id' =>"month",
            "name" => "6 tháng"
        ],[
            "id" => "7",
            'parent_id' =>"month",
            "name" => "7 tháng"
        ],[
            "id" => "8",
            'parent_id' =>"month",
            "name" => "8 tháng"
        ],[
            "id" => "9",
            'parent_id' =>"month",
            "name" => "9 tháng"
        ],[
            "id" => "10",
            'parent_id' =>"month",
            "name" => "10 tháng"
        ],[
            "id" => "11",
            'parent_id' =>"month",
            "name" => "11 tháng"
        ],[
            "id" => "12",
            'parent_id' =>"month",
            "name" => "12 tháng"
        ],
    ];
}
