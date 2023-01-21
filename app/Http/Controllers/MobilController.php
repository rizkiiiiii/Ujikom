<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mobil;
use App\Models\Pesanan;

class MobilController extends Controller
{
    private function isAdmin() 
    {
        return (Auth::user() && Auth::user()->role->nama === 'admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!$this->isAdmin()) return redirect('/admin/login');

        $mobils = Mobil::all();
        $title = 'Data Mobil';

        return view('admin.mobil.index', compact(
            'mobils',
            'title'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!$this->isAdmin()) return redirect('/admin/login');

        $title = 'Data Mobil';
        $mereks = Merek::all();

        return view('admin.mobil.create', compact(
            'title',
            'mereks'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$this->isAdmin()) return;

        $validated = $request->validate([
            'id_merek' => 'required',
            'tipe' => 'required|max:255',
            'warna' => 'required|max:255',
            'harga' => 'required',
            'tahun_keluar' => 'required',
            'gambar' => 'required|image|max:10000',
            'deskripsi' => 'required'
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = uniqid() . $image->getClientOriginalName();
            $image->move('images/mobil/', $imageName);
            $validated['gambar'] = $imageName;
        }

        Mobil::create($validated);
        return redirect()->route('mobil.index')->with('success', 'Data mobil baru berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$this->isAdmin()) return redirect('/admin/login');

        $mobil = Mobil::findOrFail($id);
        $title = 'Detail data mobil ' . $mobil->merek->nama . '  ' . $mobil->tipe;

        return view('admin.mobil.show', compact('mobil', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$this->isAdmin()) return redirect('/admin/login');

        $title = 'Data Mobil';
        $mereks = Merek::all();
        $mobil = Mobil::findOrFail($id);

        return view('admin.mobil.edit', compact(
            'title',
            'mereks',
            'mobil'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$this->isAdmin()) return;

        $validated = $request->validate([
            'id_merek' => 'required',
            'tipe' => 'required|max:255',
            'harga' => 'required',
            'tahun_keluar' => 'required',
            'gambar' => 'image|max:10000',
            'deskripsi' => 'required'
        ]);

        $mobil = Mobil::findOrFail($id);

        $mobil->id_merek = $validated['id_merek'];
        $mobil->tipe = $validated['tipe'];
        $mobil->harga = $validated['harga'];
        $mobil->tahun_keluar = $validated['tahun_keluar'];
        $mobil->deskripsi = $validated['deskripsi'];

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/mobil/', $imageName);
            $mobil->gambar = $imageName;
        }

        $mobil->save();
        return redirect()->route('mobil.index')->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->isAdmin()) return;

        $mobil = Mobil::findOrFail($id);
        if (Pesanan::where('id_mobil', $mobil->id)->count() > 0) return redirect()->route('mobil.index')->with('fail', 'Gagal Menghapus Data Mobil Ini Karena Masih Digunakan Pada Tabel Pesanan!');


        if ($mobil->gambar) {
            $mobil->deleteImage();
        }

        $mobil->delete();

        return redirect()->route('mobil.index')->with('success', 'Data mobil berhasil dihapus!');
    }
}
