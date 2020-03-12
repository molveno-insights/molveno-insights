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

    public function getRatingPercentage()
    {
        if ($this->likes + $this->dislikes > 0) {
            return round(($this->likes / ($this->likes + $this->dislikes)) * 100);
        }

        return 0;
    }
}
