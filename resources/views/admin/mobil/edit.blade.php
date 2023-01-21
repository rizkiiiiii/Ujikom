@extends('admin.layouts.main')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card mt-3">
      <div class="card-header">
        <h6 style="color: #585858">
          Edit data mobil
        </h6>
      </div>
      <div class="card-body">
        <form action="{{ route('mobil.update', $mobil->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="mb-3">
            <label for="id_merek" class="form-label">Merek</label>
            <select name="id_merek" id="id_merek" class="form-control @error('id_merek') is-invalid @enderror" required>
              @foreach ($mereks as $merek)
                <option value="{{ $merek->id }}" {{ $mobil->id_merek === $merek->id ? 'selected' : '' }}>{{ $merek->nama }}</option>
              @endforeach
            </select>
            @error('id_merek')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <input type="text" name="tipe" id="tipe" class="form-control  @error('tipe') is-invalid @enderror" autocomplete="off" value="{{ $mobil->tipe }}">
            @error('tipe')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control  @error('harga') is-invalid @enderror" autocomplete="off" value="{{ $mobil->harga }}">
            @error('harga')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="tahun_keluar" class="form-label">Tahun Keluar</label>
            <select name="tahun_keluar" id="tahun_keluar" class="form-control @error('tahun_keluar') is-invalid @enderror" required>
              @php for($i = 2000;$i <= 2022; $i++) : @endphp
                <option value="{{ $i }}" {{ $mobil->tahun_keluar == $i ? 'selected' : '' }}>{{ $i }}</option>
              @php endfor; @endphp
            </select>
            @error('tahun_keluar')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <div class="w-75 my-1" style="max-height: auto;">
              <img src="{{ $mobil->image() }}" alt="{{ $mobil->merek->nama . $mobil->tipe }}" class="rounded w-100 img-thumbnail" style="max-height: inherit;">
            </div>
            <input type="file" name="gambar" id="gambar" class="form-control  @error('gambar') is-invalid @enderror" accept="img/jpg, image/jpeg, image/png">
            @error('gambar')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input id="deskripsi" name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" type="hidden" name="content" value="{{ $mobil->deskripsi }}">
            <trix-editor input="deskripsi"></trix-editor>
            @error('deskripsi')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="d-flex justify-content-end px-2">
            <a href="{{ route('mobil.index') }}" class="btn btn-danger mr-3" type="submit">Batal</a>
            <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
