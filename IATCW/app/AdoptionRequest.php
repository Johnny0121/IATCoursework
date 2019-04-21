<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdoptionRequest extends Model
{
    protected $fillable = ['userid', 'animalid', 'description', 'state'];
}
