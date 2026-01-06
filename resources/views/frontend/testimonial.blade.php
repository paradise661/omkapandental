@section('seo')
    @include('frontend.seo', [
        'name' => $testimonial_page->seo_title ?? '',
        'title' => $testimonial_page->seo_title ?? $testimonial_page->title,
        'description' => $testimonial_page->meta_description ?? '',
        'keyword' => $testimonial_page->meta_keywords ?? '',
        'schema' => $testimonial_page->seo_schema ?? '',
        'created_at' => $testimonial_page->created_at,
        'updated_at' => $testimonial_page->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    @if ($testimonial_page)
        <div class="hero-banner2 position-relative ">
            <div class="row g-0 text-bannner-section">
                <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                    <div class="text-center page-banner-lft px-4">
                        <h1 class="text-white font-weight-bold">{{ $testimonial_page->title ?? 'About Us' }}</h1>
                        <p class="breadcrumb-text text-white">
                            <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                            <a href="#"
                                class="text-white text-decoration-none">{{ $testimonial_page->title ?? 'About Us' }}</a>
                        </p>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-container-banner">
                        <div class="img-wrapper-2">
                            <img src="{{ asset($testimonial_page->banner_image) }}" alt="Creative Design"
                                class="background-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row">
            @foreach ($testimonial as $testimonial)
                <div class="col-lg-4" data-aos="fade-up" data-aos-duration="3000">
                    <div class="scholar-main-card bg-white">
                        <div class="p-3 my-4">
                            <div class="swiper-icon center"><i class="ri-double-quotes-l"></i></div>

                            <div class="text-css text-center line-clamp my-2">
                                {!! $testimonial->description !!}
                            </div>

                            <div class="scholar-img-container center mb-2">
                                <img class="scholarship-img" src="{{ asset($testimonial->image) }}"
                                    alt="{{ $testimonial->name }}">
                            </div>

                            <div class="name center">
                                <p>{{ $testimonial->name }}</p>
                            </div>

                            <div class="center">
                                @for ($i = 0; $i < $testimonial->rating; $i++)
                                    <svg class="rating w-5 h-5 text-warning" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 2l2.72 5.792H18l-4.271 4.324 1.013 7.057L10 15.16l-5.742 3.013 1.013-7.057L2 7.792h4.28L10 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
