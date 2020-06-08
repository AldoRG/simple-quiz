<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Question;
use App\Quiz;
use App\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::inRandomOrder()->take(10)->get();
        return response()->json($questions);
    }

    public function answered(Request $request)
    {
        $answers = $request->get('answers');
        $user = User::find($request->user);
        $quiz = new Quiz(['name' => 'translations']);
        $user->quizzes()->save($quiz);
        foreach ($answers as &$answer) {
            $question = Question::find($answer['question_id']);
            $answer['correct'] = $question->answer->id == $answer['answer_id'];
            $user->saveAnswers(
                $quiz->id,
                $question->answer->id,
                $answer['answer_id'],
                $answer['correct']
            );
        }
        return response()->json($answers);
    }
}
