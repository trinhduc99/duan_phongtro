<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('url_avatar')->nullable();
            $table->unsignedSmallInteger('group_id')->nullable(false);
            $table->decimal('amount', 18, 2)->nullable(false)->default(0);
            $table->string('gender')->nullable();
            $table->string('spec_permission')->nullable()->comment('Quyền đặc biệt');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
}
