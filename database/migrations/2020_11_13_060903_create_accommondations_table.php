<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommondationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommondations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->comment('ten nguoi tao bai viet')->unsigned();;

            //address
            $table->string("province")->comment("thanh pho");
            $table->string("district")->comment("quan huyen");
            $table->string("ward")->comment("phuong xa");
            $table->string("street")->comment("ten duong")->nullable();
            $table->string("street_number")->comment("so nha")->nullable();
            $table->string('acc_address')->comment('dia chi chi tiet');
            $table->json("project")->comment('danh sach cac dia diem lien quan');

            $table->unsignedInteger('category_id')->comment('danh muc cha')->unsigned();
            $table->string('acc_title')->comment('ten bai viet');
            $table->string('ac_title_slug')->comment('slug cua tieu de bai viet');
            $table->longText('acc_description')->comment('Mo ta bai viet');

            $table->decimal('acc_price', 15, 3)->comment('gia bai viet');
            $table->double('acc_area', 10, 2)->comment('dien tich phong tro');
            $table->string('acc_type_toilet')->comment('dac diem nha ve sinh: chua xac dinh- vs khep kin- vs chung');
            $table->string('acc_close_time')->comment('thoi gian dong cua');

            $table->decimal('acc_electric_price', 10, 3)->comment('gia tien dien');
            $table->string('acc_electric_calculate_method')->comment('phuong thuc thanh toan tien dien');

            $table->decimal('acc_water_price', 10, 3)->comment('gia tien dien');
            $table->string('acc_water_calculate_method')->comment('phuong thuc thanh toan tien nuoc');

            $table->decimal('acc_internet_price',10,2)->comment('gia internet');
            $table->string('acc_deposit_price')->comment(' Tien dat coc');
            $table->string('acc_user_gender')->comment('gioi tinh  khach thue: nam-nu-khac');
            $table->string('acc_user_object')->comment('Student - Household - Worker');
            // loi the cho thue phong cho thue :item
            // anh chi tiet cua phong cho thue : image
            // chuc nang khac

            $table->string('acc_note')->nullable()->comment('Ghi chu cho bai viet neu co vi pham hay duoc duyet thanh cong');
//            $table->boolean('is_public')->nullable()->comment("Người tìm kiếm có thể thấy");
            $table->boolean('is_booked')->default(0)->comment('bai viet co nguoi thue');

            $table->boolean('in_duration')->comment('Còn hạn hay không')->default(0);

            $table->string('status')->nullable()->default('pending')->comment('Trạng thái bài biết __ Approved - Pending - Denied - Violate');

            $table->dateTime('acc_start_date')->nullable()->comment('Ngay dang bai viet');

            $table->dateTime('acc_finish_date')->nullable()->comment('Ngay het hen cua bai viet');

            $table->unsignedInteger('service_tin')->nullable(true)->comment('');
            $table->unsignedInteger('service_')->nullable(true)->comment('');

            $table->string('service_type')->nullable(true);
            $table->unsignedInteger('number_day_up')->nullable(true);



            $table->unsignedInteger('acc_visited')->default(0)->comment('so luong nguoi xem bai viet');
            $table->unsignedInteger('acc_user_loved')->default(0)->comment('so luong nguoi quan tam bai viet');


            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accommondations');
    }
}
