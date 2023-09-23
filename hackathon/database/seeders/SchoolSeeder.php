<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        School::create([
            'schoolName' => "SMA Zion",
            'location' => "Makassar",
            'bannerPicture' => "https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.dbl.id%2Fs%2Fprofile%2F26358%2Fsma-zion&psig=AOvVaw1upIf5anlTIKHLxjDvs1P6&ust=1695538451707000&source=images&cd=vfe&opi=89978449&ved=0CBAQjRxqFwoTCJihpIuTwIEDFQAAAAAdAAAAABAD",
        ]);

        School::create([
            'schoolName' => "SMP 4",
            'location' => "Madiun",
            'bannerPicture' => "https://www.google.com/imgres?imgurl=https%3A%2F%2F1.bp.blogspot.com%2F-RkYG50gmw2Q%2FX4FNQcvTsII%2FAAAAAAAAGaU%2F2BRmZqfyzL0y7NQ9Io63HM2nsPME5M3HACNcBGAsYHQ%2Fs2048%2Flogo%252Bsmp%252Bnegri%252B4%252Bmadiun.png&tbnid=Uyg9vCCdkvnd8M&vet=12ahUKEwji2bq4m8CBAxV-mWMGHSciAfkQMygBegQIARBN..i&imgrefurl=https%3A%2F%2Fwww.dimadiun.com%2F2020%2F10%2Flogo-smpn-4-madiun.html&docid=zhYS2eS1ptOfqM&w=1779&h=2048&q=smp%204%20madiun&ved=2ahUKEwji2bq4m8CBAxV-mWMGHSciAfkQMygBegQIARBN",
        ]);
    }
}
