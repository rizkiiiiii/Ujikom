@extends('admin.layouts.main')

@section('content')
<div class="row">
  <div class="col">
    @include('admin.partials.flash')
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card mt-4">
        <div class="card-header justify-content-between">
          Daftar {{ $title }}
          <a href="{{ route('mobil.create') }}" class="btn btn-sm btn-primary">
            Tambah Data
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Merek</th>
                  <th class="text-center">Tipe</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($mobils as $index => $mobil)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $mobil->merek->nama }}</td>
                    <td>{{ $mobil->tipe }}</td>
                    <td>
                      <a href="{{ route('mobil.edit', $mobil->id) }}"
                        class="btn btn-sm btn-success">
                        Edit
                      </a>
                      <a href="{{ route('mobil.show', $mobil->id) }}"
                        class="btn btn-sm btn-warning mx-1">
                        Detail
                      </a>
                      <form action="{{ route('mobil.destroy', $mobil->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger"
                          onclick="return confirm('Apakah Anda Yakin?')">Hapus
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection