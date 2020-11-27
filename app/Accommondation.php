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
}
