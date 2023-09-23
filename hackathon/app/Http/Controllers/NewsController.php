<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class NewsController extends Controller
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
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $results = DB::table('News')
            ->select('id','description','video_link','judul', 'created_at', 'updated_at')
            ->get();

        return view('admin-berita', [
            'results' => $results,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }

    public function news_add()
    {
        News::create([
            'judul' => $_POST["judul"],
            'description' => $_POST["isiBerita"],
            'video_link' => $_POST["VideoLink"],
        ]);

        return redirect("admin-berita");
    }
}
