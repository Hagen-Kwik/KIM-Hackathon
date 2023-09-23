<?php

namespace App\Http\Controllers;

use App\Models\UserModulSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserModulSuccessController extends Controller
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
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'modul_id' => 'required',
            'file' => 'mimes:pdf|max:5120',
        ]);

        UserModulSuccess::create([
            'user_id' => Auth::user()->id,
            'modul_id' => $request->modul_id,
            'file' => $request->file('filemodul')->store('/public/file/silabus'),
        ]);
        
        return view('silabus', [
            'silabus' => UserModulSuccess::all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserModulSuccess $userModulSuccess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserModulSuccess $userModulSuccess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserModulSuccess $userModulSuccess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserModulSuccess $userModulSuccess)
    {
        //
    }
}
