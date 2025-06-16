<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'icon',
        'url',
    ];

    public function subButtons()
    {
        return $this->hasMany(SubButton::class);
    }

}

