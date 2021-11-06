<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vaccinatie extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'id_number',
        'manufracturer',
        'status',
    ];

    protected $hidden = [

    ];


    public function up()
        {
            Schema::create('vaccinatie', function (Blueprint $table) {
                $table->id();
                $table->string('first_name');
                $table->string('last_name');
                $table->string('birth_date');
                $table->string('id_number');

                $table->string('manufracturer');
    
                $table->string('lot_number1');
                $table->string('date1');
                $table->string('vaccinator1');

                $table->string('lot_number2');
                $table->string('date2');
                $table->string('vaccinator2');

                $table->string('lot_number3');
                $table->string('date3');
                $table->string('vaccinator3');

                $table->string('status');
                $table->string('qr_code');
                $table->timestamps();
            });
        }
}
