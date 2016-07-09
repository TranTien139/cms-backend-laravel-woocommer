<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCountvistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countvisit', function (Blueprint $table) {
            $table->string('txtweek')->after('txtday');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countvisit', function (Blueprint $table) {
            $table->dropColumn('txtweek');
        });
    }
}
