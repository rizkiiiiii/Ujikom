@extends('layouts.main')

@section('content')
  <div class="row mt-5 pt-5">
    <div class="col pt-5">
      <h3>{{ $mobil->merek->nama }} {{ $mobil->tipe }} {{ $mobil->tahun_keluar }}</h3>
      <span class="bg-danger d-block rounded" style="height: 2px;width: 325px;margin-top: -10px;"></span>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col">
      <div class="shadow mt-3 rounded mx-auto d-flex justify-content-start w-100 py-3 align-items-center px-3">
        <div class="w-50">
          <img src="{{ $mobil->image() }}" alt="{{ $mobil->merek->nama }} {{ $mobil->tipe }} {{ $mobil->tahun }}" class="img-fluid rounded img-thumbnail w-100">
        </div>
        <div class="px-4 w-50">
          <div class="mb-3">
            <p class="text-dark">Merek</p>
            <p style="margin-top: -18px">{{ $mobil->merek->nama }}</p>
          </div>
          <div class="mb-3">
            <p class="text-dark">Tipe</p>
            <p style="margin-top: -18px">{{ $mobil->tipe }}</p>
          </div>
          <div class="mb-3">
            <p class="text-dark">Warna</p>
            <p style="margin-top: -18px">{{ $mobil->warna }}</p>
          </div>
          <div class="mb-3">
            <p class="text-dark">Keluaran tahun</p>
            <p style="margin-top: -18px">{{ $mobil->tahun_keluar }}</p>
          </div>
          <div class="mb-3">
            <p class="text-dark">Harga</p>
            <p style="margin-top: -18px">Rp {{ number_format($mobil->harga, 2, ',', '.') }}</p>
          </div>
          <div class="mb-4 border-top">
            {!! $mobil->deskripsi !!}
          </div>
          <div class="d-flex justify-content-{{ $isBooked ? 'between' : 'end' }}">
            @if ($isBooked)
              <div>
                <small class="text-danger">Sudah ada yang memesan mobil ini ;_;.</small>
              </div>
            @endif
            <div class="d-flex justify-flex-end">
              <button onclick="history.back()" class="btn btn-info btn-sm me-1 text-light">Kembali</button>
              <a href="{{ $isBooked ? '#!' : './'.$mobil->id.'/pesan' }}" class="btn btn-danger btn-sm">Pesan</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection