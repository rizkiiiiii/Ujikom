<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
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
        if (!$this->isAdmin()) return redirect('/admin/login');

        $pesanans = Pesanan::all();
        $title = 'Data pesanan';

        return view('admin.pesanan.index', compact('pesanans', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$this->isAdmin()) return redirect('/admin/login');

        $pesanan = Pesanan::findOrFail($id);
        $title = 'Detail pesanan';

        return view('admin.pesanan.show', compact(
            'pesanan',
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
        if (!$this->isAdmin()) return redirect('/admin/login');

        $pesanan = Pesanan::findOrFail($id);
        $title = 'Ubah status pesanan';

        return view('admin.pesanan.edit', compact(
            'pesanan',
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
        if (!$this->isAdmin()) return;

        $pesanan = Pesanan::findOrFail($id);

        $pesanan->status_pesanan = $request->status_pesanan;
        $pesanan->save();

        return redirect()->route('pemesanan.index')->with('success', 'Status pesanan berhasil diubah menjadi ' . $request->status_pesanan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
