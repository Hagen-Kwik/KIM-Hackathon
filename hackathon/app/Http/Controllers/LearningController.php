<?php

namespace App\Http\Controllers;

use App\Models\Learning;
use App\Models\Modul;
use App\Models\Quiz;
use App\Models\Teacher;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('silabus',[     
            'title'=>'Learning',
            'learning' => Learning::all()->first(),
            'teacher' => Teacher::all(),
            'modul' => Modul::all(),
            'user'=> $request->user(),
            'quizzes' => Quiz::all()
           ]
        ); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Learning::create([
            'title' => $_POST["title"],
            'description' => $_POST["desc"],
            'picture' => "tes",
            'starts_at' => $_POST["starts_at"],
            'ends_at' => $_POST["ends_at"],
            'school_id' => $_POST["school_id"],
        ]);

        return redirect("admin-silabus");
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
    public function show(Learning $learning)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $id = $_POST['id'];
        $result = Learning::find($id);

        $result->update([
            'title' => $_POST["title"],
            'description' => $_POST["desc"],
            'starts_at' => $_POST["starts_at"],
            'ends_at' => $_POST["ends_at"],
        ]);

        return redirect("admin-silabus");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Learning $learning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Learning $learning)
    {
        //
    }
}
