@extends('layouts.main')

@section('content')
  <div class="row mt-5 pt-5">
    <div class="col pt-5">
      <div class="card shadow border-top pb-4 pt-5 px-5 w-100 mx-auto" style="max-width: 750px;">
        <div class="mb-4">
          @if ($user->role->nama === 'admin')
            <h3>Profil Admin</h3>  
          @else
            <h3>{{ $subtitle }}</h3>
          @endif
          <span class="d-block bg-danger rounded-full" style="height: 2px; width: 175px;margin-top: -10px;"></span>
        </div>
        <div class="d-flex justify-content-between">
          <div>
            <div class="mb-2">
              <p class="text-dark">Nama</p>
              <p style="margin-top: -18px;">{{ $user->nama }}</p>
            </div>
            <div class="mb-2 border-top">
              <p class="text-dark">Username</p>
              <p style="margin-top: -18px;">{{ $user->username }}</p>
            </div>
            @if ($user->role->nama === 'admin')
              <div class="mb-4 border-top">
                <p class="text-dark"><i class="fa fa-star"></i> GCars Staff</p>
                <p class="border text-info border-info rounded text-center" style="margin-top: -18px;">
                  Admin
                </p>
              </div>
            @endif
          </div>
          <div>
            <p class="text-dark">Foto Profil</p>
            <div style="width: 125px; height: 125px;margin-top: -15px;">
              <img src="{{ $user->image() }}" alt="{{ $user->username }}" class="img-fluid img-thumbnail shadow">
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-end pt-4">
          @if ((auth()->user()->id === $user->id) && (auth()->user()->role->nama !== 'admin')) 
            <button class="btn btn-danger btn-sm me-1" id="logout-btn"><i class="fa fa-sign-out"></i> Logout</button>
            <a href="/edit-profile" class="btn btn-info btn-sm me-1 text-white"><i class="fa fa-pencil"></i> Edit Profil</a>
          @endif
          <a href="{{ auth()->user()->role->nama === 'admin' ? '/admin' : '/' }}" class="btn btn-success btn-sm">Kembali</a>
        </div>
      </div>
    </div>
  </div>

  <form action="{{ route('logout') }}" method="POST" id="logout-form" hidden>
    @csrf
  </form>

  <script>
    document.getElementById('logout-btn').addEventListener('click', () => {
      document.getElementById('logout-form').submit();
    });
  </script>
@endsection