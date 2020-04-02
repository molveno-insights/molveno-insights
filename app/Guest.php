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

    public function contacts()
    {
        return $this->hasMany('\App\Contact');
    }

    public static function findGuestByRoomNumber(string $roomNumber)
    {
        return Guest::where('roomnumber', $roomNumber)->first();
    }
}
