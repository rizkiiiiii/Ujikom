<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerekController extends Controller
{
    private function isAdmin()
    {
        return (Auth::user() && (Auth::user()->role->nama === 'admin'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!$this->isAdmin()) {
            return redirect('/admin/login');
        }

        $title = 'Data Merek';
        $mereks = Merek::latest()->get();

        return view('admin.merek.index', compact(
            'title',
            'mereks'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!$this->isAdmin()) {
            return redirect('/admin/login');
        }

        $title = 'Tambah Data Merek';

        return view('admin.merek.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$this->isAdmin()) {
            return;
        }

        $validated = $request->validate([
            'nama' => 'required|max:255|unique:mereks',
        ]);
        $validated['slug'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $validated['nama']));

        Merek::create($validated);
        return redirect()->route('merek.index')->with('success', 'Data merek baru berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$this->isAdmin()) {
            return redirect('/admin/login');
        }

        $merek = Merek::findOrFail($id);
        $title = 'Detail Data Merek ' . $merek->nama;

        return view('admin.merek.show', compact(
            'merek',
            'title'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$this->isAdmin()) {
            return redirect('/admin/login');
        }

        $merek = Merek::findOrFail($id);
        $title = 'Edit Data Merek';

        return view('admin.merek.edit', compact(
            'merek',
            'title'
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
        if (!$this->isAdmin()) {
            return;
        }

        $merek = Merek::findOrFail($id);

        if ($request->nama !== $merek->nama) {
            $validated = $request->validate([
                'nama' => 'required|max:255|unique:mereks',
            ]);
            $merek->nama = $validated['nama'];
            $merek->slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $validated['nama']));
            $merek->save();
        }

        return redirect()->route('merek.index')->with('success', 'Data merek berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->isAdmin()) {
            return;
        }

        if (Mobil::where('id_merek', $id)->count() > 0) {
            return redirect()->route('merek.index')->with('fail', 'Gagal menghapus data merek, Masih ada mobil yang menggunakan merek ini!');
        }

        $merek = Merek::findOrFail($id);

        $merek->delete();
        return redirect()->route('merek.index')
            ->with('success', 'Data berhasil dihapus!');

        return redirect()->route('merek.index')->with('success', 'Data merek berhasil dihapus!');
    }
}
