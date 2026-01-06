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
                <h1 class="text-white font-weight-bold">{{ $service_page->title ?? 'About Us' }}</h1>
                <p class="breadcrumb-text text-white">
                    <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                    <a href="#"
                        class="text-white text-decoration-none">{{ $service_page->title ?? 'About Us' }}</a>

                </p>
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="img-container-banner">
                <div class="img-wrapper-2">
                    <img src="{{ asset($service_page->banner_image) }}" alt="Creative Design"
                        class="background-img">
                </div>
            </div>
        </div>
    </div>
</div>
@endif
    <section class="service-section py-5">
        <div class="container">
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-4 py-2" data-aos="fade-up" data-aos-duration="3000">
                        <div class="service-card">
                            <!-- Floating Arrow Icon -->
                            <div class="arrow-icon">
                                <i class="ri-arrow-right-up-line"></i>
                            </div>
        
                            <!-- Icon -->
                            <div class="service-icon">
                                <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" />
                            </div>
        
                            <!-- Title -->
                            <h3>{{ $service->title }}</h3>
        
                            <!-- Description -->
                            <p>{{ Str::limit($service->short_description, 100) }}</p>
        
                            <a href="{{ route('frontend.servicesingle', $service->slug) }}" class="read-more pt-2">
                                Read More <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
