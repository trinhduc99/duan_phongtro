<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostLikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_like', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->nullable(false);
            $table->unsignedBigInteger('creator_id')->nullable(false);
            $table->unsignedInteger('quantity')->nullable(false)->default(0)->comment('Số lượng yêu thích bài viết');
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
        Schema::dropIfExists('post_like');
    }
}
