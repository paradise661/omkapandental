@section('seo')
    @include('frontend.seo', [
        'name' => $coursesingle->seo_title ?? '',
        'title' => $coursesingle->seo_title ?? $coursesingle->title,
        'description' => $coursesingle->meta_description ?? '',
        'keyword' => $coursesingle->meta_keywords ?? '',
        'schema' => $coursesingle->seo_schema ?? '',
        'created_at' => $coursesingle->created_at,
        'updated_at' => $coursesingle->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    @if ($course_page)
        <div class="hero-banner2 position-relative ">
            <div class="row g-0 text-bannner-section">
                <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                    <div class="text-center page-banner-lft px-4">
                        <h1 class="text-white font-weight-bold">{{ $coursesingle->title ?? 'About Us' }}</h1>
                        <p class="breadcrumb-text text-white">
                            <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                            <a href="{{ route('frontend.course') }}"
                                class="text-white text-decoration-none">{{ $course_page->title ?? 'About Us' }}</a> /
                            <a href="#"
                                class="text-white text-decoration-none">{{ $coursesingle->title ?? 'About Us' }}</a>
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
    <section class="bg-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8" data-aos="fade-right"  data-aos-duration="3000">
                    <div class="img-wrapper position-relative">
                        <img src="{{ asset($coursesingle->image) }}" alt="" class="img-fluid main-img">
                    </div>
                    <h2 class="py-3 heading-css">{!! $coursesingle->title !!}</h2>
                    <div class="demotext text-css">
                        {!! $coursesingle->description !!}
                    </div>
                </div>
                <div class="col-lg-4 py-3" data-aos="fade-left"  data-aos-duration="3000">
                    <div class="sticky-sidebar" style="position: sticky; top: 85px;">
                        <p class="course-detail-heading">Top Courses</p>
                        @foreach ($courses as $course)
                            <div class="shadow course-detail-list-card d-flex gap-3 position-relative">
                                <div class="main-img-course-detail-container">
                                    <img src="{{ asset($course->image ?? 'frontend/assets/images/default.jpg') }}"
                                        alt="{{ $course->title }}" class="main-img-course-detail">
                                </div>
                                <div class="course-detail-card-text">
                                    <div class="fotter-headings">
                                        {!! $course->title !!}
                                    </div>
                                    <div class="line-clamp-2 text-css">
                                        {{ $course->short_description }}
                                    </div>
                                </div>
                                <a class="stretched-link" href="{{ route('frontend.coursesingle', $course->slug) }}"></a>
                            </div>
                        @endforeach
                        <div class="shadow p-4 rounded text-center side-box">
                            <h4 class="">Ready to take the next step?</h4>
                            <p>Apply now and get started on your journey toward success with our expert-led programs.</p>
                            <a class="d-flex align-items-center justify-content-center py-2"
                                href="{{ route('frontend.register') }}"> <button class="custom-btn btn-8"><span>Apply Now
                                        <i class="ri-arrow-right-up-line"></i></span></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
