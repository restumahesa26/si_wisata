@extends('layouts.admin')

@section('title')
    Dashboard | Wisata
@endsection

@section('welcome-text')
    Manajemen Data Wisata
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('data-wisata.create') }}" class="btn btn-primary mb-3 btn-rounded">Tambah Data Wisata</a>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Wisata</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Wisata</th>
                                <th>Jam Operasional</th>
                                <th>Harga Tiket</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->format_tanggal($item->jam_buka) }} - {{ $item->format_tanggal($item->jam_tutup) }}</td>
                                <td>Rp. {{ $item->format_uang($item->harga_tiket) }}</td>
                                <td>
                                    <a href="{{ route('data-wisata.print', $item->slug) }}" class="btn btn-sm btn-secondary" target="_blank">Cetak Qr-Code</a>
                                    <a href="{{ route('data-wisata.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('data-wisata.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-hapus">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="5">-- Data Kosong --</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

    @if(session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session()->get("success") }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    <script>
        $('.btn-hapus').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Hapus Data?',
            text: "Data Akan Terhapus Permanen",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }else {
                    //
                }
            });
        });
    </script>
@endpush
