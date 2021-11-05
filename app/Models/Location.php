<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'regio'
    ];

    protected $hidden = [

    ];


    public function up()
{
    Schema::create('location', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('regio');
        $table->timestamps();
    });
}
}
