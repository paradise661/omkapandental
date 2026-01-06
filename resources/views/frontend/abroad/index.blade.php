@section('seo')
    @include('frontend.seo', [
        'name' => $abroad_page->seo_title ?? '',
        'title' => $abroad_page->seo_title ?? $abroad_page->title,
        'description' => $abroad_page->meta_description ?? '',
        'keyword' => $abroad_page->meta_keywords ?? '',
        'schema' => $abroad_page->seo_schema ?? '',
        'created_at' => $abroad_page->created_at,
        'updated_at' => $abroad_page->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    @if ($abroad_page)
        <div class="hero-banner2 position-relative ">
            <div class="row g-0 text-bannner-section">
                <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                    <div class="text-center page-banner-lft px-4">
                        <h1 class="text-white font-weight-bold">{{ $abroad_page->title ?? 'About Us' }}</h1>
                        <p class="breadcrumb-text text-white">
                            <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                            <a href="#"
                                class="text-white text-decoration-none">{{ $abroad_page->title ?? 'About Us' }}</a>
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
    {{--  country section --}}
    <section class="py-5 page-bg-color ">
        <div class="container">
            <div class="row g-3 py-5">
                @foreach ($abroadstudies as $item)
                    <div class="col-md-4" data-aos="fade-up" data-aos-duration="3000">
                        <div class="country-card-container p-3 shadow rounded-lg bg-white position-relative">
                            <div class="country-img">
                                <img src="{{ asset($item->image) }}" alt="">
                                <div class="overlay"></div>
                            </div>
                            <div class="country-flag"><img src="{{ asset($item->image_1) }}" alt=""></div>
                            <div class="py-2">
                                <h3 class="pr-2 blog-heading">{{ $item->title }}</h3>
                                <p class="line-clamp-4">{{ $item->short_description }}</p>
                            </div>
                            <a href="{{ route('frontend.abroadsingle', $item->slug) }}" class="stretched-link"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
@endsection
