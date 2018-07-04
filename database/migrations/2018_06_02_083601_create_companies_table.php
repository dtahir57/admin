<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_type_id')->unsigned();
            $table->foreign('company_type_id')
                  ->references('id')
                  ->on('company_types')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('name');
            $table->string('tel');
            $table->string('email');
            $table->string('logo');
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('companies');
    }
}
