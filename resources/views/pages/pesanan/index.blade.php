@extends('layouts.main')

@section('content')
  <div class="row mt-5 pt-5">
    <div class="col pt-5">
      <div class="card mx-auto shadow border-0 p-4">
        <h3>{{ $title }}</h3>
        <span class="d-block bg-danger rounded-full" style="height: 2px; width: 275px;margin-top: -10px;"></span>
        @if ($filterPesanan->count() < 1)
          <div class="alert alert-info mt-3">
            <strong>Kamu belum melakukan pesanan apapun</strong>
          </div>
        @else
          <table class="table mt-3 text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Id Pesanan</th>
                <th scope="col">Pesanan Tanggal</th>
                <th scope="col">Status Pesanan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($filterPesanan as $index => $pesanan)
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $pesanan->id }}</td>
                    <td>{{ $pesanan->tanggal_pesan }}</td>
                    <td>{{ $pesanan->status_pesanan }}</td>
                    <td>
                      <a href="/pesanan/{{ $pesanan->id }}" class="btn btn-sm btn-info text-light">
                        Detail
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
        @endif
      </div>
    </div>
  </div>
@endsection