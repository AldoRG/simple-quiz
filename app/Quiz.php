<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['name', 'result'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}