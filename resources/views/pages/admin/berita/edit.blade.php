@extends('layouts.admin')

@section('title')
    Dashboard | Ubah Berita
@endsection

@section('welcome-text')
    Manajemen Data Berita
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('data-berita.index') }}" class="btn btn-sm btn-warning mb-3">Kembali</a>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ubah Data Berita</h4>
                <form class="forms-sample" action="{{ route('data-berita.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="judul">Judul Berita</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Masukkan Judul Berita" value="{{ old('judul', $item->judul) }}" required>
                        @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Berita</label>
                        <textarea class="ckeditor" name="isi" id="isi" placeholder="Ketikkan teks disini..." cols="30" rows="10">{{ old('isi', $item->isi) }}</textarea>
                        @error('isi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail Berita</label>
                        <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" placeholder="Masukkan Thumbnail Berita" value="{{ old('thumbnail') }}" onchange="preview_image();">
                        @error('thumbnail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-start" id="image_preview">
                        <img src="{{ url('storage/images/berita-thumbnail/' . $item->thumbnail) }}" alt="" width="300" style="margin-right: 10px; border-radius: 10px;">
                    </div>
                    <button type="submit" class="btn btn-primary me-2 mt-3">Simpan</button>
                    <button type="reset" class="btn btn-light mt-3">Reset Input</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('backend/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    <link href="{{ url('backend/vendors/clock-picker/clockpicker.css') }}" rel="stylesheet">
@endpush

@push('addon-script')
    <script src="{{ url('backend/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ url('backend/js/select2.js') }}"></script>
    <script src="{{ url('backend/vendors/clock-picker/clockpicker.js') }}"></script>
    <script src="{{ url('backend/vendors/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>
    <script>
        $('#jam_buka').clockpicker({
            autoclose: true
        });
        $('#jam_tutup').clockpicker({
            autoclose: true
        });
        $('#jam_buka, #jam_tutup').keypress(function(e) {
            e.preventDefault();
        });
    </script>

    <script>
        CKEDITOR.replace('isi', {
                height: 400,
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
                filebrowserUploadMethod: 'form'
            });
    </script>

    <script>
        function preview_image() {
            var total_file=document.getElementById("thumbnail").files.length;
            $('#image_preview').html("");
            for(var i=0;i<total_file;i++) {
                $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' width='300' style='border-radius: 10px;'><br>");
            }
        }
    </script>

    @if(session()->has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session()->get("error") }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
@endpush
