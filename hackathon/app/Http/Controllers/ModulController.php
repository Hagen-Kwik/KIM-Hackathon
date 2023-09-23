<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModulController extends Controller
{
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
            'file' => 'mimes:pdf|max:5120',
            'youtube_link' => [
                'url',
                function ($attribute, $requesturl, $failed) {
                    if (!preg_match('/(youtube.com|youtu.be)\/(embed)?(\?v=)?(\S+)?/', $requesturl)) {
                        $failed(trans("general.not_youtube_url", ["name" => trans("general.url")]));
                    }
                },
            ],
            'learning_type_id' => 'required|numeric',
            'learning_id' => 'required|numeric',
        ]);

        Modul::create([
            'title' => $request->title,
            'description' => $request->description,
            'file' => $request->file('file')->store('/public/file/silabus'),
            'youtube_link' => $request->youtube_link,
            'learning_type_id' => $request->learning_type_id,
            'learning_id' => $request->learning_id,
        ]);
        
        return view('silabus', [
            'silabus' => Modul::all()
        ]);
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
