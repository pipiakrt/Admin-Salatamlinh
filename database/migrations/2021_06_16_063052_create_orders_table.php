<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('_id');
            $table->integer('user_id')->index(); 
            $table->string('payment')->nullable();
            $table->string('code')->nullable();
            $table->integer('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->integer('total_money')->default(0)->index();
            $table->boolean('status')->default(0)->index();
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
