<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knobs', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->integer('user_id');
             $table->string('zyanru');
             $table->string('product');
             $table->integer('value')->nullable();
             $table->string('comment')->nullable();
             $table->string('matching_liquor')->nullable();
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
        Schema::dropIfExists('knobs');
    }
}
