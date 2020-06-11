<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = [
        'toilet_id', 'cleanliness', 'accessible', 'review', 'name'
    ];
}
