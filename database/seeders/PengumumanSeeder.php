<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengumumans')->insert([
            'nama' => 'judul pengumuman',
            'keterangan' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae, asperiores!',
            'gambar' => '/images/pengumuman/pengumuman.jpg',
            'user_id' => 1
        ]);
    }
}
