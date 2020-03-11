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

    public function like()
    {
       $this->likes++;
       $this->save();
    }

    public function dislike()
    {
        $this->dislikes++;
        $this->save();
    }

    // public function relativelikes(){
    //     round(($this->likes / ($this->likes + $this->dislikes)) * 100);
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getRatingPercentage()
    {
        if ($this->likes + $this->dislikes > 0) {
            return round(($this->likes / ($this->likes + $this->dislikes)) * 100);
        }

        return 0;
    }
}
