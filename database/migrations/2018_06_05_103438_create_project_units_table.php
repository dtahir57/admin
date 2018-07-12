<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_units', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')
                  ->references('id')
                  ->on('projects')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('name');
            $table->string('description');
            $table->string('rate_card');
            $table->string('cost');
            $table->string('down_payment');
            $table->string('installment');
            $table->string('year_of_installment');
            $table->string('area');
            $table->string('city');
            $table->string('type');
            $table->string('installment_monthly');
            $table->string('installment_quarter');
            $table->string('half_year');
            $table->string('installment_annually');
            $table->boolean('flexible_plan')->default(1);
            $table->string('offer_discount');
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
        Schema::dropIfExists('project_units');
    }
}
