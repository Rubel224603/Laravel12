<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningPoint extends Model
{
    //
    protected $casts = [
        'subtitle' => 'array',
    ];
    protected $attributes = [
        'subtitle' => '[]',
    ];
}
