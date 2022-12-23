@extends('layouts.admin')

@section('title')
    Dashboard | Tambah Wisata
@endsection

@section('welcome-text')
    Manajemen Data Wisata
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Wisata</h4>
                <form class="forms-sample" action="{{ route('data-wisata.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Wisata</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama Wisata" value="{{ old('nama') }}" required>
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jam_buka">Jam Buka</label>
                                <input type="text" name="jam_buka" class="form-control @error('jam_buka') is-invalid @enderror" id="jam_buka" placeholder="Masukkan Jam Buka" value="{{ old('jam_buka') }}" autocomplete="off">
                                @error('jam_buka')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jam_tutup">Jam Tutup</label>
                                <input type="text" name="jam_tutup" class="form-control @error('jam_tutup') is-invalid @enderror" id="jam_tutup" placeholder="Masukkan Jam Tutup" value="{{ old('jam_tutup') }}" autocomplete="off">
                                @error('jam_tutup')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="harga_tiket">Harga Tiket</label>
                                <input type="number" name="harga_tiket" class="form-control @error('harga_tiket') is-invalid @enderror" id="harga_tiket" placeholder="Masukkan Harga Tiket" value="{{ old('harga_tiket') }}">
                                @error('harga_tiket')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hari_awal">Hari Awal</label>
                                <select name="hari_awal" id="hari_awal" class="form-control">
                                    <option value="Senin" @if(old('hari_awal') == 'Senin') selected @endif>Senin</option>
                                    <option value="Selasa"@if(old('hari_awal') == 'Selasa') selected @endif>Selasa</option>
                                    <option value="Rabu"@if(old('hari_awal') == 'Rabu') selected @endif>Rabu</option>
                                    <option value="Kamis"@if(old('hari_awal') == 'Kamis') selected @endif>Kamis</option>
                                    <option value="Jumat"@if(old('hari_awal') == "Jumat") selected @endif>Jum'at</option>
                                    <option value="Sabtu"@if(old('hari_awal') == 'Sabtu') selected @endif>Sabtu</option>
                                    <option value="Minggu"@if(old('hari_awal') == 'Minggu') selected @endif>Minggu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hari_akhir">Hari Tutup</label>
                                <select name="hari_akhir" id="hari_akhir" class="form-control">
                                    <option value="Senin"@if(old('hari_akhir') == 'Senin') selected @endif>Senin</option>
                                    <option value="Selasa"@if(old('hari_akhir') == 'Selasa') selected @endif>Selasa</option>
                                    <option value="Rabu"@if(old('hari_akhir') == 'Rabu') selected @endif>Rabu</option>
                                    <option value="Kamis"@if(old('hari_akhir') == 'Kamis') selected @endif>Kamis</option>
                                    <option value="Jumat"@if(old('hari_akhir') == "Jumat") selected @endif>Jum'at</option>
                                    <option value="Sabtu"@if(old('hari_akhir') == 'Sabtu') selected @endif>Sabtu</option>
                                    <option value="Minggu"@if(old('hari_akhir') == 'Minggu') selected @endif>Minggu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Wisata</label>
                        <textarea class="ckeditor" name="deskripsi" id="deskripsi" placeholder="Ketikkan teks disini..." cols="30" rows="10">{{ old('isi') }}</textarea>
                        @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="link_youtube">Link Youtube</label>
                        <input type="text" name="link_youtube" class="form-control @error('link_youtube') is-invalid @enderror" id="link_youtube" placeholder="Masukkan Link Youtube" value="{{ old('link_youtube') }}">
                        @error('link_youtube')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lokasi_url">Lokasi URL</label>
                        <a href="https://www.google.co.id/maps/@-3.8240256,102.3049728,13z" class="btn btn-primary btn-sm" target="_blank">Klik Tombol ini untuk Generate Lokasi</a>
                        <input type="text" name="lokasi_url" class="form-control mt-2 @error('lokasi_url') is-invalid @enderror" id="lokasi_url" placeholder="Masukkan Lokasi URL" value="{{ old('lokasi_url') }}" required>
                        @error('lokasi_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Wisata</label>
                        <input type="file" name="foto[]" class="form-control @error('foto') is-invalid @enderror" id="foto" placeholder="Masukkan Foto Wisata" value="{{ old('foto') }}" multiple required onchange="preview_image();">
                        @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div id="image_preview" class="mt-3"></div>
                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                    <button type="reset" class="btn btn-light">Reset Input</button>
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
        function preview_image() {
            var total_file=document.getElementById("foto").files.length;
            $('#image_preview').html("");
            for(var i=0;i<total_file;i++) {
                $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' width='300' style='border-radius: 10px; margin-right: 10px;' class='mb-3'><br>");
            }
        }
    </script>

    <script>
        CKEDITOR.replace('deskripsi', {
                height: 400,
                filebrowserUploadMethod: 'form'
            });
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
