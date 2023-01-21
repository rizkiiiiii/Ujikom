@extends('layouts.main')

@section('content')
  <div class="row mt-5 pt-5">
    <div class="col pt-5">
      <div class="card p-3">
        <h4>Isi Detail Pesanan</h4>
        <span class="d-block bg-danger rounded" style="height: 2px; width: 225px;margin-top: -11px;"></span>
        <div class="card-body">
          <form action="/pesan" method="POST">
            @csrf
            <input type="hidden" name="id_mobil" value="{{ $mobil->id }}">
            <div class="mb-3">
              <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') ? old('nama_lengkap') : auth()->user()->nama }}" autofocus class="form-control @error('nama_lengkap') is-invalid @enderror" required>
              @error('nama_lengkap')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="no_hp" class="form-label">Nomor Handphone</label>
              <input type="number" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" class="form-control @error('no_hp') is-invalid @enderror" required placeholder="Masukkan nomor handphone">
              @error('no_hp')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="nama_lengkap" class="form-label">Alamat Lengkap</label>
              <textarea name="alamat_lengkap" id="alamat_lengkap" rows="3" class="form-control @error('alamat_lengkap') is-invalid @enderror" required placeholder="Masukkan alamat lengkap"></textarea>
              @error('alamat_lengkap')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="mb-3">
              <div>Pesanan untuk</div>
              <div>
                <img src="{{ $mobil->image() }}" alt="{{ $mobil->merek->nama }} {{ $mobil->tipe }} tahun {{ $mobil->tahun_keluar }}" style="width: 225px; height: 125px;" class="img-thumbnail d-block">
                <a href="/">{{ $mobil->merek->nama }} {{ $mobil->tipe }} tahun {{ $mobil->tahun_keluar }}</a>
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="button" onclick="history.back()" class="btn btn-danger btn-sm me-2">Batal</button>
              <button type="submit" class="btn btn-sm btn-primary">Pesan Sekarang</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection