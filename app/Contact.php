<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';

    protected $guarded = [
        'id'
    ];

    public function guest()
    {
        return $this->belongsTo('\App\Guest');
    }
}
