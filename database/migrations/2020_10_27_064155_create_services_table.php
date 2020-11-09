<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->unsignedDouble('price_day', 10, 2)->nullable(false);
            $table->unsignedDouble('price_week', 10, 2)->nullable(false);
            $table->unsignedDouble('price_month', 10, 2)->nullable(false);
            $table->unsignedInteger('min_post_up')->nullable(false);
            $table->text('description')->nullable();
            $table->jsonb('list_img')->nullable();
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
        Schema::dropIfExists('services');
    }
}
