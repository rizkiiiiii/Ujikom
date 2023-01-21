@extends('admin.layouts.main')

@section('content')
  <div class="row mt-3">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h3 class="mb-1 text-dark">Detail pesanan</h3>
          <span class="d-block rounded bg-secondary" style="height: 2px;"></span>
          <div class="mt-3">
            <h4 class="display-6">Data pemesan</h4>
            <table class="mt-1" cellpadding="5px">
              <tr>
                <td>Nama lengkap</td>
                <td>:</td>
                <td class="text-dark">{{ $pesanan->pemesan->nama_lengkap }}</td>
              </tr>
              <tr>
                <td>Alamat Lengkap</td>
                <td>:</td>
                <td class="text-dark">{{ $pesanan->pemesan->alamat_lengkap }}</td>
              </tr>
              <tr>
                <td>Nomor Hp</td>
                <td>:</td>
                <td class="text-dark">{{ $pesanan->pemesan->no_hp }}</td>
              </tr>
            </table>
          </div>
          <div class="mt-4">
            <h4 class="diplay-6">Data akun pemesan</h4>
            <table class="mt-1" cellpadding="5px">
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td class="text-dark">{{ $pesanan->pemesan->user->nama }}</td>
              </tr>
              <tr>
                <td>Username</td>
                <td>:</td>
                <td class="text-dark">{{ $pesanan->pemesan->user->username }}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td class="text-dark">{{ $pesanan->pemesan->user->email }}</td>
              </tr>
            </table>
          </div>
          <div class="mt-4">
            <h4 class="diplay-6">Data pesanan lainnya</h4>
            <table class="mt-1" cellpadding="5px">
              <tr>
                <td>Id pesanan</td>
                <td>:</td>
                <td class="text-dark">{{ $pesanan->id }}</td>
              </tr>
              <tr>
                <td>Status pesanan</td>
                <td>:</td>
                <td class="text-dark">{{ $pesanan->status_pesanan }}</td>
              </tr>
              <tr>
                <td>Tanggal pesan</td>
                <td>:</td>
                <td class="text-dark">{{ $pesanan->tanggal_pesan }}</td>
              </tr>
              <tr>
                <td>Mobil yang dipesan</td>
                <td>:</td>
                <td class="text-dark">
                  <a href="{{ route('mobil.show', $pesanan->mobil->id) }}">{{ $pesanan->mobil->merek->nama }} {{ $pesanan->mobil->tipe }} tahun {{ $pesanan->mobil->tahun_keluar }}</a>
                </td>
              </tr>
              <tr>
                <td>Harga</td>
                <td>:</td>
                <td class="text-dark"> Rp {{ number_format($pesanan->mobil->harga, 2, ',', '.') }}</td>
              </tr>
            </table>
          </div>
          <div class="d-flex justify-content-end">
            <a href="{{ route('pemesanan.index') }}" class="btn btn-warning mr-3">Kembali</a>
            <a href="{{ route('pemesanan.edit', $pesanan->id) }}" class="btn btn-success">Ubah Status</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection