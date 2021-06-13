<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLangdingpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('langdingpages', function (Blueprint $table) {
            $table->id('_id');
            $table->string('name')->index();
            $table->string('slug')->index();
            $table->string('avatar')->nullable();
            $table->longText('code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('langdingpages');
    }
}
