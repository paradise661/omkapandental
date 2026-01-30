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
    {{-- about us section --}}
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-dental-light to-white min-h-[400px] flex items-center" id="about-hero">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6">
                {{ $about_us->title ?? 'About Us' }}
            </h2>
            <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto" style="text-align: justify">
                {{ $settings['aboutus_description'] }}
            </p>
        </div>
    </section>

    <!-- Our Story -->
    <section class="py-20 bg-white" id="our-story">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div data-aos="zoom-in-right">
                    <div>
                        <h3 class="text-4xl font-bold text-gray-900 mb-6">{{ $settings['aboutus_title'] }}</h3>
                        {{-- <p class="text-lg text-gray-600 mb-6">
                            Founded in 2004 by Dr. Sarah Johnson, SmileCare began with a simple mission: to provide comprehensive, compassionate dental care that puts patients first. What started as a small practice has grown into a leading dental clinic serving thousands of families.
                        </p> --}}
                        <p class="text-lg text-justify text-gray-600 mb-6">
                            {{ $about_us->short_description }}
                        </p>
                        <div class="flex items-center space-x-6">

                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in-left">

                    <div class="h-96 overflow-hidden rounded-2xl">
                        <img class="w-full h-full object-cover" src="{{ $about_us->banner_image }}"
                            alt="modern dental clinic exterior building, professional healthcare facility, clean white architecture, blue accents, welcoming entrance" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Values -->
    <section class="py-20 bg-gray-50" id="mission-values">
        <div class="max-w-7xl mx-auto px-6">
            <div data-aos="fade-up" data-aos-duration="800">

                <div class="text-center mb-16">
                    <h3 class="text-4xl font-bold text-gray-900 mb-6">{{ $mission_page->title }}</h3>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        We are guided by core principles that shape every aspect of our practice and patient care.
                    </p>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-duration="1500">


                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">

                    @foreach ($missions as $mission)
                        <div class="bg-white rounded-xl p-8 text-center shadow-lg" id="value-excellence">
                            <div
                                class="bg-dental-blue rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                                {{-- <i class="fa-solid fa-award text-white text-2xl"></i> --}}
                                <img class="rounded-full object-cover" src="{{ $mission->image }}">
                            </div>
                            <h6 class="text-2xl font-bold text-gray-900 mb-4">{{ $mission->title }}</h6>
                            <p class="text-gray-600">
                                {{ $mission->short_description }}
                            </p>
                        </div>
                    @endforeach

                </div>
            </div>

            {{-- <div class="bg-dental-blue rounded-2xl p-12 text-white text-center">
                <h4 class="text-3xl font-bold mb-6">Our Mission</h4>
                <p class="text-xl leading-relaxed max-w-4xl mx-auto">
                    "To provide exceptional dental care that enhances the health, function, and beauty of our patients'
                    smiles while fostering long-lasting relationships built on trust, respect, and personalized attention."
                </p>
            </div> --}}
        </div>
    </section>

    <!-- Facility & Technology -->
    <section class="py-20 bg-white" id="facility-tech">
        <div class="max-w-7xl mx-auto px-6">
            <div data-aos="fade-up" data-aos-duration="800">

                <div class="text-center mb-16">
                    <h3 class="text-4xl font-bold text-gray-900 mb-6">Dental Treatment Process</h3>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Our dental treatment process is designed to be simple, transparent, and comfortable for every patient.
                    </p>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-duration="1500">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-16">

                    <div class="h-80 overflow-hidden rounded-2xl">
                        <img class="w-full h-full object-cover" src="{{ $techno->image ?? '' }}"
                            alt="modern dental treatment room, advanced dental chair, digital monitors, clean white interior, professional medical equipment" />
                    </div>
                    <div>
                        <h4 class="text-2xl font-bold text-gray-900 mb-6">{{ $techno->title ?? '' }}</h4>
                        <div class="space-y-4" style="text-align: justify">
                            {!! $techno->description ?? '' !!}

                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                    <div>
                        <h4 class="text-2xl font-bold text-gray-900 mb-6">{{ $patient->title ?? '' }}</h4>
                        <div class="space-y-4" style="text-align: justify">
                            {!! $patient->description ?? '' !!}

                        </div>
                    </div>
                    <div class="h-64 sm:h-80 lg:h-96 overflow-hidden rounded-2xl">

                        <img class="w-full h-full object-cover" src="{{ $patient->image ?? '' }}"
                            alt="comfortable dental waiting room, modern furniture, natural lighting, plants, relaxing atmosphere, magazine rack, coffee station" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
