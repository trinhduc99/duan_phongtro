<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SqlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $province = base_path() . '/database/seeds/local/province.sql';
        $district = base_path() . '/database/seeds/local/district.sql';
        $ward = base_path() . '/database/seeds/local/ward.sql';
        $street = base_path() . '/database/seeds/local/street.sql';
        $sql_province = file_get_contents($province);
        $sql_district = file_get_contents($district);
        $sql_ward = file_get_contents($ward);
        $sql_street = file_get_contents($street);
        DB::unprepared($sql_province);
        DB::unprepared($sql_district);
        DB::unprepared($sql_street);
        DB::unprepared($sql_ward);
    }
}
