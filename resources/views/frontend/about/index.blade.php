@section('seo')
    @include('frontend.seo', [
        'name' => $about_us->seo_title ?? '',
        'title' => $about_us->seo_title ?? $about_us->title,
        'description' => $about_us->meta_description ?? '',
        'keyword' => $about_us->meta_keywords ?? '',
        'schema' => $about_us->seo_schema ?? '',
        'created_at' => $about_us->created_at,
        'updated_at' => $about_us->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    @if ($about_us)
        <div class="hero-banner2 position-relative ">
            <div class="row g-0 text-bannner-section">
                <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                    <div class="text-center page-banner-lft px-4">
                        <h1 class="text-white font-weight-bold">{{ $about_us->title ?? 'About Us' }}</h1>
                        <p class="breadcrumb-text text-white">
                            <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                            <a href="#" class="text-white text-decoration-none">{{ $about_us->title ?? 'About Us' }}</a>

                        </p>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-container-banner">
                        <div class="img-wrapper-2">
                            <img src="{{ asset($about_us->banner_image) }}" alt="Creative Design" class="background-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- about us section --}}
    {{-- about us section --}}
    <section class="about-us-section py-5">
        <div class="container">
            <div class="row">
                {{-- Image --}}
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="about-us-img" data-aos="fade-right"  data-aos-duration="3000">
                        <img src="{{ asset($about_us->image_1) }}" alt="{{ $about_us->title }}">
                    </div>
                </div>
                {{-- Content --}}
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="service-content-container" data-aos="fade-left"  data-aos-duration="3000">
                        <h6 class="my-2">{{ $about_us->title ?? 'About us' }}</h6>
                        <h3 class="my-2">{{ $about_us->short_description }}</h3>
                        <p class="text-css-counter">
                            {!! $about_us->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="counter-section">
         {{-- Optional Counters (JSON or Relationship Based) --}}
         <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-3 ">
                    <div class=" p-3 text-center">
                        <div class=" d-flex align-items-center justify-content-center">
                            <img class=" icon-image-about" src={{ $settings['home_counter_scholarship_img'] ? asset($settings['home_counter_scholarship_img']) : asset('frontend/assets/image/icon1.png') }}
                                alt="">
                        </div>
                        <div class="homecard-text-num">
                            <p>{{ $settings['home_counter_scholarship'] ?? '' }}</p>
                        </div>
                        <p class="text-css-counter d-flex align-items-center justify-content-center">
                            {{ $settings['home_counter_scholarship_title'] ?? '' }}
                        </p>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class=" p-3 text-center">
                        <div class=" d-flex align-items-center justify-content-center">
                            <img class=" icon-image-about" src={{ $settings['home_counter_students_img'] ? asset($settings['home_counter_students_img']) : asset('frontend/assets/image/icon1.png') }}
                                alt="">
                        </div>
                        <div class="homecard-text-num">
                            <p>{{ $settings['home_counter_students'] ?? '' }}</p>
                        </div>
                        <p class="text-css-counter d-flex align-items-center justify-content-center">
                            {{ $settings['home_counter_students_title'] ?? '' }}
                        </p>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class=" p-3 text-center">
                        <div class=" d-flex align-items-center justify-content-center">
                            <img class=" icon-image-about" src={{ $settings['home_counter_enrolled_img'] ? asset($settings['home_counter_enrolled_img']) : asset('frontend/assets/image/icon1.png') }}
                                alt="">
                        </div>
                        <div class="homecard-text-num">
                            <p>{{ $settings['home_counter_enrolled'] ?? '' }} </p>
                        </div>
                        <p class="text-css-counter d-flex align-items-center justify-content-center">
                            {{ $settings['home_counter_enrolled_title'] ?? '' }}
                        </p>
                    </div>
                </div>
            </div>
         </div>
    </section>
    {{-- why choose us section --}}
    <section class="about-us-section page-bg-color py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="service-content-container" data-aos="fade-right"  data-aos-duration="3000">
                        <h6 class="my-2">{{ $why_us->title ?? 'About us' }}</h6>
                        <h3 class="my-2"> {{ $why_us->short_description ?? 'About us' }}</h3>
                      <div class="custom-list">
                        {!! $why_us->description !!}</div> 
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-us-img" data-aos="fade-left"  data-aos-duration="3000">
                        <img src="{{ asset($why_us->image_1) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- our team section --}}
    <section class="team-section py-5">
        <div class="service-content-container text-center">
            <h6 class="my-2">Our Teams</h6>
            <h3 class="my-2"> Helpful offers you confidently pursue
                your dreams </h3>
        </div>
        <div class="container py-3">
            <div class="row">
                @foreach ($teams as $team)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="3000">
                        <div class="team-card">
                            <div class="team-img-container shadow rounded">
                                <img src="{{ asset($team->image) }}" alt="{{ $team->name }}">
                            </div>
                            <div class="team-content-container">
                                <h4>{{ $team->name }}</h4>
                                <p>{{ $team->position }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- <div class="container py-3">
        <div class="row">
            @foreach ($studentreviw as $studentreviw)
                <div class="col-lg-6  mb-4">
                    <div class="youtube-card ">
                        <div class="youtube-content-container">
                     {!!$studentreviw->description!!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
@endsection
