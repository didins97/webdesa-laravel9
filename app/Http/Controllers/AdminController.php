<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\PotensiDesa;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('BE.dashboard.index', [
            'artikel_count' => Artikel::count(),
            'potensi_count' => PotensiDesa::count(),
            'user_count' => User::count(),
            'produk_count' => Produk::count()
        ]);
    }
}
