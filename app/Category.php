<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function getRatingPercentage() {
        return 0;
    }
}
