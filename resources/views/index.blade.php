@extends('layouts.main')

@section('full-content')
    <div class="main_slider" style="background-image:url({{ asset('images/ilust.jpg') }}); margin-top: 5px">
        <div class="container fill_height">
            <div class="row align-items-center fill_height">
                <div class="col">
                    <div class="main_slider_content">
                        <h6 class="text-white" style="-webkit-text-stroke: 0.1px gray;">Cari Mobil Impianmu Disini!</h6>
                        <h3 class="text-light" style="-webkit-text-stroke: 1px red;">Temukan mobil yang cocok dan sudah lama
                            kamu impikan disini!</h3>
                        <div class="red_button shop_now_button"><a href="#">Lihat Sekarang</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <span class="d-block bg-dark rounded w-75 mx-auto my-5" style="height:2px"></span>
    <div class="row mt-3" style="font-family: 'Quicksand', sans-serif;">
        <div class="col px-3">
            <h3 class="fw-bold">Rekomendasi untukmu</h3>
            <span class="d-block bg-danger rounded" style="height:2px; width: 200px"></span>
            <div class="input-group mb-3 w-75 my-3">
                <form action="/mobil" method="GET" class="w-100 d-flex" style="position: relative">
                    <input type="text" name="search" class="form-control w-100" required>
                    <span class="btn btn-danger" style="position: absolute; right: 0"
                        onclick="this.parentElement.submit()">Cari</span>
                </form>
            </div>
        </div>
    </div>
    <div class="row" style="font-family: 'Quicksand', sans-serif;">
        <div class="col d-flex justify-content-start flex-wrap gap-3">
            @foreach ($mobils as $mobil)
                <div class="mobil card w-25 rounded mt-2 shadow-sm border-0 p-1" style="min-width: 250px;cursor: pointer;">
                    <a href="mobil/{{ $mobil->id }}">
                        <img src="{{ asset($mobil->image()) }}" alt="{{ $mobil->merek->nama }} {{ $mobil->tipe }}"
                            class="img-fluid w-100 rounded-top" style="height: 150px;">
                        <div class="card-body text-center" style="font-weight: 600;">
                            <h5 class="text-secondary fw-bolder">
                                {{ $mobil->merek->nama }} {{ $mobil->tipe }} {{ $mobil->tahun_keluar }}
                            </h5>
                            <h6 class="text-danger fw-bolder">
                                Rp {{ number_format($mobil->harga, 2, ',', '.') }}
                            </h6>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <h5 class="py-3">
                <a href="/mobil">Lihat lainnya →</a>
            </h5>
        </div>
    </div>
@endsection
