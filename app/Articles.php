<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    /**
     * @return array
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
