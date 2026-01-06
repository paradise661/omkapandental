@section('seo')
    @include('frontend.seo', [
    'name' => $team_page->seo_title ?? '',
    'title' => $team_page->seo_title ?? $team_page->title,
    'description' => $team_page->meta_description ?? '',
    'keyword' => $team_page->meta_keywords ?? '',
    'schema' => $team_page->seo_schema ?? '',
    'created_at' => $team_page->created_at,
    'updated_at' => $team_page->updated_at,
])
@endsection
@extends('layouts.frontend.master')
@section('content')
    @if ($team_page)
        <div class="hero-banner2 position-relative ">
            <div class="row g-0 text-bannner-section">
                <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                    <div class="text-center page-banner-lft px-4">
                        <h1 class="text-white font-weight-bold">{{ $team_page->title ?? 'About Us' }}</h1>
                        <p class="breadcrumb-text text-white">
                            <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                            <a href="#"
                                class="text-white text-decoration-none">{{ $team_page->title ?? 'About Us' }}</a>
                        </p>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-container-banner">
                        <div class="img-wrapper-2">
                            <img src="{{ asset($team_page->banner_image) }}" alt="Creative Design" class="background-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <section class="team-section py-5">
        <div class="container py-3">
            <div class="row">
                @foreach ($teams as $team)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="3000">
                        <div class="team-card" style="position: relative;">
                            <div class="team-img-container shadow rounded" >
                                <img src="{{ asset($team->image) }}" alt="{{ $team->name }}">
                            </div>
                            <div class="social-icons d-flex gap-4" style="">
                                    @if($team->facebook)
                                            <a href="{{ $team->facebook }}" target="_blank" class="text-decoration-none">
                                            <i class="fab fa-facebook fa-lg media-icon" style=""></i>
                                        </a>
                                      @endif
                                     @if($team->whatsapp)
                                        <a href="https://wa.me/{{ $team->whatsapp }}" target="_blank" class="text-decoration-none">
                                            <i class="fab fa-whatsapp fa-lg media-icon" style=""></i>
                                            </a>
                                    @endif
                                            @if($team->email)
                                                    <a href="mailto:{{ $team->email }}" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-envelope fa-lg media-icon" style=""></i>
                                                    </a>
                                              @endif
                                        </div>
                            <div class="team-content-container">

                                <h4>{{ $team->name }}</h4>
                                <p>{{ $team->position }}</p>
                                {{-- <div class="social-icons d-flex gap-4">
                                    @if($team->facebook)
                                        <a href="{{ $team->facebook }}" target="_blank" class="text-decoration-none">
                                        <i class="fab fa-facebook fa-lg"></i>
                                        </a>
                                    @endif
                                     @if($team->whatsapp)
                                        <a href="https://wa.me/{{ $team->whatsapp }}" target="_blank" class="text-decoration-none">
                                        <i class="fab fa-whatsapp fa-lg"></i>
                                        </a>
                                    @endif
                                    @if($team->email)
                                        <a href="mailto:{{ $team->email }}" target="_blank" class="text-decoration-none">
                                        <i class="fas fa-envelope fa-lg"></i>
                                        </a>
                                    @endif
                                </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
