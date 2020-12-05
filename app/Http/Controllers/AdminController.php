<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('admin.pages.quizzes',compact('quizzes'));
    }

    public function questions(Quiz $quiz)
    {
        return view('admin.pages.questions',compact('quiz'));
    }
    public function addQuiz(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);

        Quiz::create(['title'=>$request->title]);
        return back()->with('success','Quiz Added Successfully');
    }

    public function addQuestionList(Quiz $quiz){
        return view('admin.pages.addQuestion',compact('quiz'));
    }
    public function addQuestion(Quiz $quiz, Request $request)
    {
        $request->validate([
            'description'=>'required',
            'answer'=>["required","array","min:4","max:4"],
            'correct'=>'required'
        ]);
        $question = $quiz->questions()->save(new Question(['description'=>$request->description]));
        foreach ($request->answer as $k=>$answer){
            $data = ['answer'=>$answer];
            if ($k == $request->correct){
                $data['is_correct'] = 1;
            }
            $question->answers()->save(new Answer($data));
        }

        return redirect('/admin/questions/'.$quiz->id)->with('success','created successfully');
    }
}
