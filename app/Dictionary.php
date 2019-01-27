<?php

namespace App;

use App\Misc\UppercaseService;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected $fillable = [
        'english', 'persian'
    ];

    public function setEnglishAttribute($value)
    {
        $service = new UppercaseService;
        $this->attributes['english'] = $service->convert($value);
    }
}
