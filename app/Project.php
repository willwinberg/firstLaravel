<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [ //protection, only these values can be sent in form
        'title', 'description'
    ];
}
