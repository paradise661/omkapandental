@section('seo')
    @include('frontend.seo', [
        'name' => $service_page->seo_title ?? '',
        'title' => $service_page->seo_title ?? $service_page->title,
        'description' => $service_page->meta_description ?? '',
        'keyword' => $service_page->meta_keywords ?? '',
        'schema' => $service_page->seo_schema ?? '',
        'created_at' => $service_page->created_at,
        'updated_at' => $service_page->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    @if ($service_page)
        <div class="hero-banner2 position-relative ">
            <div class="row g-0 text-bannner-section">
                <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                    <div class="text-center page-banner-lft px-4">
                        <h1 class="text-white font-weight-bold">{{ $servicesingle->title ?? 'About Us' }}</h1>
                        <p class="breadcrumb-text text-white">
                            <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                            <a href="{{ route('frontend.service') }}"
                                class="text-white text-decoration-none">{{ $service_page->title ?? 'About Us' }}</a> /
                            <a href="#"
                                class="text-white text-decoration-none">{{ $servicesingle->title ?? 'About Us' }}</a>
                        </p>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-container-banner">
                        <div class="img-wrapper-2">
                            <img src="{{ asset($service_page->banner_image) }}" alt="Creative Design" class="background-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 py-5">
                    <div class="country-main-section ">
                        <div class="country-img-wrapper">
                            <img src="{{ asset($servicesingle->image_1) }}" class="country-image" alt="">
                        </div>
                        <div class="country-content pt-3">
                            <h2 class="heading-css">{{ $servicesingle->title }}
                            </h2>
                            <div class="text-css mb-3">
                                <p>{!! $servicesingle->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 py-3">
                    <div class="sticky-sidebar" style="position: sticky; top: 85px;">
                        <p class="course-detail-heading">Top Services</p>
                        @foreach ($services as $course)
                            <div class="shadow course-detail-list-card d-flex gap-3 position-relative">
                                <div class="main-img-course-detail-container">
                                    <img src="{{ asset($course->image_1 ?? 'frontend/assets/images/default.jpg') }}"
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
                                <a class="stretched-link" href="{{ route('frontend.servicesingle', $course->slug) }}"></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection    