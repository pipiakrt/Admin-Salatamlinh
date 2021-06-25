<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('_id');
            $table->integer('promotion_id')->default(0)->index();
            $table->integer('category_id')->default(0)->index();
            $table->integer('number')->nullable()->index();
            $table->string('name')->index();
            $table->string('slug')->index();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keyword')->nullable();
            $table->json('images')->nullable();
            $table->json('attributes')->nullable();
            $table->string('avatar')->nullable();
            $table->string('video')->nullable();
            $table->integer('price')->nullable()->index();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('status')->nullable()->index();
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
        Schema::dropIfExists('products');
    }
}
