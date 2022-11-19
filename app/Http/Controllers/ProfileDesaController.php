<?php

namespace App\Http\Controllers;

use App\Models\ProfileDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileDesaController extends Controller
{
    public function index()
    {
        return view('BE.profil.index',[
            'profile' => DB::table('profile_desa')->select('id','sejarah_desa', 'struktural', 'visi', 'misi')->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sejarah_desa' => 'required|min:5',
            'visi' => 'required|min:5',
            'misi' => 'required|min:5',
        ]);

        $data = [
            'sejarah_desa' => $request->sejarah_desa,
            'visi' => $request->visi,
            'misi' => $request->misi
        ];

        $profile = ProfileDesa::findOrFail($id);

        if($request->hasFile('struktural')){
            $gambar = $request->file('struktural');
            $nama_gambar = upload_file('app/public/assets/struktur', $gambar);
            $data['struktural'] = $nama_gambar;

            File::delete(storage_path('app/public/assets/artikel/thumbnail/'. $profile->struktural));
        }

        $profile->update($data);
        Alert::success('Profil berhasil di update');
        return redirect()->back();
    }
}
