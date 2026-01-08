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
    {{-- @if ($team_page)
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
    @endif --}}
    <section id="contact-hero" class="bg-gradient-to-br from-dental-light to-white h-[400px] flex items-center">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-5xl font-bold text-gray-900 mb-6">{{ $team_page->title ?? 'Contact Us' }}</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ $team_page->short_description ?? 'Contact Us' }}
            </p>
        </div>
    </section>
    <!-- Doctors Section -->
    <section id="doctors" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                {{-- <h3 class="text-4xl font-bold text-gray-900 mb-4">{{ $settings['teams_title'] }}</h3>
                <p class="text-xl text-gray-600">{{ $settings['teams_description'] }}</p> --}}
            </div>
            <div class="grid grid-cols-3 gap-8">
                @foreach ($teams as $item)
                    <div id="doctor-1" class="text-center">
                        <div class="mb-6">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}"
                                class="w-48 h-48 rounded-full mx-auto object-cover shadow-lg">
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $item->title }}</h4>
                        <p class="text-dental-blue font-medium mb-3">{{ $item->position }}</p>
                        <div class="text-gray-600 mb-4">{!! $item->description !!}</div>
                        <div class="flex justify-center space-x-3">
                            <span
                                class="bg-dental-light text-dental-blue px-3 py-1 rounded-full text-sm">{{ $item->email }}</span>
                            <span
                                class="bg-dental-light text-dental-blue px-3 py-1 rounded-full text-sm">{{ $item->whatsapp }}</span>
                        </div>
                    </div>
                @endforeach
                {{-- <div id="doctor-2" class="text-center">
                    <div class="mb-6">
                        <img src="https://storage.googleapis.com/uxpilot-auth.appspot.com/avatars/avatar-3.jpg" alt="Dr. Michael Chen" class="w-48 h-48 rounded-full mx-auto object-cover shadow-lg">
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Dr. Michael Chen</h4>
                    <p class="text-dental-blue font-medium mb-3">Oral Surgeon</p>
                    <p class="text-gray-600 mb-4">Specialist in oral surgery and dental implants. 12+ years of surgical experience with advanced training.</p>
                    <div class="flex justify-center space-x-3">
                        <span class="bg-dental-light text-dental-blue px-3 py-1 rounded-full text-sm">Oral Surgery</span>
                        <span class="bg-dental-light text-dental-blue px-3 py-1 rounded-full text-sm">Implants</span>
                    </div>
                </div>

                <div id="doctor-3" class="text-center">
                    <div class="mb-6">
                        <img src="https://storage.googleapis.com/uxpilot-auth.appspot.com/avatars/avatar-5.jpg" alt="Dr. Emily Rodriguez" class="w-48 h-48 rounded-full mx-auto object-cover shadow-lg">
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Dr. Emily Rodriguez</h4>
                    <p class="text-dental-blue font-medium mb-3">Pediatric Dentist</p>
                    <p class="text-gray-600 mb-4">Specializes in children's dentistry with a gentle approach. Board certified in pediatric dental care.</p>
                    <div class="flex justify-center space-x-3">
                        <span class="bg-dental-light text-dental-blue px-3 py-1 rounded-full text-sm">Pediatric</span>
                        <span class="bg-dental-light text-dental-blue px-3 py-1 rounded-full text-sm">Prevention</span>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
