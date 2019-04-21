<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
      'name', 'animal', 'type', 'date_of_birth', 'microchipped', 'vaccinated', 'availability', 'description', 'image'
    ];
}
