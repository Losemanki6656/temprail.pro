<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnToTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temps', function (Blueprint $table) {
            $table->bigInteger('sector_id')->unsigned()->index()->nullable()->change();
            $table->bigInteger('organization_id')->unsigned()->index()->nullable()->change();
            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->foreign('organization_id')->references('id')->on('organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('temps', function (Blueprint $table) {
            //
        });
    }
}
