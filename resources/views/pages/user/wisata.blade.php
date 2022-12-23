@extends('layouts.home')

@section('title')
    SIWISLU | Wisata
@endsection

@section('content')
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ url('frontend/images/about_background.jpg') }}"></div>
    <div class="home_content">
        <div class="home_title">Wisata Bengkulu</div>
    </div>
</div>

<!-- Offers -->

<div class="offers">

    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <!-- Offers Grid -->

                <div class="offers_grid">

                    <!-- Offers Item -->
                    @forelse ($wisata as $item)
                    <div class="offers_item rating_4">
                        <div class="row">
                            <div class="col-lg-1 temp_col"></div>
                            <div class="col-lg-3 col-1680-4">
                                <div class="offers_image_container">
                                    <!-- Image by https://unsplash.com/@kensuarez -->
                                    <div class="offers_image_background" style="background-image:url({{ url('storage/images/gambar-wisata/' . $item->fotoOne->foto) }}); border-radius: 10px;"></div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="offers_content">
                                    <div class="offers_price">{{ $item->nama }}</div>
                                    <p class="offers_text" style="height: 70px">
                                    Jam Operasional : @if ($item->jam_buka != NULL)
                                    {{ $item->format_tanggal($item->jam_buka) }} - {{ $item->format_tanggal($item->jam_tutup) }}
                                @else
                                Bebas
                                @endif <br>
                                    Harga Tiket : @if ($item->harga_tiket != NULL)
                                    Rp. {{ $item->format_uang($item->harga_tiket) }}
                                @else
                                    Gratis
                                @endif
                                    </p>
                                    <div class="button book_button"><a href="{{ route('detail-wisata', $item->slug) }}">Detail<span></span><span></span><span></span></a></div>
                                    <div class="offer_reviews">
                                        <div class="offer_reviews_content">
                                            <div class="offer_reviews_title">telah dilihat</div>
                                            <div class="offer_reviews_subtitle">SEBANYAK</div>
                                        </div>
                                        <div class="offer_reviews_rating text-center">{{ $item->countView($item->id) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('addon-style')
<link rel="stylesheet" type="text/css" href="{{ url('frontend/styles/offers_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('frontend/styles/offers_responsive.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ url('frontend/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ url('frontend/js/offers_custom.js') }}"></script>
@endpush
