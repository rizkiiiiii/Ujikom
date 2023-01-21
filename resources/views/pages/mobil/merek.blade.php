@extends('layouts.main')

@section('content')
  <div class="row mt-5 pt-5">
    <div class="col pt-5">
      <h3>{{ $title }}</h3>
      <span class="bg-danger d-block rounded" style="height: 2px;width: 325px;margin-top: -10px;"></span>      
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="d-flex justify-content-start flex-wrap">
        @foreach ($mereks as $merek)
          <div class="py-3 px-4 rounded shadow-sm mt-4 border me-3">
            <a href="/mobil?merek={{ $merek->slug }}">{{ $merek->nama }}</a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection