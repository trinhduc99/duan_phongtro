<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'Có chung chủ'],
            ['id' => 2, 'name' => 'Có cửa sổ'],
            ['id' => 3, 'name' => 'Có gác xếp'],
            ['id' => 4, 'name' => 'Có camera'],
            ['id' => 5, 'name' => 'Có máy giặt'],
            ['id' => 6, 'name' => 'Có điều hoà'],
            ['id' => 7, 'name' => 'Có tủ lạnh'],
            ['id' => 8, 'name' => 'Có Tivi'],
            ['id' => 9, 'name' => 'Có bình nóng lạnh'],
            ['id' => 10, 'name' => 'Có Internet'],
            ['id' => 11, 'name' => 'Có giường ngủ'],
            ['id' => 12, 'name' => 'Có đệm'],
            ['id' => 13, 'name' => 'Có chỗ nấu ăn'],
            ['id' => 14, 'name' => 'Có bàn làm việc'],
            ['id' => 15, 'name' => 'Có tủ đựng quần áo'],
            ['id' => 16, 'name' => 'Sàn gỗ'],
            ['id' => 17, 'name' => 'Có ban công'],
            ['id' => 18, 'name' => 'Có sân phơi'],
            ['id' => 19, 'name' => 'Dv dọn vệ sinh hàng tuần'],
            ['id' => 20, 'name' => 'Có chỗ để xe'],
            ['id' => 21, 'name' => 'Gần phòng tập Gym'],
            ['id' => 22, 'name' => 'Gần trung tâm thương mại'],
            ['id' => 23, 'name' => 'Gần chợ'],
            ['id' => 24, 'name' => 'Gần công viên'],
        ];
        foreach ($items as $item) {
            \App\Item::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
