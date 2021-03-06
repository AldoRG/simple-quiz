<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['answer'];
    protected $appends = ['class'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function getClassAttribute()
    {
        return '';
    }
}
