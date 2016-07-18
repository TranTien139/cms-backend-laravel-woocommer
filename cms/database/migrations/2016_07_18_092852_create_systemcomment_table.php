<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemcommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systemcommment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',64);
            $table->text('content');
            $table->integer('reply_id');
            $table->integer('count_reply');
            $table->integer('object_id')->nullable();
            $table->integer('object_name')->nullable();
            $table->string('images');
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
        Schema::drop('systemcommment');
    }
}
