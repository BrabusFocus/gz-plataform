<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone',15)->nullable();;
            $table->string('celphone')->nullable();;
            $table->string('nit',20);
            $table->string('address')->nullable();
            $table->integer('rol');
            $table->boolean('confirmed')->default(false);
            $table->string('confirmation_code')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
      //   Schema::table('users',function ($table) {
      //   $table->dropColumn([
      //     'username','phone','celphone','nit','address','rol','admin','state'
      //   ]);
      //
      // });
    }
}
