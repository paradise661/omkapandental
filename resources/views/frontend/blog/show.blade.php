@section('seo')
    @include('frontend.seo', [
        'name' => $blogsingle->seo_title ?? '',
        'title' => $blogsingle->seo_title ?? $blogsingle->title,
        'description' => $blogsingle->meta_description ?? '',
        'keyword' => $blogsingle->meta_keywords ?? '',
        'schema' => $blogsingle->seo_schema ?? '',
        'created_at' => $blogsingle->created_at,
        'updated_at' => $blogsingle->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    @if ($blog_page)
        <div class="hero-banner2 position-relative ">
            <div class="row g-0 text-bannner-section">
                <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                    <div class="text-center page-banner-lft px-4">
                        <h1 class="text-white font-weight-bold">{{ $blogsingle->title ?? 'About Us' }}</h1>
                        <p class="breadcrumb-text text-white">
                            <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                            <a href="{{ route('frontend.abroad') }}"
                                class="text-white text-decoration-none">{{ $blog_page->title }}</a> /
                            <a href="#"
                                class="text-white text-decoration-none">{{ $blogsingle->title ?? 'About Us' }}</a>
                        </p>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-container-banner">
                        <div class="img-wrapper-2">
                            <img src="{{ asset($blog_page->banner_image) }}" alt="Creative Design" class="background-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8" data-aos="fade-right"  data-aos-duration="3000">
                    <div class="blog-image-wrapper">
                        <img src="{{asset($blogsingle->image)}}" alt="" class="img-fluid">
                    </div>
                    <h2 class="py-3"> {{$blogsingle->title}}</h2>
                    <div class="text-css text-justify">
                       {!!$blogsingle->description!!}
                    </div>
                </div>
                <div class="col-md-4 position-relative" data-aos="fade-left"  data-aos-duration="3000">
                    <div class="blog-sidebar p-4 position-sticky">
                        <p class="blog-heading-text py-3">
                            Recent Posts
                        </p>
                        <div class="d-flex align-items-center mb-3">
                            <!-- Dot -->
                            <div class="dot-blog"></div>
                            <!-- Line -->
                            <div class="line-blog ms-2"></div>
                        </div>
                        @foreach($blogs as $blog)
                            <div class="blog-sidebar-section d-flex gap-3 mb-4 position-relative">
                                <div class="main-img-blog-container">
                                    <img src="{{ asset($blog->image ?? 'frontend/assets/images/default.jpg') }}" alt="{{ $blog->title }}" class="main-img-blog">
                                </div>
                                <div class="blog-sidebar-text">
                                    <div class="date-blog-sidebar mb-2">
                                        {{ $blog->created_at->format('d/m/Y') }}
                                    </div>
                                    <a href="{{ route('frontend.blogsingle', $blog->slug) }}" class="text-decoration-none text-css blog-link-text">
                                        {{ $blog->title }}
                                    </a>
                                </div>
                                <a class="stretched-link" href="{{route('frontend.blogsingle', $blog->slug) }}"></a>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@endsection
