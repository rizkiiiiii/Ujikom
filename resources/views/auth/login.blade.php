@extends('layouts.main')

@section('content')
  <div class="row mt-5 pt-5">
    <div class="col pt-3">
      <div class="w-75 mx-auto" style="min-width: 325px">
        @include('partials.flash')
      </div>
      <div class="card p-1 border-0 shadow w-75 mx-auto mt-5 border-top">
        <div class="w-100 d-flex justify-content-center align-items-center">
          <div class="w-50">
            <img src="{{ asset('images/car-ilust.jpg') }}" alt="car-ilust" class="container-fluid">
          </div>
          <div class="w-50 pt-5 pb-4" style="min-width: 325px">
            <h4 class="text-center">Login Ke Akunmu</h4>
            <span class="d-flex bg-secondary mx-auto rounded mb-3" style="width: 125px; height: 2px; margin-top: -10px"></span>
            <form action="{{ route('login') }}" method="POST" class="px-3 w-100 mx-auto" style="max-width: 325px;">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" required>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="form-check-label" for="remember">
                    {{ __('Ingat saya') }}
                  </label>
                </div>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-danger btn-sm d-block w-50 mx-auto">Login</button>
              </div>
              <small>Belum punya akun? <a href="/register">Daftar di sini.</a></small>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
