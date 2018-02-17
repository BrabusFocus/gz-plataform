<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');//Nombre Generico
            $table->string('tradename',50);
            $table->string('presentation',20);
            $table->string('concentration',20);
            $table->float('price');
            $table->integer('laboratory_id')->unsigned()->nullable();
            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('restrict')->onUpdate('restrict');

            // $table->integer('component_product_id')->unsigned()->nullable();
            // $table->foreign('component_product_id')->references('id')->on('components')->onDelete('restrict')->onUpdate('restrict');
            $table->string('components',250);
            $table->string('description',250);
            //FK
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('restrict');

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
        Schema::dropIfExists('products');
    }
}
