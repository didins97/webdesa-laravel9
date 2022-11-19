<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PotensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = ['/images/potensi/img01.jpg','/images/potensi/img02.jpg','/images/potensi/img03.jpg'];
        for($i=1;$i<=10;$i++){
            DB::table('potensis')->insert([
                'nama' => 'Potensi'.$i,
                'slug' => 'potensi-'.$i,
                'keterangan' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'galeri' => serialize($images),
                'user_id' => 1,
                'thumbnail' => '/images/potensi/img01.jpg',
                'status' => 1
            ]);
        }
    }
}
