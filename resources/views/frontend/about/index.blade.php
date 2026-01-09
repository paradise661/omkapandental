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
    {{-- @if ($about_us)
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
    @endif --}}
    {{-- about us section --}}
    <!-- Hero Section -->
    <section id="about-hero" class="bg-gradient-to-br from-dental-light to-white h-[400px] flex items-center">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-5xl font-bold text-gray-900 mb-6">{{ $about_us->title ?? 'About Us' }}</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                 {{ $settings['aboutus_description'] }}
            </p>
        </div>
    </section>
     <!-- Our Story -->
    <section id="our-story" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-center">
                <div>
                    <h3 class="text-4xl font-bold text-gray-900 mb-6">{{ $settings['aboutus_title'] }}</h3>
                    {{-- <p class="text-lg text-gray-600 mb-6">
                        Founded in 2004 by Dr. Sarah Johnson, SmileCare began with a simple mission: to provide comprehensive, compassionate dental care that puts patients first. What started as a small practice has grown into a leading dental clinic serving thousands of families.
                    </p> --}}
                    <p class="text-lg text-gray-600 mb-6">
                        {{ $about_us->short_description }}
                    </p>
                    <div class="flex items-center space-x-6">
                        {{-- <div class="text-center">
                            <div class="text-3xl font-bold text-dental-blue mb-2">{{ $settings['home_counter_students_title'] }}</div>
                            <p class="text-gray-600">{{ $settings['home_counter_students'] }}</p>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-dental-blue mb-2">15,000+</div>
                            <p class="text-gray-600">Patients Treated</p>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-dental-blue mb-2">98%</div>
                            <p class="text-gray-600">Satisfaction Rate</p>
                        </div> --}}
                    </div>
                </div>
                <div class="h-96 overflow-hidden rounded-2xl">
                    <img class="w-full h-full object-cover" src="{{ $about_us->banner_image }}" alt="modern dental clinic exterior building, professional healthcare facility, clean white architecture, blue accents, welcoming entrance" />
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Values -->
    <section id="mission-values" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-6">{{ $mission_page->title }}</h3>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    We are guided by core principles that shape every aspect of our practice and patient care.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-8 mb-16">
                @foreach ($missions as $mission)
                <div id="value-excellence" class="bg-white rounded-xl p-8 text-center shadow-lg">
                    <div class="bg-dental-blue rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        {{-- <i class="fa-solid fa-award text-white text-2xl"></i> --}}
                        <img class="rounded-full object-cover" src="{{ $mission->image }}">
                    </div>
                    <h4 class="text-2xl font-bold text-gray-900 mb-4">{{ $mission->short_description }}</h4>
                    <p class="text-gray-600">
                       {!! $mission->description !!}
                    </p>
                </div>
                @endforeach


                {{-- <div id="value-compassion" class="bg-white rounded-xl p-8 text-center shadow-lg">
                    <div class="bg-dental-blue rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <i class="fa-solid fa-heart text-white text-2xl"></i>
                    </div>
                    <h4 class="text-2xl font-bold text-gray-900 mb-4">Compassion</h4>
                    <p class="text-gray-600">
                        We understand dental anxiety and provide gentle, caring treatment in a comfortable environment that puts patients at ease.
                    </p>
                </div>

                <div id="value-integrity" class="bg-white rounded-xl p-8 text-center shadow-lg">
                    <div class="bg-dental-blue rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <i class="fa-solid fa-handshake text-white text-2xl"></i>
                    </div>
                    <h4 class="text-2xl font-bold text-gray-900 mb-4">Integrity</h4>
                    <p class="text-gray-600">
                        We believe in honest communication, transparent pricing, and always recommending treatments that are in our patients' best interests.
                    </p>
                </div> --}}
            </div>

            <div class="bg-dental-blue rounded-2xl p-12 text-white text-center">
                <h4 class="text-3xl font-bold mb-6">Our Mission</h4>
                <p class="text-xl leading-relaxed max-w-4xl mx-auto">
                    "To provide exceptional dental care that enhances the health, function, and beauty of our patients' smiles while fostering long-lasting relationships built on trust, respect, and personalized attention."
                </p>
            </div>
        </div>
    </section>

    <!-- Facility & Technology -->
    <section id="facility-tech" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-6">State-of-the-Art Facility</h3>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Our modern clinic features the latest dental technology and amenities designed for your comfort and optimal treatment outcomes.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-16 items-center mb-16">
                <div class="h-80 overflow-hidden rounded-2xl">
                    <img class="w-full h-full object-cover" src="{{ $techno->image }}" alt="modern dental treatment room, advanced dental chair, digital monitors, clean white interior, professional medical equipment" />
                </div>
                <div>
                    <h4 class="text-2xl font-bold text-gray-900 mb-6">{{ $techno->title }}</h4>
                    <div class="space-y-4">
                        {!! $techno->description !!}

                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-16 items-center">
                <div>
                    <h4 class="text-2xl font-bold text-gray-900 mb-6">{{ $patient->title }}</h4>
                    <div class="space-y-4">
                                                {!! $patient->description !!}
                        {{-- <div class="flex items-center space-x-4">
                            <div class="bg-dental-light rounded-full p-3">
                                <i class="fa-solid fa-tv text-dental-blue"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold text-gray-900">Ceiling TVs</h5>
                                <p class="text-gray-600">Entertainment during treatment</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-dental-light rounded-full p-3">
                                <i class="fa-solid fa-headphones text-dental-blue"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold text-gray-900">Noise-Canceling Headphones</h5>
                                <p class="text-gray-600">Relaxing music or podcasts</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-dental-light rounded-full p-3">
                                <i class="fa-solid fa-snowflake text-dental-blue"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold text-gray-900">Climate Control</h5>
                                <p class="text-gray-600">Individual room temperature control</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-dental-light rounded-full p-3">
                                <i class="fa-solid fa-coffee text-dental-blue"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold text-gray-900">Refreshment Bar</h5>
                                <p class="text-gray-600">Complimentary beverages</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="h-80 overflow-hidden rounded-2xl">
                    <img class="w-full h-full object-cover" src="{{ $patient->image }}" alt="comfortable dental waiting room, modern furniture, natural lighting, plants, relaxing atmosphere, magazine rack, coffee station" />
                </div>
            </div>
        </div>
    </section>

@endsection
