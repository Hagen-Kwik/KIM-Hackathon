<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin-siswa', [
            'schools' => School::all(),
            'results' => User::where('status', '=', 'normal')->get(),
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
        $request->validate([
            'sekolah' => ['required', 'numeric'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'kata_sandi' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'school_id' => $request->sekolah,
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->kata_sandi),
        ]);

        return view('admin-siswa', [
            'schools' => School::all(),
            'results' => User::where('status', '=', 'normal')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id' => ['required', 'numeric'],
            'sekolah' => ['required', 'numeric'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        ]);

        User::findOrFail($request->id)->update([
            'school_id' => $request->Sekolah,
            'name' => $request->nama,
            'email' => $request->email,
        ]);
        
        return view('admin-siswa', [
            'schools' => School::all(),
            'results' => User::where('status', '=', 'normal')->get(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        User::findOrFail($request->id)->delete();
        
        return view('admin-siswa', [
            'schools' => School::all(),
            'results' => User::where('status', '=', 'normal')->get(),
        ]);
    }
}
