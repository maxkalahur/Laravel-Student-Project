<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * @return array
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
