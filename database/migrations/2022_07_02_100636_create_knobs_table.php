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
             $table->string('zyanru');
             $table->string('product');
            //  $table->string('cooking');
             $table->integer('value');
             $table->string('recipe');
             $table->string('comment');
            //  $table->string('comment_shihanhin');
            //  $table->string('comment_tedukuri');
             $table->string('matching-liquor');
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
