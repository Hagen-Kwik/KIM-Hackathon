<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function submit(Request $request)
    {
        $this->validate($request, [
            'quiz_id' => 'required|numeric',
        ]);
        
        $uid = Auth::user()->id;

        foreach (Quiz::findOrFail($request->quiz_id)->questions as $question) {
            if ($request->has($question->id)) {
                Response::create([
                    'choice' => $request->get($question->id),
                    'question_id' => $question->id,
                    'user_id' => $uid
                ]);
            } else {
                Response::create([
                    'choice' => null,
                    'question_id' => $question->id,
                    'user_id' => $uid
                ]);
            }
        }

        return redirect('/silabus');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('quiz', [
            'quiz' => Quiz::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
