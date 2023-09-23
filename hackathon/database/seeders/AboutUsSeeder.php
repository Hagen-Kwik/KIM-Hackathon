<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::create([
            'description' => 'Menghadapi era globalisasi serta kebebasan informasi, banyak media informasi baik cetak maupun elektronik, yang berbasis IT maupun yang konvensional yang dapat diakses oleh masyarakat. Sementara kondisi sebagian masyarakat yang belum memiliki kemampuan untuk mengakses dan menelaah muatan informasi tersebut. Perlu adanya wadah bagi masyarakat untuk memperoleh informasi serta menyalurkan informasi yang ada di masyarakat.

            Guna menyikapi hal tersebut di atas, Kelompok Informasi Masyarakat (KIM) Anyelir dibentuk pada tanggal 12 Agustus 2014 yang dikukuhkan dengan Surat Keputusan Lurah kejuron dengan nomor: 489/07/401.403.6/2014.',
        ]);
        AboutUs::create([
            'description' => 'Kelompok Informasi Masyarakat (KIM) Anyelir Kelurahan Kejuron Kecamatan Taman Kota Madiun merupakan organisasi sosial kemasyarakatan yang tumbuh dari, oleh dan untuk masyarakat yang berorientasi pada layanan informasi dan pemberdayaan masyarakat sesuai dengan kebutuhan. 

            KIM Anyelir disini merupakan bagian integral dari Public Relation yang salah satu tugasnya membentuk opini public yang favourable. Oleh karenanya di tengah perubahan transisi menuju masyarakat madani saat ini, yang menjunjung tinggi nilai-nilai demokrasi, transparasi dan nilai-nilai hukum, KIM Anyelir harus mampu menyikapi serta mengambil peluang secara cerdas dalam memanfaatkan dan mengolah informasi yang ada dengan tanpa meninggalkan tradisi dan budaya lokal yang ada.',
        ]);
    }
}
