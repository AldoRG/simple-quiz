<?php

use App\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    const WORDS_ANSWER = [
        'el altavoz' => 'loudspeaker',
        'el alumno/la alumna' => 'pupil',
        'el bolígrafo' => 'ballpoint pen',
        'el borrador' => 'board eraser',
        'el calendario' => 'calendar',
        'el cartel/el póster' => 'poster',
        'el cuaderno' => 'notebook, workbook',
        'el diccionario' => 'dictionary',
        'el escritorio' => 'desk',
        'el estudiante/la estudiante' => 'student'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::WORDS_ANSWER as $question => $answer) {
            $q = Question::create([
                'question_text' => "Please translate: \"".$question."\""
            ]);
            $a = new \App\Answer(['answer' => $answer]);
            $q->answer()->save($a);
        }
    }
}
