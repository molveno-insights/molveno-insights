<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'name',
        'date',
        'category',
        'added_by',
        'type',
        'url'       
    ];
}
