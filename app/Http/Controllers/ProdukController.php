<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('BE.produk.index', [
            'produks' => Produk::orderBy('created_at')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BE.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'keterangan' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $gambar = $request->file('gambar');
        $nama_gambar = upload_file('app/public/assets/produk/thumbnail', $gambar);

        $data = [
            'nama' => $request->nama,
            'slug' => \Str::slug($request->nama),
            'keterangan' => $request->keterangan,
            'gambar' => $nama_gambar,
            'user_id' => auth()->user()->id,
            'status' => $request->status != 'publish' ? false : true,
        ];
        Produk::create($data);
        Alert::success('Produk berhasil di tambahkan');
        return redirect()->route('produk.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('BE.produk.edit', [
            'produk' => $produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'keterangan' => 'required',
            'gambar' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $data = [
            'nama' => $request->nama,
            'slug' => \Str::slug($request->nama),
            'keterangan' => $request->keterangan,
            'user_id' => auth()->user()->id,
            'status' => $request->status != 'publish' ? false : true,
        ];

        if($request->hasFile('gambar')){
            $gambar = $request->file('gambar');
            $nama_gambar = upload_file('app/public/assets/produk/thumbnail', $gambar);
            $data['gambar'] = $nama_gambar;

            File::delete(storage_path('app/public/assets/produk/thumbnail/'. $produk->gambar));
        }

        $produk->update($data);
        Alert::success('Potensi berhasil di update');
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        File::delete(storage_path('app/public/assets/produk/thumbnail/'. $produk->gambar));
        $produk->delete();
    }

    public function update_status($id)
    {
        $data = Produk::findOrFail($id);
        $data->update([
            'status' => $data->status == true? false : true
        ]);
    }
}
