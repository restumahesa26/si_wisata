
	<footer class="footer">
		<div class="container">
			<div class="row">

				<!-- Footer Column -->
				<div class="col-lg-4 footer_column">
					<div class="footer_col">
						<div class="footer_content footer_about">
							<div class="logo_container footer_logo">
								<div class="logo"><a href="#"><img src="{{ url('frontend/images/logo.png') }}" alt="">Siwislu</a></div>
							</div>
							<p class="footer_about_text">Sebuah website tentang destinasi wisata yang ada di Provinsi Bengkulu dengan memanfaatkan fitur QrCode pada tiap tempat wisata.</p>
						</div>
					</div>
				</div>

				<!-- Footer Column -->
				<div class="col-lg-2 footer_column">
				</div>

				<!-- Footer Column -->
				<div class="col-lg-2 footer_column">
				</div>

				<!-- Footer Column -->
				<div class="col-lg-4 footer_column">
					<div class="footer_col">
						<div class="footer_title">contact info</div>
						<div class="footer_content footer_contact">
							<ul class="contact_info_list">
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="{{ url('frontend/images/placeholder.svg') }}" alt=""></div></div>
									<div class="contact_info_text">Provinsi Bengkulu</div>
								</li>
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="{{ url('frontend/images/phone-call.svg') }}" alt=""></div></div>
									<div class="contact_info_text">---</div>
								</li>
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="{{ url('frontend/images/message.svg') }}" alt=""></div></div>
									<div class="contact_info_text">---</div>
								</li>
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="{{ url('frontend/images/planet-earth.svg') }}" alt=""></div></div>
									<div class="contact_info_text"><a href="#">www.siwislu.com</a></div>
								</li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-lg-1 order-2  ">
					<div class="copyright_content d-flex flex-row align-items-center">
						<div>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="fa fa-heart-o text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">PPL UNIB</a></div>
					</div>
				</div>
				<div class="col-lg-9 order-lg-2 order-1">
					<div class="footer_nav_container d-flex flex-row align-items-center justify-content-lg-end">
						<div class="footer_nav">
							<ul class="footer_nav_list">
								<li class="footer_nav_item"><a href="{{ route('home') }}">home</a></li>
								<li class="footer_nav_item"><a href="{{ route('wisata') }}">wisata</a></li>
								<li class="footer_nav_item"><a href="{{ route('berita') }}">berita</a></li>
								@if (Auth::user())
                                <li class="footer_nav_item"><a href="{{ route('dashboard') }}">dashboard</a></li>
                                <li class="footer_nav_item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                            Logout
                                        </a>
                                    </form>
                                </li>
                                @else
                                <li class="footer_nav_item"><a href="{{ route('login') }}">login</a></li>
                                @endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
