<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Finance;

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

    public function finance_add(){
        Finance::create([
            'nama' => $_POST["name"],
            'nominal' => $_POST["nominal"],
            'kategori' => $_POST["kategori"],
            'satuan' => $_POST["satuan"],
            'jumlah' => $_POST["jumlah"],
        ]);  

        return redirect("admin-finance");     
    }

    public function finance_edit(){
        $finance = Finance::findOrFail($_POST['id']);

        $finance->update([
            'nama' => $_POST['nama'],
            'nominal' => $_POST['nominal'],
            'kategori' => $_POST['kategori'],
            'satuan' => $_POST['satuan'],
            'jumlah' => $_POST['jumlah'],
        ]);
        
        return redirect("admin-finance");  
    }

    public function finance_delete(){
        if (isset($_POST['delete'])){
            Finance::where('id', $_POST['id'])->delete();
        }
        
        return redirect("admin-finance");  
    }

    public function aboutus_edit(){
        $aboutus = AboutUs::findOrFail(1);
        $maksud = AboutUs::findOrFail(2);
        $tujuan = AboutUs::findOrFail(3);

        $aboutus->update([
            'description' => $_POST['latarbelakang'],
        ]);
        $maksud->update([
            'description' => $_POST['maksud'],
        ]);
        $tujuan->update([
            'description' => $_POST['tujuan'],
        ]);
        
        return redirect("admin-tentang_kami");  
    }
}
