<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_table',function(Blueprint $table){
            $table->increments('emp_id');
            $table->string('emp_pass',20);
            $table->string('emp_name',60);
            $table->unsignedTinyInteger('gender');
            $table->date('birthday');
            $table->unsignedTinyInteger('authority');
            $table->unsignedTinyInteger('dept_id');
            $table->foreign('dept_id')->references('dept_id')->on('dept_table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emp_table');
    }
}
