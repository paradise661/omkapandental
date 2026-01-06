@section('seo')
    @include('frontend.seo', [
        'name' => $blog_page->seo_title ?? '',
        'title' => $blog_page->seo_title ?? $blog_page->title,
        'description' => $blog_page->meta_description ?? '',
        'keyword' => $blog_page->meta_keywords ?? '',
        'schema' => $blog_page->seo_schema ?? '',
        'created_at' => $blog_page->created_at,
        'updated_at' => $blog_page->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
@if ($blog_page)
<div class="hero-banner2 position-relative ">
    <div class="row g-0 text-bannner-section">
        <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
            <div class="text-center page-banner-lft px-4">
                <h1 class="text-white font-weight-bold">{{ $blog_page->title ?? 'About Us' }}</h1>
                <p class="breadcrumb-text text-white">
                    <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                    <a href="#"
                        class="text-white text-decoration-none">{{ $blog_page->title ?? 'About Us' }}</a>
                </p>
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="img-container-banner">
                <div class="img-wrapper-2">
                    <img src="{{ asset($blog_page->banner_image) }}" alt="Creative Design"
                        class="background-img">
                </div>
            </div>
        </div>
    </div>
</div>
@endif
    <section class="blog-section py-5 page-bg-color">
        <div class="container">
            <div class="row">
                @foreach ($blog as $blog)
                    <div class="col-lg-4 col-md-6 position-relative" data-aos="fade-up" data-aos-duration="3000">
                        <div class="shadow blog-card bg-white">
                            <div class="my-3">
                                <div class="blog-media-wrapper">
                                    <img class="study-card-img" src="{{ asset($blog->image) }}"
                                        alt="{{ $blog->title }}">
                                    <div class="blog-icon">
                                        <span class="icons"><i class="ri-heart-line"></i></span>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <div class="d-flex justify-content-between mt-2">
                                        <p class="bodypart-css">
                                            <span><i class="ri-calendar-line offer-icon"></i></span>
                                            {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}
                                        </p>
                                        <p class="book-text"><span><i
                                            class="ri-eye-line offer-icon"></i></span>{{ $blog->views }}</p>
                                    </div>

                                    <div class="subheadings my-1">
                                        <h3 class="line-clamp-2">{{ $blog->title }}</h3>
                                    </div>

                                    <div class="bodypart-css line-clamp-3 mb-2">
                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 150) }}</p>
                                    </div>

                                    <div class="reviw-part d-flex justify-content-start">
                                        <div class="bodypart-css">
                                            <span><i
                                                    class="ri-star-fill rating-blog"></i></span>{{ $blog->rating ?? '5' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="stretched-link" href="{{route('frontend.blogsingle',$blog->slug)}}"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
