<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\karya_pilihan;
use App\Http\Requests\Storekarya_pilihanRequest;
use App\Http\Requests\Updatekarya_pilihanRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class KaryaPilihanController extends Controller
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
    public function store(Storekarya_pilihanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(karya_pilihan $karya_pilihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(karya_pilihan $karya_pilihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatekarya_pilihanRequest $request, karya_pilihan $karya_pilihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(karya_pilihan $karya_pilihan)
    {
        //
    }

    // $table->string('judul');
    //         $table->string('link');
    //         $table->integer('vote');

    public function voting()
    {
        $results = DB::table('karya_pilihans')
            ->select('id', 'created_at', 'updated_at', 'judul', 'link', 'vote')
            ->get();

        $winner = DB::table('karya_pilihans')
            ->select('id', 'created_at', 'updated_at', 'judul', 'link', 'vote')
            ->orderByDesc('vote')
            ->orderBy('updated_at')
            ->first();

        return view('voting', [
            'results' => $results,
            'winner' => $winner,
        ]);
    }


    public function voting_admin()
    {
        $results = DB::table('karya_pilihans')
            ->select('id', 'created_at', 'updated_at', 'judul', 'link', 'vote')
            ->get();
        return view('admin-voting', [
            'results' => $results,
        ]);
    }

    public function voting_add()
    {
        karya_pilihan::create([
            'judul' => $_POST['judul'],
            'link' => $_POST['link'],
            'vote' => 0,
        ]);

        return redirect("admin-voting");
    }

    public function voting_edit()
    {
        $karya = karya_pilihan::findOrFail($_POST['id']);

        $karya->update([
            'judul' => $_POST['judul'],
            'link' => $_POST['link']
        ]);

        return redirect("admin-voting");
    }

    public function voting_delete()
    {
        if (isset($_POST['delete'])) {
            karya_pilihan::where('id', $_POST['id'])->delete();
        }

        return redirect("admin-voting");
    }

    public function voted()
    {
        $karya_pilihan = karya_pilihan::findOrFail($_POST['id']);


        $karya_pilihan->update([
            'vote' => $karya_pilihan->vote + 1,
        ]);

        $userID = Auth::user()->id;
        $user = User::find($userID);

        $user->update([
            'voted' => '1'
        ]);

        return redirect("voting");
    }
}
