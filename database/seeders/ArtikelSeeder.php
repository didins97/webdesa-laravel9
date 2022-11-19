<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=5;$i++){
            DB::table('artikel')->insert([
                'judul_artikel' => 'artikel '.$i,
                'slug_artikel' => 'artikel-'.$i,
                'gambar_artikel' => '/images/artikel/artikel_1.jpg',
                'isi_artikel' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley",
                'status' => 1,
                'user_id' => 1
            ]);
        }
    }
}
