@extends('layouts.main')

@section('content')
  <div class="row mt-5 py-5">
    <div class="col py-5">
      <div class="card shadow p-4">
        <h3>Detail pesanan</h3>
        <span class="d-block bg-danger rounded-full" style="height: 2px; width: 275px;margin-top: -10px;"></span>
        <div class="mt-2">
          <table cellpadding="10px" class="table">
            <tr>
              <td>Id Pesanan</td>
              <td>:</td>
              <td class="text-dark">{{ $pesanan->id }}</td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td class="text-dark">
                <a href="/user/{{ $pesanan->pemesan->user->username }}" target="_blank">
                  {{ $pesanan->pemesan->nama_lengkap }}</a>
                </a>
              </td>
            </tr>
            <tr>
              <td>No Hp</td>
              <td>:</td>
              <td class="text-dark">{{ $pesanan->pemesan->no_hp }}</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td class="text-dark">{{ $pesanan->pemesan->alamat_lengkap }}</td>
            </tr>
            <tr>
              <td>Mobil</td>
              <td>:</td>
              <td class="text-dark">
                <a href="/mobil/{{ $pesanan->mobil->id }}" target="_blank">
                  {{ $pesanan->mobil->merek->nama }} {{ $pesanan->mobil->tipe }} {{ $pesanan->mobil->tahun_keluar }}
                </a>
              </td>
            </tr>
            <tr>
              <td>Harga</td>
              <td>:</td>
              <td class="text-dark">Rp {{ number_format($pesanan->mobil->harga, 2, ',', '.') }}</td>
            </tr>
            <tr>
              <td>Status Pesanan</td>
              <td>:</td>
              <td class="text-dark">{{ $pesanan->status_pesanan }}</td>
            </tr>
          </table>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <small class="fw-bolder">
              Punya pertanyaan mengenai pesanan? Tanyakan di <a href="https://wa.me/+6212345678910" target="_blank">012345678910</a>
            </small>
          </div>
          <div>
            <a href="/" class="btn btn-danger btn-sm" >Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection