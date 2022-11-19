<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        return view('BE.pengumuman.index', [
            'pengumuman' => Pengumuman::orderBy('created_at')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'keterangan' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = '/images/pengumuman/'.rand().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('assets/images/pengumuman'), $imageName);
        $data = [
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'gambar' => $imageName,
            'user_id' => auth()->user()->id,
        ];
        Pengumuman::create($data);
        return redirect()->route('pengumuman.index');
    }

    public function edit($id)
    {
        return Pengumuman::findOrFail($id);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'keterangan' => 'required',
            'gambar' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $pengumuman = Pengumuman::where('id', $request->id)->first();
        if($pengumuman->count() != '') {
            $data = [
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
                'user_id' => auth()->user()->id,
            ];

            if($request->hasFile('gambar')){
                unlink_file($pengumuman->gambar);
                $imageName = '/images/pengumuman/'.rand().'.'.$request->gambar->extension();
                $request->gambar->move(public_path('assets/images/pengumuman'), $imageName);
                $data['gambar'] = $imageName;
            }

            $pengumuman->update($data);
            return redirect()->route('pengumuman.index');
        }
    }

    public function delete($id)
    {
        $pengumuman = Pengumuman::findOrfail($id);
        unlink_file($pengumuman->gambar);
        $pengumuman->delete();
    }
}
