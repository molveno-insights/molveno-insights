<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function roomnumber()
    {
        return $this->belongsTo(Guest::class);
    }
}
