<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user')
            // tipo de plan
            $table->integer('plan_id')->unsigned();
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->datetime('started_at');// fecha inicia
            $table->datetime('finish_at');// 1 m fecha en la q se espera q termina
            $table->boolean('renewal')->default(true);//REnovar suscribcion pagos recurrentes, despues que se termine
            $table->datetime('ended_at')->nullable();// fecha que termina la subcripcion
            $table->timestamps();// create_at en que se inscribio
            /**
             * web phus
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
