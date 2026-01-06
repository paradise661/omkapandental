@section('seo')
    @include('frontend.seo', [
        'name' => $abroadstudiesingle->seo_title ?? '',
        'title' => $abroadstudiesingle->seo_title ?? $abroadstudiesingle->title,
        'description' => $abroadstudiesingle->meta_description ?? '',
        'keyword' => $abroadstudiesingle->meta_keywords ?? '',
        'schema' => $abroadstudiesingle->seo_schema ?? '',
        'created_at' => $abroadstudiesingle->created_at,
        'updated_at' => $abroadstudiesingle->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    @if ($abroad_page)
        <div class="hero-banner2 position-relative ">
            <div class="row g-0 text-bannner-section">
                <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                    <div class="text-center page-banner-lft px-4">
                        <h1 class="text-white font-weight-bold">{{ $abroadstudiesingle->title ?? 'About Us' }}</h1>
                        <p class="breadcrumb-text text-white">
                            <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                            <a href="{{ route('frontend.abroad') }}" class="text-white text-decoration-none">{{$abroad_page->title}}</a> /
                            <a href="#"
                                class="text-white text-decoration-none">{{ $abroadstudiesingle->title ?? 'About Us' }}</a>
                        </p>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-container-banner">
                        <div class="img-wrapper-2">
                            <img src="{{ asset($abroad_page->banner_image) }}" alt="Creative Design" class="background-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 py-5" data-aos="fade-right"  data-aos-duration="3000">
                    <div class="country-main-section ">
                        <div class="country-img-wrapper">
                            <img src="{{ asset($abroadstudiesingle->image) }}" class="country-image" alt="">
                        </div>
                        <div class="country-content pt-3">
                            <h2 class="heading-css">{{ $abroadstudiesingle->title }}
                            </h2>
                            <div class="text-css mb-3">
                                <p>{!! $abroadstudiesingle->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 pt-0 pt-lg-5 pb-5" data-aos="fade-left"  data-aos-duration="3000">
                    <div class="sticky-sidebar" style="position: sticky; top: 85px;">
                        {{-- <form class="main-card-sidebar  shadow rounded p-4" action="{{ route('frontend.contact.submit') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <h4 class="form-title py-3 heading-css">
                                Turn your Study Abroad Dream to {{ $abroadstudiesingle->title }}
                            </h4>
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Enter your Name*" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder=" Enter Your Email*" required>
                            </div>
                            <div class="form-group">
                                <input type="phone" name="phone" placeholder=" Enter Your Phone*" required>
                            </div>
                            <div class="form-group">
                                <input type="address" name="city" placeholder=" Enter Your address*" required>
                            </div>
                            <div class="form-group">
                                <textarea name="message" placeholder="Your Message ..." rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit " class="custom-btn btn-8">
                                    Send Message
                                </button>
                            </div>
                        </form> --}}
                        <div class="shadow p-4 rounded text-center side-box">
                            <h4 class="">Ready to take the next step?</h4>
                            <p>Apply now and get started on your journey toward success with our expert-led programs.</p>
                            <a class="d-flex align-items-center justify-content-center py-2"
                                href="{{ route('frontend.register') }}"> <button class="custom-btn btn-8"><span>Apply Now
                                        <i class="ri-arrow-right-up-line"></i></span></button></a>
                        </div>
                        <div class="faq-container shadow rounded text-center p-3 my-3 side-box">
                            <h4 class="FAQs">FAQs</h4>
                            @php $i = 0; @endphp
                            <div class="row">
                                <div class="col-lg-12 d-flex justify-content-center align-items-center">
                                    <div class="accordion" id="accordionExample">
                                        @foreach ($abroadstudiesingle->countryFaqs as $index => $item)
                                            @if ($item->status != 1)
                                                @continue
                                            @endif
                                            @php
                                                
                                                $headingId = 'heading' . $index;
                                                $collapseId = 'collapse' . $index;
                                                $isFirst = $index === 0;

                                            @endphp
                                            <div class="accordion-item accordion-card mb-2">
                                                <h2 class="accordion-header" id="{{ $headingId }}">
                                                    <button class="accordion-button {{ $isFirst ? '' : 'collapsed' }}" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}"
                                                        aria-expanded="{{ $isFirst ? 'true' : 'false' }}"
                                                        aria-controls="{{ $collapseId }}">
                                                        {{ $item->question }}
                                                    </button>
                                                </h2>
                                                <div id="{{ $collapseId }}"
                                                    class="accordion-collapse collapse {{ $isFirst ? 'show' : '' }}"
                                                    aria-labelledby="{{ $headingId }}" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        {!! $item->answer !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Swiper CSS -->
        {{-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> --}}
        @if ($universities->isNotEmpty())
            <section class="country-section pb-5">
                <div class="container">
                    <div class="heading-css text-center mb-4">
                        <h3>Our Partner <span>Universities</span> </h3>
                    </div>
                    <div class="swiper-container swiper-universities">
                        <div class="swiper-wrapper">
                            @foreach ($universities as $university)
                                <div class="swiper-slide">
                                    <div class="university-card mb-3 position-relative">
                                        <div class="card-img-container shadow">
                                            <img src="{{ asset($university->image) }}" alt="{{ $university->name }}"
                                                class="card-img-top">
                                        </div>
                                        <a class="stretched-link" href=""></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper('.swiper-universities', {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true,
                autoplay: {
                    delay: 2100,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                },
            });
        </script>
         @if(session('success'))
         <script>
             document.addEventListener('DOMContentLoaded', function() {
                 Toastify({
                     text: "{{ session('success') }}",
                     duration: 3000,
                     gravity: "top", // top or bottom
                     position: "right", // left, center or right
                     backgroundColor: "#4BB543", // green success color
                     stopOnFocus: true,
                 }).showToast();
             });
         </script>
         @endif
    </section>
@endsection
