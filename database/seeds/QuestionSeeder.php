<?php

use App\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    const WORDS_ANSWER = [
        'loudspeaker' => 'el altavoz',
        'pupil' => 'el alumno/la alumna',
        'ballpoint pen' => 'el bolígrafo',
        'board eraser' => 'el borrador',
        'calendar' => 'el calendario',
        'poster' => 'el cartel/el póster',
        'notebook, workbook' => 'el cuaderno',
        'dictionary' => 'el diccionario',
        'desk' => 'el escritorio',
        'student' => 'el estudiante/la estudiante'
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
