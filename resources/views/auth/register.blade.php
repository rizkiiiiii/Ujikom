@extends('layouts.main');

@section('content')
    <div class="row mt-5 pt-5">
        <div class="pt-5 col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card border-0 shadow rounded px-3 border-top py-4">
                <h4>GCars | Daftar Akun Baru</h4>
                <span class="bg-danger d-block rounded" style="height: 2px;width: 325px;margin-top: -10px;"></span>
                <div class="card-body mt-2">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Nama</label>
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" autofocus required value="{{ old('nama') }}">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" required value="{{ old('usernam') }}">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="text-danger" id="usernameInvalidMessage" role="alert">
                                <small></small>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="text-danger" id="passwordInvalidMessage" role="alert">
                                <small></small>
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="text-danger" id="confirmPasswordInvalidMessage" role="alert">
                                <small></small>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-between align-items-center">
                            <small>Sudah punya akun ? Login <a href="{{ route('login') }}">di sini</a>.</small>
                            <button type="submit" class="btn btn-danger btn-sm">
                                Daftar
                            </button>
                        </div>
                    </form>   
                </div>             
            </div>
        </div>
    </div>
    <script src="{{ asset('my-assets/js/registrationvalidator.js') }}"></script>
@endsection