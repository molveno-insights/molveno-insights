<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'roomnumber',
        'name',
        'surname',
        'email',
        'phonenumber',
    ];
}
