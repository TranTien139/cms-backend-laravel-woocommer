<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',128);
            $table->string('alias',128);
            $table->integer('parent_id')->nullable()->unsigned();
            $table->integer('order')->nullable()->unsigned();
            $table->string('published',16)->nullable();
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
        Schema::drop('categories_products');
    }
}
