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
        <div class="card-header justify-content-start">
          Daftar {{ $title }}
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Pemesan</th>
                  <th class="text-center">Tanggal</th>
                  <th class="text-center">Status Pesanan</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pesanans as $index => $pesanan)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pesanan->pemesan->nama_lengkap }}</td>
                    <td>{{ $pesanan->tanggal_pesan }}</td>
                    <td class="
                      {{ $pesanan->status_pesanan == 'tertunda' ? 'text-dark' : '' }}
                      {{ $pesanan->status_pesanan == 'diproses' ? 'text-info' : '' }}
                      {{ $pesanan->status_pesanan == 'sukses' ? 'text-success' : '' }}
                      {{ $pesanan->status_pesanan == 'gagal' ? 'text-warning' : '' }}
                    "><strong>{{ $pesanan->status_pesanan }}</strong>
                    </td>
                    <td>
                      <a href="{{ route('pemesanan.edit', $pesanan->id) }}"
                        class="btn btn-sm btn-success">
                        Ubah Status
                      </a>
                      <a href="{{ route('pemesanan.show', $pesanan->id) }}"
                        class="btn btn-sm btn-warning mx-1">
                        Detail
                      </a>
                    </td>
                  </tr>
                  <tr>

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