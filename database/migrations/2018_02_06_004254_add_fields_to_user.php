<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users',function ($table) {
          $table->boolean('gender')->nullable();
          $table->string('dui',10)->nullable();
          $table->string('nrm',20)->nullable();//medico
          $table->string('specialty',30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users',function ($table) {
      $table->dropColumn([
        'gender','dui','nrm','specialty'
      ]);

    });
    }
}
