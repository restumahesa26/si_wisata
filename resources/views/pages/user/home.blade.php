@extends('layouts.home')

@section('title')
    SIWISLU
@endsection

@section('content')
    <!-- Home -->

	<div class="home">

		<!-- Home Slider -->

		<div class="home_slider_container">

			<div class="owl-carousel owl-theme home_slider">

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<!-- Image by https://unsplash.com/@anikindimitry -->
					<div class="home_slider_background" style="background-image:url({{ url('frontend/images/bg-1.jpg') }})"></div>

					<div class="home_slider_content text-center">
						<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
							<h1>discover</h1>
							<h1>bengkulu</h1>
							<div class="button home_slider_button"><div class="button_bcg"></div><a href="#intro">explore now<span></span><span></span><span></span></a></div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url({{ url('frontend/images/bg-2.jpg') }})"></div>

					<div class="home_slider_content text-center">
						<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
							<h1>discover</h1>
							<h1>bengkulu</h1>
							<div class="button home_slider_button"><div class="button_bcg"></div><a href="#intro">explore now<span></span><span></span><span></span></a></div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url({{ url('frontend/images/bg-3.jpg') }})"></div>

					<div class="home_slider_content text-center">
						<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
							<h1>discover</h1>
							<h1>bengkulu</h1>
							<div class="button home_slider_button"><div class="button_bcg"></div><a href="#intro">explore now<span></span><span></span><span></span></a></div>
						</div>
					</div>
				</div>

                <div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url({{ url('frontend/images/bg-4.jpg') }})"></div>

					<div class="home_slider_content text-center">
						<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
							<h1>discover</h1>
							<h1>bengkulu</h1>
							<div class="button home_slider_button"><div class="button_bcg"></div><a href="#intro">explore now<span></span><span></span><span></span></a></div>
						</div>
					</div>
				</div>
			</div>

			<!-- Home Slider Nav - Prev -->
			<div class="home_slider_nav home_slider_prev">
				<svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
					<defs>
						<linearGradient id='home_grad_prev'>
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

			<!-- Home Slider Nav - Next -->
			<div class="home_slider_nav home_slider_next">
				<svg version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
					<defs>
						<linearGradient id='home_grad_next'>
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

			<!-- Home Slider Dots -->

			<div class="home_slider_dots">
				<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
					<li class="home_slider_custom_dot active"><div></div>01.</li>
					<li class="home_slider_custom_dot"><div></div>02.</li>
					<li class="home_slider_custom_dot"><div></div>03.</li>
					<li class="home_slider_custom_dot"><div></div>04.</li>
					<li class="home_slider_custom_dot"><div></div>05.</li>
				</ul>
			</div>

		</div>

	</div>

	<!-- Intro -->

	<div class="intro" id="intro">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 class="intro_title text-center">Destinasi Wisata Bengkulu</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="intro_text text-center">
						<p>Berikut beberapa destinasi wisata di Bengkulu yang bisa anda kunjungi</p>
					</div>
				</div>
			</div>
			<div class="row intro_items justify-content-center">

				<!-- Intro Item -->

                @forelse ($wisata as $item)
                <div class="col-lg-4 intro_col">
					<div class="intro_item">
						<div class="intro_item_overlay"></div>
						<!-- Image by https://unsplash.com/@dnevozhai -->
                        <div class="intro_item_background" style="background-image:url({{ url('storage/images/gambar-wisata/' . $item->fotoOne->foto) }}); border-radius: 10px;"></div>
						<div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
							<div class="intro_date">@if ($item->jam_buka != NULL)
                                {{ $item->format_tanggal($item->jam_buka) }} - {{ $item->format_tanggal($item->jam_tutup) }} @else
                                Bebas
                                @endif </div>
							<div class="button intro_button"><div class="button_bcg"></div><a href="{{ route('detail-wisata', $item->slug) }}">Detail<span></span><span></span><span></span></a></div>
							<div class="intro_center text-center">
								<h1>{{ $item->nama }}</h1>
								<div class="intro_price">@if ($item->harga_tiket != NULL)
                                    Rp. {{ $item->format_uang($item->harga_tiket) }}
                                @else
                                    Gratis
                                @endif</div>
							</div>
						</div>
					</div>
				</div>
                @empty

                @endforelse

			</div>
		</div>
	</div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-10 text-center offset-lg-1">
                <div class="button intro_button"><div class="button_bcg"></div><a href="{{ route('wisata') }}">Lihat Lebih Banyak<span></span><span></span><span></span></a></div>
            </div>
        </div>
    </div>

	<!-- CTA -->

	<div class="cta">
		<!-- Image by https://unsplash.com/@thanni -->
		<div class="cta_background" style="background-image:url(images/cta.jpg)"></div>

		<div class="container">
			<div class="row">
				<div class="col">

					<!-- CTA Slider -->

					<div class="cta_slider_container">
						<div class="owl-carousel owl-theme cta_slider">

                            @forelse ($review as $item)
                            <div class="owl-item cta_item text-center">
								<div class="cta_title">{{ $item->wisata }}</div>
								<div class="rating_r rating_r_5">
									<i></i>
									<i></i>
									<i></i>
									<i></i>
									<i></i>
								</div>
								<p class="cta_text">{{ $item->review }}</p>
                                <p class="cta_text">dari {{ $item->nama }}</p>
								<div class="button cta_button"><div class="button_bcg"></div><a href="{{ route('wisata') }}">Lihat Wisata<span></span><span></span><span></span></a></div>
							</div>
                            @empty

                            @endforelse
						</div>

						<!-- CTA Slider Nav - Prev -->
						<div class="cta_slider_nav cta_slider_prev">
							<svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
								<defs>
									<linearGradient id='cta_grad_prev'>
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

						<!-- CTA Slider Nav - Next -->
						<div class="cta_slider_nav cta_slider_next">
							<svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
								<defs>
									<linearGradient id='cta_grad_next'>
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
			</div>
		</div>

	</div>

	<!-- Testimonials -->

	<div class="intro" id="intro">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 class="intro_title text-center">Berita</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="intro_text text-center">
						<p>Berikut beberapa berita terkait wisata bengkulu</p>
					</div>
				</div>
			</div>
			<div class="row intro_items justify-content-center">

				<!-- Intro Item -->

                @forelse ($berita as $item)
                <div class="col-lg-4 intro_col">
					<div class="intro_item">
						<div class="intro_item_overlay"></div>
						<!-- Image by https://unsplash.com/@dnevozhai -->
                        <div class="intro_item_background" style="background-image:url({{ url('storage/images/berita-thumbnail/' . $item->thumbnail) }}); border-radius: 10px;"></div>
						<div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
							<div class="button intro_button"><div class="button_bcg"></div><a href="{{ route('detail-berita', $item->slug) }}">Detail<span></span><span></span><span></span></a></div>
							<div class="intro_center text-center">
								<h1>{{ $item->judul }}</h1>
							</div>
						</div>
					</div>
				</div>
                @empty

                @endforelse

			</div>
		</div>
	</div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-10 text-center offset-lg-1">
                <div class="button intro_button"><div class="button_bcg"></div><a href="{{ route('berita') }}">Lihat Lebih Banyak<span></span><span></span><span></span></a></div>
            </div>
        </div>
    </div>

	<div class="contact">
		<div class="contact_background" style="background-image:url({{ url('frontend/images/bg-1.jpg') }})"></div>
		<div class="container ">
			<div class="row justify-content-center">
				<div class="col-lg-7 mt-4">
					<div class="contact_form_container">
						<div class="contact_title">Berikan review</div>
						<form action="{{ route('kirim-review') }}" id="contact_form" class="contact_form" method="POST">
                            @csrf
							<input type="text" id="contact_form_name" class="contact_form_subject input_field" placeholder="Nama" required="required" data-error="Name is required." name="nama" value="{{ old('nama') }}">
							<input type="text" id="contact_form_subject" class="contact_form_subject input_field" placeholder="Tempat Wisata" required="required" data-error="Subject is required." name="wisata" value="{{ old('wisata') }}">
							<textarea id="contact_form_message" class="text_field contact_form_message" rows="4" placeholder="Review" required="required" data-error="Please, write us a message." name="review">{{ old('review') }}</textarea>
							<button type="submit" id="form_submit_button" class="form_submit_button button">Kirim Review<span></span><span></span><span></span></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('addon-style')
<link rel="stylesheet" type="text/css" href="{{ url('frontend/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('frontend/styles/responsive.css') }}">
<style>
    .test_quote_text p {
        color: #fff !important;
    }
</style>
@endpush

@push('addon-script')
<script src="{{ url('frontend/js/custom.js') }}"></script>
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
@endpush
