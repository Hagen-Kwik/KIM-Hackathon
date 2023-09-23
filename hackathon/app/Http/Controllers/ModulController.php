<?php

namespace App\Http\Controllers;

use App\Models\Learning;
use App\Models\LearningType;
use App\Models\Modul;
use App\Models\Quiz;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin-modul', [
            'results' => Modul::all(),
            'learning_types' => LearningType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required|string|max:75',
            'description' => 'required',
            'file' => 'nullable|mimes:pdf|max:5120',
            'youtube_link' => [
                'url',
                function ($attribute, $requesturl, $failed) {
                    if (!preg_match('/(youtube.com|youtu.be)\/(embed)?(\?v=)?(\S+)?/', $requesturl)) {
                        $failed(trans("general.not_youtube_url", ["name" => trans("general.url")]));
                    }
                },
            ],
            'learning_type' => 'required|numeric',
        ]);

        if ($request->hasFile('file')) {
            Modul::create([
                'title' => $request->title,
                'description' => $request->description,
                'file' => substr($request->file('file')->store('/public/file/silabus'), 7, strlen($request->file('file')->store('/public/file/silabus')) - 7),
                'youtube_link' => $request->youtube_link,
                'learning_type_id' => $request->learning_type,
                'learning_id' => Learning::all()->first()->id,
            ]);
        } else {
            Modul::create([
                'title' => $request->title,
                'description' => $request->description,
                'youtube_link' => $request->youtube_link,
                'learning_type_id' => $request->learning_type,
                'learning_id' => Learning::all()->first()->id,
            ]);
        }
        
        return redirect('/silabus');
    }

    /**
     * Display the specified resource.
     */
    public function show(Modul $modul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modul $modul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modul $modul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modul $modul)
    {
        //
    }
}
