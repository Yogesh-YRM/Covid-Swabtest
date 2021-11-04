<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'voornaam',
        'achternaam',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function up()
{
    Schema::create('admins', function (Blueprint $table) {
        $table->id();
        $table->string('voornaam');
        $table->string('achternaam');
        $table->string('email')->unique();
        $table->enum('role',['admin','editor','medical','scanner'])->default('medical');
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
    });
}
}
