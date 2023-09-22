<?php

namespace Database\Seeders;

use App\Models\Finance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Finance::create([
            'nama' => 'Uang transport',
            'nominal' => 200000,
            'kategori' => "pengeluaran",
            'satuan' => "Bulan",
            'jumlah' => 2,
        ]);
    }
}
