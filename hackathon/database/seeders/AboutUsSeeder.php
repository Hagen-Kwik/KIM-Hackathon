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
            'description' => 'Jurnalistik merupakan dunia yang mengasyikkan dan memberi banyak manfaat terutama untuk pengembangan skill. Pelajar dan mahasiswa pun perlu dikenalkan dan diakrabkan dengan dunia jurnalistik. Salah satunya adalah skills dalam mengelola dunia jurnalistik. Dengan mendalami jurnalistik, khususnya jurnalistik media (koran, majalah, dan platform digital) akan membawa dampak positif. Salah satunya adalah keterampilan mereka di dalam mengelola media massa. Dengan memiliki ketrampilan di dalam mengelola media massa, maka peluang remaja untuk terjun di dalam dunia jurnalistik akan terbuka lebar. 

            Adanya program pelatihan jurnalistik ”Citizen Journalism Remaja” atau yang lebih dikenal CJr merupakan salah satu ikhtiar dalam rangka mengembangkan skills remaja di Kota Madiun khususnya wilayah Kel. Kejuron dalam dunia jurnalistik/kepenulisan. Materi dalam kegiatan jurnalistik ini tidak membebani pelajar dengan tema-tema yang berat, namun diupayakan peserta merasa senang dan enjoy di dalam mengikuti pelatihan. Dengan Pelatihan ini diharapkan akan memunculkan remaja dan pelajar yang memiliki kemampuan di dalam mengelola media massa secara handal.',
        ]);
        AboutUs::create([
            'description' => 'Maksud dari kegiatan CJr ini adalah memfasilitasi siswa melakukan wawancara, mencatat, merekam (mendokumentasikan) kegiatan observasi (pengamatan) yang berkaitan dengan tema pembelajaran baik secara individu ataupun kelompok. Kemudian siswa menuliskan hasilnya ke dalam bentuk artikel laporan berita, mengupload dalam bentuk gambar ataupun video.',
        ]);
        AboutUs::create([
            'description' => 'Meningkatkan skill/kemampuan remaja dalam dunia tulis menulis. Hal ini akan memberikan dampak positif bagi adik-adik remaja salah satunya dalam mengelola media massa. Dengan memiliki keterampilan di dalam mengelola media massa, maka peluang remaja untuk terjun di dalam dunia jurnalistik akan terbuka lebar.
            Mengenalkan kepada pelajar tentang seluk-beluk dunia jurnalistik.
            Menumbuhkan kecerdasan dan kreativitas pelajar melalui tradisi jurnalistik.
            Mampu membuat media massa sendiri, majalah sekolah, baik offline maupun online.',
        ]);
    }
}
