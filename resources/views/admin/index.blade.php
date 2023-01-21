@extends('admin.layouts.main')

@section('content')
<div class="row mb-3">
  <div class="col">
    <h5>Selamat Datang Kembali Admin <span class="text-dark">{{ auth()->user()->nama }}</span></h5>
  </div>
</div>
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="fas fa-tag"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Data Merek</h4>
        </div>
        <div class="card-body">
          {{  $jumlahMerek  }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-car"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Data Mobil</h4>
        </div>
        <div class="card-body">
          {{ $jumlahMobil }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="fas fa-money-check-alt"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Pemesanan</h4>
        </div>
        <div class="card-body">
          {{ $jumlahPesanan }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="far fa-user"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Pengguna</h4>
        </div>
        <div class="card-body">
          {{ $jumlahPengguna }}
        </div>
      </div>
    </div>
  </div>                  
</div>
@endsection