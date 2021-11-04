<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Registratie extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'phonenumber',
        'adress',
        'id_number',
        'opmerking',
        'location',
        'status',
        'email',
    ];

    protected $hidden = [

    ];


    public function up()
{
    Schema::create('registratie', function (Blueprint $table) {
        $table->id();
        $table->string('firstname');
        $table->string('lastname');
        $table->string('phonenumber');
        $table->string('adress');
        $table->string('id_number');
        $table->string('opmerking');
        $table->integer('location');
        $table->string('status');
        $table->string('email');
        $table->timestamps();
    });
}
}
