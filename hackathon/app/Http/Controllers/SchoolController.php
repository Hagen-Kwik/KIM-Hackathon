<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin-sekolah', [
            'results' => School::all()
        ]);
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
        $this->validate($request, [
            'nama_sekolah' => 'required|string|max:75',
            'lokasi_sekolah' => 'required',
            'gambar' => 'required|image|max:5120',
        ]);

        School::create([
            'schoolName' => $request->nama_sekolah,
            'location' => $request->lokasi_sekolah,
            'bannerPicture' => $request->file('gambar')->store('/public/images/sekolah')
        ]);
        
        return view('admin-sekolah', [
            'results' => School::all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
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
        $this->validate($request, [
            'id' => 'required|numeric',
            'nama_sekolah' => 'required|string|max:75',
            'lokasi_sekolah' => 'required',
            'gambar' => 'image|max:5120',
        ]);

        if ($request->hasFile('gambar')) {
            if (File::exists("public/images/sekolah/" . School::findOrFail($request->id)->gambar)) //Check if file exists
                File::delete("public/images/sekolah/" . School::findOrFail($request->id)->gambar); //Delete file from storage

            School::findOrFail($request->id)->update([
                'schoolName' => $request->nama_sekolah,
                'location' => $request->lokasi_sekolah,
                'bannerPicture' => substr($request->gambar->store('/public/images/sekolah'), 7, strlen($request->gambar->store('/public/images/sekolah')) - 7),
            ]);
        } else {
            School::findOrFail($request->id)->update([
                'schoolName' => $request->nama_sekolah,
                'location' => $request->lokasi_sekolah
            ]);
        }
        
        return view('admin-sekolah', [
            'results' => School::all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        School::findOrFail($request->id)->delete();
        
        return view('admin-sekolah', [
            'results' => School::all()
        ]);
    }
}
