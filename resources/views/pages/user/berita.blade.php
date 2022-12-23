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

<!-- Blog -->

<div class="blog">
    <div class="container">
        <div class="row">

            <!-- Blog Content -->

            <div class="col-lg-10">

                <div class="blog_post_container">

                    <!-- Blog Post -->

                    @forelse ($berita as $item)
                    <div class="blog_post">
                        <div class="blog_post_image">
                            <img src="{{ url('storage/images/berita-thumbnail/' . $item->thumbnail) }}" alt="https://unsplash.com/@anniespratt">
                            <div class="blog_post_date d-flex flex-column align-items-center justify-content-center">
                                <div class="blog_post_day">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d') }}</div>
                                <div class="blog_post_month">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('F Y') }}</div>
                            </div>
                        </div>
                        <div class="blog_post_meta">
                            <ul>
                                <li class="blog_post_meta_item"><a href="">by Admin</a></li>
                            </ul>
                        </div>
                        <div class="blog_post_title"><a href="#">{{ $item->judul }}</a></div>
                        <div class="blog_post_text">
                            {!! Str::limit($item->isi, 300) !!}
                        </div>
                        <div class="blog_post_link"><a href="{{ route('detail-berita', $item->slug) }}">read more</a></div>
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
<link rel="stylesheet" type="text/css" href="{{ url('frontend/styles/blog_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('frontend/styles/blog_responsive.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/js/blog_custom.js') }}"></script>
<script src="{{ url('frontend/plugins/colorbox/jquery.colorbox-min.js') }}"></script>
<script src="{{ url('frontend/plugins/parallax-js-master/parallax.min.js') }}"></script>
@endpush
