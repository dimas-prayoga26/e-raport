@extends('layouts.master.main')

@section('content')

    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Kelas</h1>
                </div>

            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Edit Data Kelas
                        </div>
                        <div class="card-body">
                            <form action="{{ route('datakelas.update', ['datakela' => $kelas->id, 'role' => $role]) }}" method="POST">
                                @csrf
                                @method('PUT')

                                @include('pages.datakelas._editform')

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                      <div class="card-header">
                          Edit TTD Wali Kelas
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-border table-hover mt-xs-2">
                                  <tr class="text-center table-secondary">
                                    <td>TTD</td>
                                  </tr>
                                  <tr>
                                    <td class="text-center"><img src="/ttd/{{ $kelas->ttd }}" alt="" style="width: 120px" class=""></td>
                                  </tr>
                              </table>
                          </div>
                          <small class="fs-12"> <i>Ganti TTD kelas</i></small>
                          <form action="{{ route('ttdkelas.update', [request()->role, $kelas->id]) }}" method="POST"
                              enctype="multipart/form-data">
                              @csrf
                              @method('PUT')

                              <input type="hidden" name="old_ttd" id="" value="{{ $kelas->ttd }}"
                                  hidden>

                              <div class="">
                                  <div class="my-2">
                                      <img class="img-preview img-fluid mb-2 col-sm-6 oferflow-y-hidden"
                                          style="max-width: 200px;">
                                  </div>
                                  <div class="input-group mb-3">
                                      <input type="file" accept="image/*"
                                          class="form-control @error('files') is-invalid @enderror" name="files"
                                          id="gambar" onchange="previewImage()">
                                      <button type="submit" class="input-group-text btn-primary"
                                          for="inputGroupFile02">Update</button>
                                      @error('files')
                                          <span class="invalid-feedback mt-1">{{ $message }}</span>
                                      @enderror
                                  </div>
                              </div>

                          </form>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </section>

    <script>
      function previewImage() {
          const image = document.querySelector('#gambar');
          const imgPreview = document.querySelector('.img-preview');

          imgPreview.style.display = 'block';

          const oFReader = new FileReader();
          oFReader.readAsDataURL(gambar.files[0]);


          oFReader.onload = function(oFREvent) {
              imgPreview.src = oFREvent.target.result;
          }
      }
  </script>

@endsection
