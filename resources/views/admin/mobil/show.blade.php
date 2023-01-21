@extends('admin.layouts.main')

@section('content')
  <div class="row mt-3">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h3 class="mb-1">Detail mobil {{ $mobil->merek->nama }} {{ $mobil->tipe }}</h3>
          <span class="d-block rounded bg-secondary" style="height: 2px;"></span>
          <table class="h6 mt-2" cellpadding="5px">
            <tr>
              <td>Merek</td>
              <td>:</td>
              <td class="text-dark">{{ $mobil->merek->nama }}</td>
            </tr>
            <tr>
              <td>Tipe</td>
              <td>:</td>
              <td class="text-dark">{{ $mobil->tipe }}</td>
            </tr>
            <tr>
              <td>Harga</td>
              <td>:</td>
              <td class="text-dark">Rp. {{ number_format($mobil->harga, 2, ',', '.') }}</td>
            </tr>
            <tr>
              <td>Tahun keluar</td>
              <td>:</td>
              <td class="text-dark">{{ $mobil->tahun_keluar }}</td>
            </tr>
            <tr>
              <td>Gambar</td>
              <td>:</td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td><img src="{{ $mobil->image() }}" alt="{{ $mobil->merek->nama . $mobil->tipe . $mobil->gambar }}" class="img-fluid rounded img-thumbnail" style="max-height: 250px; margin-top: -25px;"></td>
            </tr>
            <tr>
              <td>Deskripsi</td>
              <td>:</td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td class="text-dark">
                <div style="margin-top: -30px;">
                  {!! $mobil->deskripsi !!}
                </div>
              </td>
            </tr>
          </table>
          <div class="d-flex justify-content-end">
            <a href="{{ route('mobil.index') }}" class="btn btn-warning mr-3">Kembali</a>
            <a href="{{ route('mobil.edit', $mobil->id) }}" class="btn btn-success">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection