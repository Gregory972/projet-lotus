<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubButton extends Model
{
    //
    protected $fillable = ['section', 'title', 'desc', 'icon', 'url'];

    public function button()
    {
        return $this->belongsTo(Button::class);
    }

}
