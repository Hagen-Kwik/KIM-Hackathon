<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function finance(){
        $results = DB::table('finances')
            ->select('id', 'created_at', 'updated_at', 'nama', 'kategori', 'nominal', 'satuan', 'jumlah')
            ->selectRaw('(nominal * jumlah) AS total')
            ->get();
        
            return view('admin-finance', [
                'results' => $results,
                'name' => "tes"
            ]);    

    }
}
