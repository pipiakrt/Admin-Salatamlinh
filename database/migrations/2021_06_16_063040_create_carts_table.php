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
            $table->integer('number')->index(); 
            $table->integer('category_id')->index();
            $table->string('owner_id')->index();
            $table->string('name')->index();
            $table->string('slug')->index();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keyword')->nullable();
            $table->json('images')->nullable();
            $table->json('attributes')->nullable();
            $table->string('avatar')->nullable();
            $table->string('video')->nullable();
            $table->integer('price')->index();
            $table->integer('discount')->index();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('status')->index();
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
