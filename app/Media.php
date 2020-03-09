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
        'added_by',
        'url',
        'forchildren',       
    ];

    public function categoryBelong()
    {
        return $this->belongsTo(Category::class);
    }
}

