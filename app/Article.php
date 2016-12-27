<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    /**
     * @return array
     */
    use Sluggable;

    public function sluggable()
     {
         return [
            'slug' => [
                 'source' => 'title'
             ]
         ];
     }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
