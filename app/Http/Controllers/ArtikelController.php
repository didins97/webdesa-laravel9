<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtikelRequest;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('BE.artikel.index', [
            'artikels' => Artikel::orderBy('created_at')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BE.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtikelRequest $request)
    {
        $gambar = $request->file('gambar_artikel');
        $nama_gambar = upload_file('app/public/assets/artikel/thumbnail', $gambar);

        $data = [
            'judul_artikel' => $request->judul_artikel,
            'slug_artikel' => \Str::slug($request->judul_artikel),
            'isi_artikel' => $request->isi_artikel,
            'gambar_artikel' => $nama_gambar,
            'user_id' => auth()->user()->id,
            'status' => $request->status != 'publish' ? false : true,
        ];
        Artikel::create($data);
        Alert::success('Berita berhasil ditambahkan');
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        return view('BE.artikel.edit', [
            'artikel' => $artikel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(ArtikelRequest $request, Artikel $artikel)
    {
        $data = [
            'judul_artikel' => $request->judul_artikel,
            'slug_artikel' => \Str::slug($request->judul_artikel),
            'isi_artikel' => $request->isi_artikel,
            'status' => $request->status != 'publish' ? false : true,
        ];

        if($request->hasFile('gambar_artikel')){
            $gambar = $request->file('gambar_artikel');
            $nama_gambar = upload_file('app/public/assets/artikel/thumbnail', $gambar);
            $data['gambar_artikel'] = $nama_gambar;

            File::delete(storage_path('app/public/assets/artikel/thumbnail/'. $artikel->gambar_artikel));
        }

        $artikel->update($data);
        Alert::success('Berita berhasil di update');
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        // if( $artikel->galleries != null )
        //     File::delete(storage_path('app/public/assets/foto/galleries', $artikel->galleries));

        // foreach( unserialize($artikel->galleries) as $sf_lama ) {
        //     File::delete(storage_path('app/public/assets/foto/galleries', $sf_lama));
        // }
        File::delete(storage_path('app/public/assets/artikel/thumbnail/'. $artikel->gambar_artikel));
        $artikel->delete();
    }

    public function update_status($id)
    {
        $data = Artikel::findOrFail($id);
        $data->update([
            'status' => $data->status == true? false : true
        ]);
    }
}
