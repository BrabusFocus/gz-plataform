<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_offices', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('phone');
          $table->string('desription');
          //FK
          $table->integer('user_id')->unsigned()->nullable();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');;
          /**
           * >onDelete('cascade')->onUpdate('cascade');
           */
          // $table->integer('attention_schedule_id')->unsigned();
          // $table->foreign('attention_schedule_id')->references('id')->on('attention_schedule');
          // $table->integer('municipalities_id')->unsigned();
          // $table->foreign('municipalities_id')->references('id')->on('municipalities');
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
        Schema::dropIfExists('branch_offices');
    }
}
