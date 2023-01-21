@extends('layouts.main')

@section('content')
  <style>
  .imagePreview {
    width: 100%;
    height: 100%;
    background-position: center center;
    background-color:#fff;
    background-size: cover;
    background-repeat:no-repeat;
    display: inline-block;
    box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
  }

  .btn-primary {
    display:block;
    border-radius:0px;
    box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
    margin-top:-5px;
  }

  .imgUp {
    margin-bottom:15px;
    height: 125px;
    width: 125px;
  }

  .del {
    position:absolute;
    top:0px;
    right:15px;
    width:30px;
    height:30px;
    text-align:center;
    line-height:30px;
    background-color:rgba(255,255,255,0.6);
    cursor:pointer;
  }

  .imgAdd {
    width:30px;
    height:30px;
    border-radius:50%;
    background-color:#4bd7ef;
    color:#fff;
    box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
    text-align:center;
    line-height:30px;
    margin-top:0px;
    cursor:pointer;
    font-size:15px;
  }
  </style>
  <div class="row mt-5 pt-5">
    <div class="col pt-5">
      <div class="w-100 mx-auto" style="max-width: 750px;">
        @include('partials.flash')
      </div>
      <div class="card shadow border-top pb-4 pt-5 px-5 w-100 mx-auto" style="max-width: 750px;">
        <div class="mb-4">
          <h3>{{ $title }}</h3>
          <span class="d-block bg-danger rounded-full" style="height: 2px; width: 175px;margin-top: -10px;"></span>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
          @method('put')
          @csrf
          <div class="d-flex justify-content-between flex-wrap">
            <div class="w-100" style="max-width: 450px;">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') ? old('nama') : auth()->user()->nama}}" required autocomplete="off">
                @error('nama')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') ? old('username') : auth()->user()->username}}" required autocomplete="off">
                @error('username')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="mb-5">
              <p class="text-dark">Foto Profil</p>
              {{-- <div style="width: 125px; height: 125px;margin-top: -15px;">
              </div> --}}
              <div class="imgUp relative">
                <div class="imagePreview"></div>
                <label class="btn btn-primary">
                  Ubah<input type="file" name="foto_profil" class="uploadFile img" value="{{ auth()->user()->image() }}" style="width: 0px;height: 0px;overflow: hidden;">
                </label>
              </div>
              {{-- <i class="fa fa-plus imgAdd"></i>       --}}
            </div>
          </div>
          <div class="d-flex justify-content-end pt-4">
            <button type="button" class="btn btn-success btn-danger me-1 btn-sm" onclick="history.back()">Batal</button>
            <button type="submit" class="btn btn-success btn-success btn-sm">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('optscript')
<script>
  $('.imgUp').find('.imagePreview').css('background-image', 'url({{ auth()->user()->image() }})');

  $(function() {
    $(document).on('change','.uploadFile', function() {
      const uploadFile = $(this);
      const files = !!this.files ? this.files : [];
      if (!files.length || !window.FileReader) return;

      if (/^image/.test( files[0].type)) {
        const reader = new FileReader();
        reader.readAsDataURL(files[0]);

        reader.onloadend = function(){
          uploadFile.closest('.imgUp').find('.imagePreview').css('background-image', `url(${this.result})`);
        }
      }          
    });
  });
</script>
@endsection