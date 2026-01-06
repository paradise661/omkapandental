@section('seo')
    @include('frontend.seo', [
        'name' => $course_page->seo_title ?? '',
        'title' => $course_page->seo_title ?? $course_page->title,
        'description' => $course_page->meta_description ?? '',
        'keyword' => $course_page->meta_keywords ?? '',
        'schema' => $course_page->seo_schema ?? '',
        'created_at' => $course_page->created_at,
        'updated_at' => $course_page->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    @if ($course_page)
        <div class="hero-banner2 position-relative ">
            <div class="row g-0 text-bannner-section">
                <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                    <div class="text-center page-banner-lft px-4">
                        <h1 class="text-white font-weight-bold">{{ $course_page->title ?? 'About Us' }}</h1>
                        <p class="breadcrumb-text text-white">
                            <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                            <a href="#"
                                class="text-white text-decoration-none">{{ $course_page->title ?? 'About Us' }}</a>

                        </p>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-container-banner">
                        <div class="img-wrapper-2">
                            <img src="{{ asset($course_page->banner_image) }}" alt="Creative Design" class="background-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- course section --}}
    <div class="container">
        <div class="row py-5">
            @foreach ($course as $index => $course)
                @php
                    $isOdd = $index % 2 == 0; // 0-based index: 0 = 1st = odd position visually
                @endphp

                @if ($isOdd)
                    {{-- Odd position: Image Left, Content Right --}}
                    <div class="col-lg-6 py-3" data-aos="fade-up" data-aos-duration="3000">
                        <div class="course-img shadow rounded">
                            <img src="{{ asset($course->image) }}" class="shadow rounded" alt="{{ $course->title }}">
                        </div>
                    </div>
                    <div class="col-lg-6 py-3 d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-duration="3000">
                        <div class="service-content-container">
                            <h5 class="my-2">{{ $course->title }}</h5>
                            <p class="text-css-counter">
                                {{ Str::limit($course->short_description, 300) }}
                            </p>
                            <a class="d-flex align-items-center justify-content-start my-3"
                                href="{{ route('frontend.coursesingle', $course->slug) }}">
                                <button class="custom-btn btn-8">
                                    <span>Read More <i class="ri-arrow-right-up-line"></i></span>
                                </button>
                            </a>
                        </div>
                    </div>
                @else
                    {{-- Even position: Content Left, Image Right --}}
                    <div class="col-lg-6 py-3 d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-duration="3000">
                        <div class="service-content-container">
                            <h5 class="my-2">{{ $course->title }}</h5>
                            <p class="text-css-counter">
                                {{ Str::limit($course->short_description, 300) }}
                            </p>
                            <a class="d-flex align-items-center justify-content-start my-3"
                                href="{{ route('frontend.coursesingle', $course->slug) }}">
                                <button class="custom-btn btn-8">
                                    <span>Read More <i class="ri-arrow-right-up-line"></i></span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 py-3" data-aos="fade-up" data-aos-duration="3000">
                        <div class="course-img shadow rounded">
                            <img src="{{ asset($course->image) }}" class="shadow rounded" alt="{{ $course->title }}">
                        </div>
                    </div>
                @endif
            @endforeach

            <div class="d-flex align-items-center justify-content-center">
                <a class="d-flex align-items-center justify-content-start my-3" href="{{ route('course.index') }}">
                    {{-- <button class="custom-btn btn-8">
                        <span>Explore All <i class="ri-arrow-right-up-line"></i></span>
                    </button> --}}
                </a>
            </div>
        </div>
    </div>
@endsection
