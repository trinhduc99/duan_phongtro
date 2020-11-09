<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_in', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receiver_id')->nullable(false)->comment('Người nhận tiền');
            $table->unsignedBigInteger('depositor_id')->nullable(false)->comment('Người nạp tiền');
            $table->decimal('amount', 15, 3);
            $table->string('status')->nullable(true);
            $table->string('note')->nullable(true);
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
        Schema::dropIfExists('pay_in');
    }
}
