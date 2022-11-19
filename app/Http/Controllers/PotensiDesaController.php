<?php

namespace App\Http\Controllers;

use App\Http\Requests\PotensiRequest;
use App\Models\PotensiDesa;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PotensiDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('BE.potensi.index', [
            'potensis' => PotensiDesa::orderBy('created_at')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BE.potensi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PotensiRequest $request)
    {
        $data = [
            'nama' => $request->nama,
            'slug' => \Str::slug($request->nama),
            'keterangan' => $request->keterangan,
            'user_id' => auth()->user()->id,
            'status' => $request->status != 'publish' ? false : true,
        ];

        // thumbnail
        $gambar = $request->file('thumbnail');
        $nama_gambar = upload_file('app/public/assets/potensi/thumbnail', $gambar);
        $data['thumbnail'] = $nama_gambar;

        // galeri
        foreach( $request->file('galleries_foto') as $galleries_foto ) {
            $filename_galleries_foto = upload_file('app/public/assets/potensi/galleri', $galleries_foto);
            $galleries_foto_array[] = $filename_galleries_foto;
        }

        $data['galeri'] = serialize( $galleries_foto_array);

        PotensiDesa::create($data);

        Alert::success('Potensi berhasil di tambahkan');
        return redirect()->route('potensi_desa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PotensiDesa  $potensiDesa
     * @return \Illuminate\Http\Response
     */
    public function show(PotensiDesa $potensiDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PotensiDesa  $potensiDesa
     * @return \Illuminate\Http\Response
     */
    public function edit(PotensiDesa $potensiDesa)
    {
        return view('BE.potensi.edit', [
            'potensi' => $potensiDesa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PotensiDesa  $potensiDesa
     * @return \Illuminate\Http\Response
     */
    public function update(PotensiRequest $request, PotensiDesa $potensiDesa)
    {
        $data = [
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'user_id' => auth()->user()->id,
            'status' => $request->status != 'publish' ? false : true,
        ];

        if($request->hasFile('thumbnail')) {
            $gambar = $request->file('thumbnail');
            $nama_gambar = upload_file('app/public/assets/potensi/thumbnail', $gambar);
            $data['thumbnail'] = $nama_gambar;

            File::delete(storage_path('app/public/assets/potensi/thumbnail/'.$potensiDesa->thumbnail));
        }

        if ($request->hasFile('galleries_foto')) {
            unlink_file(unserialize($potensiDesa->galeri));
            foreach( $request->file('galleries_foto') as $galleries_foto ) {
                $filename_galleries_foto = upload_file('app/public/assets/potensi/galleri', $galleries_foto);
                $galleries_foto_array[] = $filename_galleries_foto;
            }
            $data['galeri'] = serialize($galleries_foto_array);

            foreach( unserialize($potensiDesa->galeri) as $fl_lama ) {
                File::delete(storage_path('app/public/assets/potensi/galleri/'.$fl_lama));
            }
        }

        $potensiDesa->update($data);

        Alert::success('Potensi berhasil di update');
        return redirect()->route('potensi_desa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PotensiDesa  $potensiDesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(PotensiDesa $potensiDesa)
    {
        if($potensiDesa->galeri != null){
            for($i=0;$i<count(unserialize($potensiDesa->galeri));$i++){
                File::delete(storage_path('app/public/assets/potensi/galleri/'. $potensiDesa->galeri[$i]));
            }
        }
        File::delete(storage_path('app/public/assets/potensi/thumbnail/'.$potensiDesa->thumbnail));
        $potensiDesa->delete();
    }

    public function update_status($id)
    {
        $data = PotensiDesa::findOrFail($id);
        $data->update([
            'status' => $data->status == true? false : true
        ]);
    }
}
