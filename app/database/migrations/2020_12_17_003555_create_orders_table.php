<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('courier_id')->nullable();;
            $table->json('goods');
            $table->string('fio');
            $table->string('tel');
            $table->string('email');
            $table->string('address');
            $table->string('total');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('accounts')->onDelete('set null');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('set null');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('set null');
            $table->foreign('courier_id')->references('id')->on('accounts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
