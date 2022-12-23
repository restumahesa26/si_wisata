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

	<div class="listing">

		<!-- Single Listing -->

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="single_listing">

						<!-- Hotel Info -->

						<div class="hotel_info">

							<!-- Title -->
							<div class="hotel_title_container d-flex flex-lg-row flex-column">
								<div class="hotel_title_content">
									<h1 class="hotel_title">{{ $wisata->nama }}</h1>
                                    <div class="hotel_location">Hari Operasional : {{ $wisata->hari_awal }} - {{ $wisata->hari_akhir }}</div>
                                    <div class="hotel_location">Jam Operasional : @if ($wisata->jam_buka != NULL)
                                        {{ $wisata->format_tanggal($wisata->jam_buka) }} - {{ $wisata->format_tanggal($wisata->jam_tutup) }}
                                    @else
                                    Bebas
                                    @endif</div>
								</div>
                                <div class="hotel_title_button ml-lg-auto text-lg-right">
									<div class="hotel_map_link_container">
										<div class="hotel_map_link">Harga Tiket : @if ($wisata->harga_tiket != NULL)
                                            Rp. {{ $wisata->format_uang($wisata->harga_tiket) }}
                                        @else
                                            Gratis
                                        @endif</div>
									</div>
								</div>
							</div>

							<!-- Listing Image -->

							<div class="hotel_image">
								<img src="{{ url('storage/images/gambar-wisata/' . $wisata->fotoOne->foto) }}" alt="{{ $wisata->slug }}" style="border-radius: 10px;">
                                <div class="hotel_review_container d-flex flex-column align-items-center justify-content-center">
									<div class="hotel_review">
										<div class="hotel_review_content">
											<div class="hotel_review_title">Telah dilihat</div>
											<div class="hotel_review_subtitle">SEBANYAK</div>
										</div>
										<div class="hotel_review_rating text-center">{{ $wisata->countView($wisata->id) }}</div>
									</div>
								</div>
							</div>

							<!-- Hotel Gallery -->

							<div class="hotel_gallery">
								<div class="hotel_slider_container">
									<div class="owl-carousel owl-theme hotel_slider">

										@forelse ($wisata->foto as $foto)
                                        <div class="owl-item">
											<a class="colorbox cboxElement" href="{{ url('storage/images/gambar-wisata/' . $foto->foto) }}">
												<img src="{{ url('storage/images/gambar-wisata/' . $foto->foto) }}" alt="https://unsplash.com/@jbriscoe">
											</a>
										</div>
                                        @empty

                                        @endforelse

									</div>

									<!-- Hotel Slider Nav - Prev -->
									<div class="hotel_slider_nav hotel_slider_prev">
										<svg version="1.1" id="Layer_6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
											<defs>
												<linearGradient id='hotel_grad_prev'>
													<stop offset='0%' stop-color='#fa9e1b'/>
													<stop offset='100%' stop-color='#8d4fff'/>
												</linearGradient>
											</defs>
											<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
											M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
											C22.545,2,26,5.541,26,9.909V23.091z"/>
											<polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219
											11.042,18.219 "/>
										</svg>
									</div>

									<!-- Hotel Slider Nav - Next -->
									<div class="hotel_slider_nav hotel_slider_next">
										<svg version="1.1" id="Layer_7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
											<defs>
												<linearGradient id='hotel_grad_next'>
													<stop offset='0%' stop-color='#fa9e1b'/>
													<stop offset='100%' stop-color='#8d4fff'/>
												</linearGradient>
											</defs>
										<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
										M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
										C22.545,2,26,5.541,26,9.909V23.091z"/>
										<polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554
										17.046,15.554 "/>
										</svg>
									</div>

								</div>
							</div>

							<!-- Hotel Info Text -->

							<div class="hotel_info_text">
								<p>{!! $wisata->deskripsi !!}</p>
							</div>

						</div>

                        <div class="text-center">
                            @if ($wisata->link_youtube != NULL)
                            <div class="location_on_map_title">Video Youtube</div>
                            {!! $wisata->link_youtube !!}
                            @endif

                            <!-- Location on Map -->

                            <div class="location_on_map">
                                <div class="location_on_map_title">location on map</div>

                                <!-- Google Map -->

                                <div class="travelix_map">
                                    <div id="google_map" class="google_map">
                                        <div class="map_container">
                                            <div id="map">{!! $wisata->lokasi_url !!}</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('addon-style')
<link href="{{ url('frontend/plugins/colorbox/colorbox.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ url('frontend/styles/single_listing_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('frontend/styles/single_listing_responsive.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/js/single_listing_custom.js') }}"></script>
<script src="{{ url('frontend/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ url('frontend/plugins/colorbox/jquery.colorbox-min.js') }}"></script>
@endpush
