@section('seo')
    @include('frontend.seo', [
        'name' => $settings['homepage_title'] ?? '',
        'title' => $settings['homepage_seo_title'] ?? '',
        'description' => $settings['home_seo_description'] ?? '',
        'keyword' => $settings['homepage_seo_keywords'] ?? '',
        'created_at' => '2024-04-26T08:09:15+00:00',
        'updated_at' => '2024-04-26T10:54:05+00:00',
    ])
@endsection
@extends('layouts.frontend.master')

@section('content')
             {{-- Banner Section --}}
    <div class="hero-banner2 position-relative">
        <div class="row g-0 text-bannner-section">
            <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                <div class="text-center page-banner-lft px-4">
                    <h1 class="text-white font-weight-bold">{{ $album->name }}</h1>
                    <p class="breadcrumb-text text-white">
                        <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                        <span class="text-white">{{ $album->name }}</span>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img-container-banner">
                    <div class="img-wrapper-2">
                        <img src="{{ asset($album->image) }}" alt="{{ $album->name }}" class="background-img">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Gallery Images --}}
    <div class="container py-4">
        <div class="row g-3">
            @forelse ($album->galleries as $gallery)
                <div class="col-md-4 col-sm-6 mb-4">
                    <a data-fancybox="{{ $album->slug }}" 
                       data-caption="{{ $gallery->name }}" 
                       href="{{ asset($gallery->image) }}">
                        <img src="{{ asset($gallery->image) }}" 
                             alt="{{ $gallery->name }}" 
                             class="img-fluid rounded shadow-sm" 
                             style="object-fit: cover; height: 250px; width: 100%;">
                    </a>
                </div>
            @empty
                <p class="text-center">No images available in this album.</p>
            @endforelse
        </div>
    </div>
@endsection