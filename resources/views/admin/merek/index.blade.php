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
          <a href="{{ route('merek.create') }}" class="btn btn-sm btn-primary">
            Tambah Data
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Nama Merek</th>
                  <th class="text-center">Slug</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($mereks as $index => $merek)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $merek->nama }}</td>
                    <td>{{ $merek->slug }}</td>
                    <td>
                      <a href="{{ route('merek.edit', $merek->id) }}"
                        class="btn btn-sm btn-success">
                        Edit
                      </a>
                      <a href="{{ route('merek.show', $merek->id) }}"
                        class="btn btn-sm btn-warning mx-1">
                        Detail
                      </a>
                      <form action="{{ route('merek.destroy', $merek->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
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

