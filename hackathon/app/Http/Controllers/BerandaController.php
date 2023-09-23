<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\School;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            if (trim($request->search) != "") {
                $school = School::where('schoolName', 'like', '%' . $request->search . '%')->orWhere('location', 'like', '%' . $request->search . '%')->get();
            }
            else {
                $school = School::all();
            }
        }else {
            $school = School::all();
        }


        return view('beranda',[     
            'title'=>'Rumah',
            'school' => $school,
            'news' => News::all(),
            'user'=>$request->user()
           ]
        ); 
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
        $berita = News::where('school_id', '=', $id)->get();
        $school = School::findOrFail($id);

        return view('berandasekolah', [
            'title' => 'beranda',
            'school' => $school,
            'berita' => $berita,
            'user' => auth()->user(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        //
    }
}
