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
            $table->increments('id');

            $table->string('observation')->nullable();
            $table->smallInteger('state')->unsigned();
            $table->integer('totalTimeout')->nullable();

            $table->smallInteger("worker_id")->unsigned();
            $table->foreign("worker_id")->references('id')->on("workers");
            $table->smallInteger("table_id")->unsigned();
            $table->foreign("table_id")->references('id')->on("tables");

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
        Schema::dropIfExists('orders');
    }
}
