@extends('admin.layouts.main')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card mt-3">
      <div class="card-header">
        <h6 style="color: #585858">
          Ubah status pesanan
        </h6>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <table cellpadding="10px">
            <tr>
              <td>Id pesanan</td>
              <td>:</td>
              <td class="text-dark" >{{ $pesanan->id }}</td>
            </tr>
            <tr>
              <td>Pemesan</td>
              <td>:</td>
              <td class="text-dark" >{{ $pesanan->pemesan->nama_lengkap }}</td>
            </tr>
            <tr>
              <td>Pesanan Tanggal</td>
              <td>:</td>
              <td class="text-dark" >{{ $pesanan->tanggal_pesan }}</td>
            </tr>
            <tr>
              <td>Status pesanan saat ini</td>
              <td>:</td>
              <td class="text-dark" >{{ $pesanan->status_pesanan }}</td>
            </tr>
          </table>
        </div>
        <div class="d-flex justify-content-end px-2">
          <a href="{{ route('pemesanan.index') }}" class="btn btn-warning mr-2" type="submit">Batal</a>
          @if ($pesanan->status_pesanan !== 'tertunda')
            <form action="{{ route('pemesanan.update', $pesanan->id) }}" method="post" class="mr-2">
              @csrf
              @method('put')
              <input type="hidden" name="status_pesanan" value="tertunda">
              <button class="btn btn-primary" type="submit">Tandai Tertunda</button>
            </form>
          @endif
          @if ($pesanan->status_pesanan !== 'diproses')
            <form action="{{ route('pemesanan.update', $pesanan->id) }}" method="post" class="mr-2">
              @csrf
              @method('put')
              <input type="hidden" name="status_pesanan" value="diproses">
              <button class="btn btn-info" type="submit">Tandai Diproses</button>
            </form>
          @endif
          @if ($pesanan->status_pesanan !== 'berhasil')
            <form action="{{ route('pemesanan.update', $pesanan->id) }}" method="post" class="mr-2">
              @csrf
              @method('put')
              <input type="hidden" name="status_pesanan" value="berhasil">
              <button class="btn btn-success" type="submit">Tandai Berhasil</button>
            </form>
          @endif
          @if ($pesanan->status_pesanan !== 'gagal')
            <form action="{{ route('pemesanan.update', $pesanan->id) }}" method="post" class="mr-2">
              @csrf
              @method('put')
              <input type="hidden" name="status_pesanan" value="gagal">
              <button class="btn btn-danger" type="submit">Tandai Gagal</button>
            </form>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection