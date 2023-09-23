<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Http\Requests\StorePodcastRequest;
use App\Http\Requests\UpdatePodcastRequest;
use Illuminate\Support\Facades\DB;


class PodcastController extends Controller
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
    public function store(StorePodcastRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Podcast $podcast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Podcast $podcast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePodcastRequest $request, Podcast $podcast)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Podcast $podcast)
    {
        //
    }

    public function getAll()
    {
        $results = DB::table('podcasts')
            ->select('id', 'link', 'judul', 'created_at', 'updated_at')
            ->get();

        return view('podcast', [
            'results' => $results,
        ]);
    }

    public function podcast(){
        $results = DB::table('podcasts')
            ->select('id', 'link', 'judul', 'created_at', 'updated_at')
            ->get();
        
            return view('admin-podcast', [
                'results' => $results,
            ]);    
    }

    public function podcast_add(){
        Podcast::create([
            'judul' => $_POST['judul'],
            'link' => $_POST['link'],
        ]);  

        return redirect("admin-podcast");     
    }

    public function podcast_edit(){
        $podcast = Podcast::findOrFail($_POST['id']);

        $podcast->update([
            'judul' => $_POST['judul'],
            'link' => $_POST['link'],
        ]);
        
        return redirect("admin-podcast");  
    }

    public function podcast_delete(){
        if (isset($_POST['delete'])){
            Podcast::where('id', $_POST['id'])->delete();
        }
        
        return redirect("admin-podcast");  
    }

}
