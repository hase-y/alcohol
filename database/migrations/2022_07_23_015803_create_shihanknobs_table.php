<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShihanknobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shihanknobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('zyanru')->nullable();
            $table->string('product')->nullable();
            $table->integer('value')->nullable();
            $table->string('comment')->nullable();
            $table->string('matching-liquor')->nullable();
            $table->string('image_path')->nullable();
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
        Schema::dropIfExists('shihanknobs');
    }
}
