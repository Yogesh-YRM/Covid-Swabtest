<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistratieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registratie', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            // $table->string('lastname')->nullable();
            // $table->string('phonenumber')->nullable();
            // $table->string('adress')->nullable();
            // $table->string('id_number')->nullable();
            $table->string('opmerking')->nullable();
            $table->integer('location')->nullable();
            $table->string('status')->nullable();
            $table->string('email')->nullable();
            $table->string('saturation')->nullable();
            $table->string('vax')->nullable();
            $table->string('bp')->nullable();
            // $table->string('birthdate')->nullable();
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
        Schema::dropIfExists('registratie');
    }
}
