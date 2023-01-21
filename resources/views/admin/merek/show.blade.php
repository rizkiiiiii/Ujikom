@extends('admin.layouts.main')

@section('content')
  <div class="row mt-3">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h3 class="mb-1">Data merek {{ $merek->nama }}</h3>
          <span class="d-block rounded bg-secondary" style="height: 2px;"></span>
          <table class="h6 mt-2" cellpadding="10px">
            <tr>
              <td>Nama merek</td>
              <td>:</td>
              <td class="text-dark">{{ $merek->nama }}</td>
            </tr>
            <tr>
              <td class="italic">Slug</td>
              <td>:</td>
              <td class="text-dark">{{ $merek->slug }}</td>
            </tr>
            <tr>
              <td class="italic">Jumlah mobil dengan merek ini</td>
              <td>:</td>
              <td class="text-dark">{{ $merek->mobil->count() }}</td>
            </tr>
          </table>
          <div class="d-flex justify-content-end">
            <a href="{{ route('merek.index') }}" class="btn btn-warning mr-3">Kembali</a>
            <a href="{{ route('merek.edit', $merek->id) }}" class="btn btn-success">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection