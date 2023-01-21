<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Pemesan;
use App\Models\Pesanan;
use App\Models\User;

class PenggunaController extends Controller
{
    public function index()
    {
        $title = 'Temukan Mobil Impianmu di Sini';
        $mobils = Mobil::limit(8)->get();

        return view('index', compact('title', 'mobils'));
    }

    public function mobil()
    {
        if (request('merek') && request('search')) {
            $merek = Merek::firstWhere('slug', request('merek'));
            $mobils = Mobil::whereHas('merek', function($query) {
                $query->where('slug', request('search'));
            })->orWhere('tipe', 'like', '%'. request('search') . '%')
            ->orWhere('tahun_keluar', 'like', '%'. request('search') . '%')->get();
            $title = 'Hasil Pencarian Untuk ' . request('search') . ' Pada Merek ' . $merek->nama;
        } else if(request('merek')) {
            $merek = Merek::firstWhere('slug', request('merek'));
            $mobils = $merek->mobil;
            $title = 'Daftar Mobil Dengan Merek ' . $merek->nama;
        }else if (request('search')) {
            $title = 'Hasil Pencarian Untuk ' . request('search');
            $mobils = Mobil::where('tipe', 'like', '%'. request('search') . '%')
            ->orWhere('tahun_keluar', 'like', '%'. request('search') . '%')
            ->orWhereHas('merek', fn($query) => $query->where('nama', 'like', '%'. request('search') . '%'))->get();
        } else {
            $title = 'Daftar Seluruh Mobil';
            $mobils = Mobil::all();
        }

        return view('pages.mobil.index', compact('title', 'mobils'));
    }

    public function merek()
    {
        $title = 'Cari Mobil Berdasarkan Merek';
        $mereks = Merek::all();

        return view('pages.mobil.merek', compact('title', 'mereks'));
    }

    public function detailMobil(Mobil $mobil)
    {
        $title = $mobil->merek->nama . ' ' . $mobil->tipe . ' ' . $mobil->tahun_keluar;
        $pesananAktif = Pesanan::where('id_mobil', $mobil->id)->get()->filter(fn($item) => $item->status_pesanan !== 'gagal');
        $isBooked = ($pesananAktif->count() > 0);

        return view('pages.mobil.show', compact('title', 'mobil', 'isBooked'));
    }

    public function order(Mobil $mobil)
    {
        $title = 'Isi detail pesanan';
        $pesananAktif = Pesanan::where('id_mobil', $mobil->id)->get()->filter(fn($item) => $item->status_pesanan !== 'gagal');
        $isBooked = ($pesananAktif->count() > 0);

        if ($isBooked) return redirect('/');
        if (auth()->user()->role->nama === 'admin') return redirect('/admin');
 
        return view('pages.mobil.order', compact('title', 'mobil'));
    }

    public function createOrder(Request $request)
    {
        $validated = $request->validate([
            'id_mobil' => 'required',
            'nama_lengkap' => 'required|max:255',
            'no_hp' => 'required',
            'alamat_lengkap' => 'required'
        ]);

        $pemesan = Pemesan::create([
            'id_user' => auth()->user()->id,
            'nama_lengkap' => $validated['nama_lengkap'],
            'no_hp' => $validated['no_hp'],
            'alamat_lengkap' => $validated['alamat_lengkap']
        ]);

        date_default_timezone_set('Asia/Jakarta');

        $pesanan = Pesanan::create([
            'id_pemesan' => $pemesan->id,
            'id_mobil' => $validated['id_mobil'],
            'tanggal_pesan' => date("Y-m-d"),
            'status_pesanan' => 'tertunda'
        ]);

        return redirect('/pesanan/'. $pesanan->id)->with('success', 'Pesanan Berhasil Dibuat');
    }

    public function orders()
    {
        if (auth()->user()->role->nama === 'admin') return redirect('/admin');

        $title = 'Daftar Pesananmu';
        $pemesan = Pemesan::where('id_user', auth()->user()->id)->get();

        if ($pemesan->count() < 1) {
            $filterPesanan = collect([]);
            return view('pages.pesanan.index', compact('title', 'filterPesanan'));
        }

        $pesanans = Pesanan::with('pemesan')->get();
        $filterPesanan = $pesanans->filter(function($value) {
            return $value->pemesan->id_user === auth()->user()->id;
        });

        return view('pages.pesanan.index', compact('title', 'filterPesanan'));
    }

    public function orderDetail(Pesanan $pesanan)
    {
        if (auth()->user()->role->nama === 'admin') return redirect('/admin');

        if ($pesanan->pemesan->id_user !== auth()->user()->id) return redirect('/');

        $title = 'Detail Pesanan';

        return view('pages.pesanan.show', compact('title', 'pesanan'));
    }
    
    public function profile(User $user)
    {
        $title = $user->username . ' (' . $user->nama . ')';

        $subtitle = 'Profil ' . $user->nama;

        if (auth()->user()) {
            $subtitle = auth()->user()->id === $user->id ? 'Profilmu' : $subtitle;
        }

        return view('pages.profil.index', compact('title', 'user', 'subtitle'));
    }

    public function editProfile(User $user)
    {
        if (auth()->user()->role->nama === 'admin') return redirect('/admin');

        $title = 'Ubah profilmu';

        return view('pages.profil.edit', compact('title'));
    }

    public function updateProfile(Request $request)
    {   
        $user = User::find(auth()->user()->id);
        if ($request->username !== auth()->user()->username) {
            $validated = $request->validate([
                'nama' => 'required|max:255',
                'username' => 'required|max:12|unique:users',
                // 'foto_profil' => 'required|image|max:2048'
            ]);
        } else {
            $validated = $request->validate([
                'nama' => 'required|max:255',
                'username' => 'required|max:12',
                // 'foto_profil' => 'required|image|max:2048'
            ]);
        }


        $user->nama = $validated['nama'];
        $user->username = $validated['username'];

        if ($request->hasFile('foto_profil')) {
            $image = $request->file('foto_profil');
            $imageName = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/user/', $imageName);
            $user->foto_profil = $imageName;
        }

        $user->save();

        return redirect('/user/' . $user->username)->with('success', 'Profil berhasil diubah');
    }
}
