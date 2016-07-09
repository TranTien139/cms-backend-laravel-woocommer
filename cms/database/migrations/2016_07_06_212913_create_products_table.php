<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('alias');
            $table->longText('description')->nullable();
            $table->integer('price')->unsigned();
            $table->integer('price_saleoff')->nullable()->unsigned();
            $table->longText('content')->nullable();
            $table->string('image');
            $table->integer('category_id');
            $table->string('read',16)->nullable();
            $table->string('status',16)->nullable();
            $table->string('ishot',16)->nullable();
            $table->string('isnew',16)->nullable();
            $table->string('isbestseller',16)->nullable();
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
        Schema::drop('products');
    }
}
