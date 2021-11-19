<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'voornaam',
        'achternaam',
        'geboorte_datum',
        'adress',
        'id_nummer',
        'mobiel',
        'email',
    ];

    protected $hidden = [

    ];


    public function up()
{
      Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('voornaam');
                $table->string('achternaam');
                $table->string('geboorte_datum');
                $table->string('adress');
                $table->string('id_nummer');
                $table->string('mobiel');
                $table->string('email')->unique();
                $table->timestamps();
            });
}
}
