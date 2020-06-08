<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question'];
    protected $appends = ['options'];

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }

    public function getOptionsAttribute()
    {
        $answers = Answer::where('question_id', '!=', $this->id)->inRandomOrder()->take(3)->get();
        $answers->push($this->answer()->first());
        return $answers->shuffle();
    }
}
