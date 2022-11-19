<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile_desa')->insert([
            'email' => 'admin_mallasoro@app.com',
            'visi' => 'Menjadikan HIMAFORMAT FT-UIM sebagai lembaga yang integritas,progresif,inovatif dan sinergis untuk mewujudkan fakultas teknik uim yang lebih unggul',
            'misi' => '<ol><li>Membangun sistem kerja HIMAFORMAT FT UIM yang Profesional dan solid</li><li>Menciptakan HIMAFORMAT FT UIM sebagai wadah untuk menampung dan menyalurkan&nbsp;aspirasi mahasiswa informatika fakultas teknik uim</li><li>Mengembangkan potensi minat dan bakat mahasiswa informatika fakultas teknik uim dalam bidang akademik maupun non akademik</li><li>Menjaga dan Meningkatkan sinergitas antar civitas akademik dan organisasi mahasiswa baik internal maupun eksternal</li></ol>',
            'sejarah_desa' => 'Organisasi ini bernama Himpunan Mahasiswa Informatika Fakultas Teknik Universitas Islam Makassar, yang selanjutnya disingkat menjadi HIMAFORMAT FT-UIM. HIMAFORMAT FT-UIM didirikan di Kota Malino, Kabupaten Gowa, Provinsi Sulawesi Selatan pada tanggal 27 Juli 2000 sampai jangka waktu yang tidak ditentukan. HIMAFORMAT FT-UIM berkedudukan di Fakultas Teknik Universitas Islam Makassar, sebagai bagian dari lembaga kemahasiswaan di fakultas teknik universitas islam makassar',
            'peta_wilayah' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32960.13659507925!2d119.56627851198074!3d-5.642078072612856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db92dcf9fd2765f%3A0x930502393633df95!2sMallasoro%2C%20Bangkala%2C%20Kabupaten%20Jeneponto%2C%20Sulawesi%20Selatan!5e0!3m2!1sid!2sid!4v1665532724245!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'struktural' => '/images/struktur/img1.png',
            'facebook' => 'kkntuim_mallasoro',
            'instagram' => 'kkntuim_mallasoro',
            'youtube' => 'UCWOWENbWatUIiVI4FBXL_zg',
            'contact_center' => '85241702298',
            'produk' => '85241702298',
            'alamat' => 'kabupaten jeneponto kecamatan bangkala desa mallasoro'
        ]);
    }
}
