<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsPictures;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function dropzoneNews()
    {
        if (DB::table('news')->latest('created_at')->first() != null) {
            $imgBase = (DB::table('news')->latest('created_at')->first()->id + 1);
        } else {
            $imgBase = 1;
        }

        foreach (NewsPictures::where('news_id', '=', $imgBase)->get() as $img) {
            $img->delete();
        }

        if (Storage::exists("public/images/news/" . $imgBase))
            Storage::deleteDirectory("public/images/news/" . $imgBase);
            
        return view('admin-berita-add', [
            'schools' => School::all()
        ]);
    }

    public function dropzoneStoreNews(Request $request)
    {
        $image = $request->file('file');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        if (DB::table('news')->latest('created_at')->first() != null) {
            $imgBase = (DB::table('news')->latest('created_at')->first()->id + 1);

            if (DB::table('news_pictures')->where('news_id', '=', $imgBase)->latest('created_at')->first()) {
                $imgBase1 = (count(DB::table('news_pictures')->where('news_id', '=', $imgBase)->get()) + 1);
            } else {
                $imgBase1 = 1;
            }

            $imageName = $imgBase1 . "." . $image->getClientOriginalExtension();
        } else {
            $imgBase = 1;

            if (DB::table('news_pictures')->where('news_id', '=', $imgBase)->latest('created_at')->first()) {
                $imgBase1 = (count(DB::table('news_pictures')->where('news_id', '=', $imgBase)->get()) + 1);
            } else {
                $imgBase1 = 1;
            }

            $imageName = $imgBase1 . "." . $image->getClientOriginalExtension();
        }

        NewsPictures::create([
            'pictureName' => $request->file('file')->storeAs('/public/images/news/' . $imgBase, $imageName),
            'news_id' => $imgBase
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return response()->json(['success' => $imageName, 'index' => $imgBase1]);
    }

    public function storeImage(Request $request)
    {
        $image = $request->file('file');

        if (DB::table('news')->latest('created_at')->first() != null) {
            if (DB::table('news_pictures')->where('news_id', '=', $request->news_id)->latest('created_at')->first() != null) {
                $imgBase1 = ((int) collect(explode('.', (DB::table('news_pictures')->where('news_id', '=', $request->news_id)->orderBy('id', 'desc')->first())->pictureName))->first() + 1);
                Log::info('a');
            } else {
                $imgBase1 = 1;
            }

            $imageName = $imgBase1 . "." . $image->getClientOriginalExtension();
        } else {
            if (DB::table('news_pictures')->where('news_id', '=', $request->news_id)->latest('created_at')->first()) {
                $imgBase1 = ((int) collect(explode('.', (DB::table('news_pictures')->where('news_id', '=', $request->news_id)->orderBy('id', 'desc')->first())->pictureName))->first() + 1);
            Log::info('a');
            } else {
                $imgBase1 = 1;
            }

            $imageName = $imgBase1 . "." . $image->getClientOriginalExtension();
        }

        $idLen = strlen($request->news_id);

        NewsPictures::create([
            'pictureName' => substr($request->file('file')->storeAs('/public/images/news/' . $request->news_id, $imageName), $idLen + 20, strlen($request->file('file')->storeAs('/public/images/news/' . $request->news_id, $imageName)) - (20 + $idLen)),
            'news_id' => $request->news_id
        ]);

        return response()->json(['success' => $imageName, 'index' => $imgBase1]);
    }

    public function dropzoneDeleteNews(Request $request)
    {
        if (DB::table('news')->latest('created_at')->first() != null) {
            $imgBase = (DB::table('news')->latest('created_at')->first()->id + 1);
        } else {
            $imgBase = 1;
        }

        Log::info($request->file_name);
        $imageName = $request->file_name . "." . $request->file_ext;

        $imgDel = NewsPictures::where('news_id', '=', $imgBase)->where('pictureName', '=', 'public/images/news/' . $imgBase . '/' . $imageName)->get();

        if ($request->ajax()) {
            if (Storage::exists("public/images/news/" . $imgBase . "/" . $imageName)) //Check if file exists
                Storage::delete("public/images/news/" . $imgBase . "/" . $imageName); //Delete file from storage

            $imgDel->each->delete();

            return response('Photo deleted', 200); //return success
        }
    }

    public function dropzoneDeleteNewsEdit(Request $request)
    {
        $imageName = $request->file_name . "." . $request->file_ext;

        $imgDel = NewsPictures::where('news_id', '=', $request->news_id)->where('pictureName', '=', $imageName)->get();

        if ($request->ajax()) {
            if (Storage::exists("public/images/news/" . $request->news_id . "/" . $imageName)) //Check if file exists
                Storage::delete("public/images/news/" . $request->news_id . "/" . $imageName); //Delete file from storage

            $imgDel->each->delete();

            return response('Photo deleted', 200); //return success
        }
    }

    public function deleteImg(Request $request)
    {
        $this->validate($request, [
            'newspicture_id' => 'required|numeric',
            'news_id' => 'required|numeric'
        ]);

        $img = NewsPictures::where('id', '=', $request->newsimage_id)->get();

        if (File::exists("public/images/news/" . $request->news_id . "/" . $img[0]->pictureName)) //Check if file exists
            File::delete("public/images/news/" . $request->news_id . "/" . $img[0]->pictureName); //Delete file from storage

        $img->each->delete();

        return response()->json([
            'status' => 200,
            'message' => 'success'
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin-berita', [
            'results' => News::all(),
        ]);
    }

    public function index2()
    {
        return view('berita', [
            'results' => News::all(),
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
            'judul' => 'required|string|max:75',
            'isi' => 'required',
            'video_link' => [
                'required',
                'url',
                function ($attribute, $requesturl, $failed) {
                    if (!preg_match('/(youtube.com|youtu.be)\/(embed)?(\?v=)?(\S+)?/', $requesturl)) {
                        $failed(trans("general.not_youtube_url", ["name" => trans("general.url")]));
                    }
                },
            ],
            'gambar' => 'required',
            'sekolah' => 'required|numeric',
        ]);

        $id = 1;

        if (DB::table('news')->latest('created_at')->first() != null) {
            $id = (DB::table('news')->latest('created_at')->first()->id + 1);
        }

        News::create([
            'id' => $id,
            'judul' => $request->judul,
            'description' => $request->isi,
            'video_link' => $request->video_link,
            'school_id' => $request->sekolah,
        ]);
        
        return view('admin-berita', [
            'results' => News::all(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('berita-detail', [
            'news' => News::findOrFail($id),
            'images' => News::findOrFail($id)->news_pictures
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $imagecount = "";

        foreach (NewsPictures::where('news_id', '=', $id)->get() as $a) {
            $imagecount = $imagecount . "1";
        }

        return view('admin-berita-update', [
            'news' => News::findOrFail($id),
            'schools' => School::all(),
            'images' => News::findOrFail($id)->news_pictures,
            'imagecount' => $imagecount
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $this->validate($request, [
            'id' => 'required',
            'judul' => 'required|string|max:75',
            'isi' => 'required',
            'video_link' => [
                'required',
                'url',
                function ($attribute, $requesturl, $failed) {
                    if (!preg_match('/(youtube.com|youtu.be)\/(embed)?(\?v=)?(\S+)?/', $requesturl)) {
                        $failed(trans("general.not_youtube_url", ["name" => trans("general.url")]));
                    }
                },
            ],
            'gambar' => 'required',
            'sekolah' => 'required|numeric',
        ]);
        
        News::findOrFail($request->id)->update([
            'judul' => $request->judul,
            'description' => $request->isi,
            'video_link' => $request->video_link,
            'school_id' => $request->sekolah,
        ]);
        
        return view('admin-berita', [
            'results' => News::all(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        News::findOrFail($request->id)->delete();
        
        return view('admin-berita', [
            'results' => News::all(),
        ]);
    }
}
