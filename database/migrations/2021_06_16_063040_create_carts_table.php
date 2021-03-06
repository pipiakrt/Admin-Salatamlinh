<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id('_id');
            $table->integer('user_id')->index(); 
            $table->integer('product_id')->index(); 
            $table->integer('category_id')->index();
            $table->string('name')->index();
            $table->string('slug')->index();
            $table->string('avatar')->nullable();
            $table->integer('price')->index();
            $table->integer('number')->index(); 
            $table->boolean('checked')->default(0);
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
        Schema::dropIfExists('carts');
    }
}
