<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'description', 'value', 'receiver_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
