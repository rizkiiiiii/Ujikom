@extends('layouts.main')

@section('content')
  <div class="row mt-5 pt-5">
    <div class="col pt-5">
      <h4>{{ $title }}</h4>
      <span class="bg-danger d-block rounded" style="height: 2px;width: 325px;margin-top: -10px;"></span>
    </div>
    <div class="input-group mb-3 w-75 my-3">
      <form action="" method="GET" class="w-100 d-flex" style="position: relative">
        @if (request('merek'))
          <input type="hidden" name="merek" value="{{ request('merek') }}">
        @endif
        <input type="text" name="search" class="form-control w-100" value="{{ request('search') ? request('search') : '' }}">
        <span class="input-group-text btn btn-danger" onclick="this.parentElement.submit()" style="position: absolute; right: 0">Cari</span>
      </form>
      @if (!request('merek'))
        <small><a href="/merek">Atau cari berdasarkan merek</a></small>
      @endif
    </div>
  </div>
  <div class="row mt-2">
    <div class="col d-flex justify-content-start flex-wrap gap-3">
      @if (($mobils->count() < 1) && request('merek'))
        <div class="alert  alert-info" role="alert">
          Mobil dengan merek {{ request('merek') }}, masih kosong ;_;
        </div>
      @elseif (($mobils->count() < 1) && request('search'))
        <div class="alert  alert-info" role="alert">
          Tidak Ditemukan Apapun Untuk Kata Kunci {{ request('search') }} ;_;
        </div>
      @elseif ($mobils->count() < 1)
        <div class="alert  alert-info" role="alert">
          Data mobil masih kosong ;_;
        </div>
      @else
        @foreach ($mobils as $mobil)
          <div class="mobil card rounded shadow-sm border-0 mt-3 me-1" style="width: 24%;min-width: 225px;cursor: pointer;">
            <a href="mobil/{{ $mobil->id }}">
              <img src="{{ asset($mobil->image()) }}" alt="{{ $mobil->merek->nama }} {{ $mobil->tipe }}" class="img-fluid w-100 rounded-top" style="height: 150px;">
              <div class="card-body text-center" style="font-weight: 600;">
                <h5 class="text-secondary">
                  {{ $mobil->merek->nama }} {{ $mobil->tipe }} {{ $mobil->tahun_keluar }}
                </h5>
                <h6 class="text-danger">
                  Rp {{ number_format($mobil->harga, 2, ',', '.') }}
                </h6>
              </div>
            </a>
          </div>
        @endforeach
      @endif
    </div>
  </div>
@endsection
