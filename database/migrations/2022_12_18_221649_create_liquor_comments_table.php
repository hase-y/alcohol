<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiquorCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquor_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('liquor_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('user_name');
            $table->string('comment');
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
        Schema::dropIfExists('liquor_comments');
    }
}
