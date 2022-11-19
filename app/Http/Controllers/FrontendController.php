<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Pengumuman;
use App\Models\PotensiDesa;
use App\Models\Produk;
use App\Models\ProfileDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        return view('FE.beranda', [
            'berita_terbaru' => DB::table('artikel')->where('status', true)->limit(3)->get(),
            'pengumuman' => DB::table('pengumumans')->orderBy('created_at')->first(),
            'profile' => DB::table('profile_desa')->first()
        ]);
    }

    public function get_berita()
    {
        return view('FE.berita', [
            'berita' => DB::table('artikel')->where('status', true)->orderBy('created_at')->paginate(3)
        ]);
    }

    public function get_potensi()
    {
        return view('FE.potensi', [
            'potensi' => DB::table('potensis')->where('status', true)->orderBy('created_at')->paginate(4)
        ]);
    }

    public function get_produk()
    {
        return view('FE.produk', [
            'produks' => DB::table('produks')->where('status', true)->orderBy('created_at')->paginate(6)
        ]);
    }

    public function get_tentang()
    {
        return view('FE.tentang', [
            'profile' => DB::table('profile_desa')->first()
        ]);
    }

    public function get_beritaBySlug($slug)
    {
        return view('FE.preview_berita', [
            'berita' => Artikel::where('slug_artikel', $slug)->first(),
            'berita_terbaru' => Artikel::where('slug_artikel', '!=', $slug)->orderBy('created_at')->limit(3)->get()
        ]);
    }

    public function get_potensiBySlug($slug)
    {
        return view('FE.preview_potensi', [
            'potensi' => PotensiDesa::where('slug', $slug)->first()
        ]);
    }

    public function get_productBySlug($slug)
    {
        return view('FE.preview_produk', [
            'produk' => Produk::where('slug', $slug)->first()
        ]);
    }
}
