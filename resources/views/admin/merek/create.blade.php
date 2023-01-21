@extends('admin.layouts.main')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card mt-3">
      <div class="card-header">
        <h6 style="color: #585858">
          {{ $title }} Baru
        </h6>
      </div>
      <div class="card-body">
        <form action="{{ route('merek.store') }}" method="post">
          @csrf
          <div class="mb-3">
            <label for="nama" class="form-label">Nama merek</label>
            <input type="text" name="nama" id="nama" class="form-control  @error('nama') is-invalid @enderror" autocomplete="off" placeholder="Masukkan nama merek..." value="{{ old('nama') }}">
            @error('nama')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Slug</label>
            <input type="text" id="slug" disabled class="form-control">
          </div>
          <div class="d-flex justify-content-end px-2">
            <a href="{{ route('merek.index') }}" class="btn btn-danger mr-3" type="submit">Batal</a>
            <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('personalscript')
  <script>
    document.querySelector('#nama').addEventListener('input', function() {
      document.querySelector('#slug').value = this.value.toLowerCase()
      .trim()
      .replace(/[^\w\s-]/g, '')
      .replace(/[\s_-]+/g, '-')
      .replace(/^-+|-+$/g, '');
    });
  </script>
@endsection