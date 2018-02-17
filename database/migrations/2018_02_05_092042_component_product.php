<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ComponentProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('component_product', function (Blueprint $table) {
          $table->increments('id');
          //FK
          $table->integer('product_id')->unsigned()->nullable();
          $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');;

          $table->integer('component_id')->unsigned()->nullable();
          $table->foreign('component_id')->references('id')->on('components')->onDelete('restrict')->onUpdate('restrict');;

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
        Schema::dropIfExists('component_product');
    }
}
