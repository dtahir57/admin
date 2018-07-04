<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectTypeToProjectUnitsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_units', function($table) {
            $table->integer('project_type_id')->unsigned()->after('city_id');
            $table->foreign('project_type_id')
                  ->references('id')
                  ->on('project_types')
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
            $table->dropColumn('project_type_id')->unsigned()->after('city_id');
        });
    }
}
