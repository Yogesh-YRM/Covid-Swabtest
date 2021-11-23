<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinatieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccinatie', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');

            $table->string('manufracturer');

            $table->string('lot_number1');
            $table->string('date1');
            $table->string('vaccinator1');

            $table->string('lot_number2')->nullable();
            $table->string('date2')->nullable();
            $table->string('vaccinator2')->nullable();

            $table->string('lot_number3')->nullable();
            $table->string('date3')->nullable();
            $table->string('vaccinator3')->nullable();

            $table->string('status')->nullable();
            $table->string('qr_code')->nullable();
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
        Schema::dropIfExists('vaccinatie');
    }
}
