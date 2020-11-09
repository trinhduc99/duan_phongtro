<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id')->nullable(false);
            $table->string('title')->nullable(false)->comment('Tên bài viết');
            $table->longText('description')->nullable(false)->comment('Mô tả bài viết');
            $table->unsignedBigInteger('province_id')->nullable(false);
            $table->unsignedBigInteger('district_id')->nullable(false);
            $table->unsignedBigInteger('street_id')->nullable(false);
            $table->unsignedBigInteger('ward_id')->nullable(false);
            $table->string('address')->nullable(false);
            $table->decimal('price', 15, 3);
            $table->double('area', 10, 2)->nullable(false);
            $table->string('gender_user')->nullable(false)->comment('Male - Female - None');
            $table->string('user_type')->nullable(false)->comment('Student - Household - Worker');
            $table->decimal('electric_price', 10, 3)->nullable(false);
            $table->string('electric_calculate_method')->nullable(false)->comment('Personal - Kwh - Negotiate __ thương lượng');
            $table->decimal('water_price', 10, 3)->nullable(false);
            $table->string('water_calculate_method')->nullable(false)->comment('Personal - m3 - Negotiate __ thương lượng');
            $table->string('close_time')->comment('Thời gian đóng cửa');
            $table->string('deposit')->comment('Đặt cọc');
            $table->string('item')->nullable(true)->comment('Các tiện ích của phòng');
            $table->text('note')->nullable(true)->comment("Ghi chú cho bài viết");
            $table->boolean('is_public')->comment("Người tìm kiếm có thể thấy");
            $table->boolean('is_booked')->default(0);
            $table->boolean('is_deleted')->default(0);
            $table->boolean('in_duration')->comment('Còn hạn hay không')->default(1);
            $table->string('status')->comment('Trạng thái bài biết __ Approved - Pending - Denied - Violate');
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('processor_id')->comment('Người xử lý');
            $table->dateTime('start_date')->nullable(false);
            $table->dateTime('finish_date')->nullable(false);
            $table->unsignedInteger('service_id')->nullable(true);
            $table->string('service_type')->nullable(true);
            $table->unsignedInteger('number_day_up')->nullable(true);
            $table->unsignedInteger('visited')->nullable(false)->default(0)->comment('Số lượt xem bài viết');
            $table->string('slug')->comment('Slug của post');
            $table->decimal('post_price', 15, 3)->nullable(false)->default(0);
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
        Schema::dropIfExists('posts');
    }
}
