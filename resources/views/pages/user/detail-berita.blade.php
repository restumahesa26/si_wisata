@extends('layouts.home')

@section('title')
    SIWISLU | Berita
@endsection

@section('content')

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ url('frontend/images/blog_background.jpg') }}"></div>
		<div class="home_content">
			<div class="home_title">Berita</div>
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
									<h1 class="hotel_title">{{ $berita->judul }}</h1>
                                    <div class="hotel_location">by Admin pada {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('l, d F Y') }}</div>
								</div>
							</div>

							<!-- Listing Image -->

							<div class="hotel_image">
								<img src="{{ url('storage/images/berita-thumbnail/' . $berita->thumbnail) }}" alt="{{ $berita->slug }}" style="border-radius: 10px;">
                                <div class="hotel_review_container d-flex flex-column align-items-center justify-content-center">
									<div class="hotel_review">
										<div class="hotel_review_content">
											<div class="hotel_review_title">Telah dilihat</div>
											<div class="hotel_review_subtitle">SEBANYAK</div>
										</div>
										<div class="hotel_review_rating text-center">{{ $berita->countView($berita->id) }}</div>
									</div>
								</div>
							</div>

							<!-- Hotel Info Text -->

							<div class="hotel_info_text">
								<p>{!! $berita->isi !!}</p>
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
