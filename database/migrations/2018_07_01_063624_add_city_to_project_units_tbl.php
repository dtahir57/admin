<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityToProjectUnitsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_units', function($table) {
            $table->integer('city_id')->unsigned()->after('project_id');
            $table->foreign('city_id')
                  ->references('id')
                  ->on('cities')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_units', function($table) {
            $table->dropColumn('city_id')->unsigned()->after('project_id');
        });
    }
}
