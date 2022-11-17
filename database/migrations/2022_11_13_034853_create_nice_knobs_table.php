<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNiceKnobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nice_knobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('knob_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('user_ip')->nullable();
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
        Schema::dropIfExists('nice_knobs');
    }
}
