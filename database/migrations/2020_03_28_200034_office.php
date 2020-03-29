<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Office extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workplaces', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->text('description')->nullable();
        });

        Schema::create('equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('kind');
            $table->string('model');
            $table->string('year_purchase');
            $table->string('value');
            $table->text('description')->nullable();
            $table->unsignedInteger('workplace_id')->nullable();

            $table->foreign('workplace_id')->references('id')->on('workplaces');
        });

        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('workplace_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('workplace_id')->references('id')->on('workplaces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
