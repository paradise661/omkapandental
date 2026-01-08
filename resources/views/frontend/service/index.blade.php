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
    {{-- @if ($service_page)
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
    </div> --}}
    {{-- </div>
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
    </section> --}}

    <!-- Hero Section -->
    <section id="services-hero" class="bg-gradient-to-br from-dental-light to-white h-[400px] flex items-center">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-5xl font-bold text-gray-900 mb-6">{{ $settings['services_title'] }}</h2>
            <div class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ $settings['services_description'] }}
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    <section id="services-overview" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-center mb-20">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ $service_page->title }}</h3>
                    <p class="text-lg text-gray-600 mb-6">
                        {{ $service_page->short_description }}
                    </p>
                    <div class="space-y-4">
                        {!! $service_page->description !!}
                        {{-- <div class="flex items-center space-x-3">
                            <i class="fa-solid fa-check text-dental-blue"></i>
                            <span class="text-gray-700">State-of-the-art equipment and technology</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fa-solid fa-check text-dental-blue"></i>
                            <span class="text-gray-700">Comfortable and relaxing environment</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fa-solid fa-check text-dental-blue"></i>
                            <span class="text-gray-700">Flexible scheduling and payment options</span>
                        </div> --}}
                    </div>
                </div>
                <div class="h-80 overflow-hidden rounded-2xl">
                    <img class="w-full h-full object-cover" src="{{ $service_page->banner_image }}"
                        alt="modern dental clinic interior with multiple treatment rooms, advanced equipment, clean white design, professional lighting" />
                </div>
            </div>
        </div>
    </section>

    <!-- Detailed Services -->
    <section id="detailed-services" class="py-20 bg-gray-50">
        @php
            $service1 = $services->get(0);
            $service2 = $services->get(1);
            $service3 = $services->get(2);
            // $service4 = $services->get(3);
        @endphp
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-4xl font-bold text-gray-900 text-center mb-16">Explore {{ $settings['services_title'] }}</h3>
            @if ($service1)
                <!-- General Dentistry -->
                <div id="general-dentistry" class="mb-20">
                    <div class="grid grid-cols-2 gap-12 items-center">
                        <div>
                            <div class="flex items-center space-x-4 mb-6">
                                 <div class="bg-dental-light rounded-lg w-16 h-16 flex items-center justify-center mb-6">
                            <img src="{{ $service1->image }}">
                        </div>
                                <h4 class="text-3xl font-bold text-gray-900">{{ $service1->title }}</h4>
                            </div>
                            <p class="text-lg text-gray-600 mb-6">
                                {{ $service1->short_description }}
                            </p>
                            <div class="grid grid-cols-2 gap-4">
                                {!! $service1->description !!}
                                {{-- <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h5 class="font-semibold text-gray-900 mb-2">Regular Cleanings</h5>
                                    <p class="text-sm text-gray-600">Professional cleanings every 6 months</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h5 class="font-semibold text-gray-900 mb-2">Dental Exams</h5>
                                    <p class="text-sm text-gray-600">Comprehensive oral health assessments</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h5 class="font-semibold text-gray-900 mb-2">Fillings</h5>
                                    <p class="text-sm text-gray-600">Tooth-colored composite restorations</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h5 class="font-semibold text-gray-900 mb-2">Root Canal Therapy</h5>
                                    <p class="text-sm text-gray-600">Save infected or damaged teeth</p>
                                </div> --}}
                            </div>
                        </div>
                        <div class="h-96 overflow-hidden rounded-2xl">
                            <img class="w-full h-full object-cover" src="{{ $service1->image_1 }}"
                                alt="dentist performing dental cleaning on patient, professional dental hygiene procedure, modern dental office" />
                        </div>
                    </div>
                </div>
            @endif
            <!-- Cosmetic Dentistry -->
            @if ($service2)
                <div id="cosmetic-dentistry" class="mb-20">
                    <div class="grid grid-cols-2 gap-12 items-center">
                        <div class="h-96 overflow-hidden rounded-2xl">
                            <img class="w-full h-full object-cover" src="{{ $service2->image_1 }}"
                                alt="before and after teeth whitening results, bright white smile, cosmetic dentistry transformation" />
                        </div>
                        <div>
                            <div class="flex items-center space-x-4 mb-6">
                                <div class="bg-dental-light rounded-lg w-16 h-16 flex items-center justify-center mb-6">
                            <img src="{{ $service2->image }}">
                        </div>
                                <h4 class="text-3xl font-bold text-gray-900">{{ $service2->title }}</h4>
                            </div>
                            <p class="text-lg text-gray-600 mb-6">
                                {{ $service2->short_description }}
                            </p>
                            <div class="grid grid-cols-2 gap-4">
                                {!! $service2->description !!}

                                {{-- <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h5 class="font-semibold text-gray-900 mb-2">Teeth Whitening</h5>
                                    <p class="text-sm text-gray-600">Professional whitening treatments</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h5 class="font-semibold text-gray-900 mb-2">Porcelain Veneers</h5>
                                    <p class="text-sm text-gray-600">Custom-made thin shells</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h5 class="font-semibold text-gray-900 mb-2">Smile Makeovers</h5>
                                    <p class="text-sm text-gray-600">Complete smile transformations</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h5 class="font-semibold text-gray-900 mb-2">Bonding</h5>
                                    <p class="text-sm text-gray-600">Repair chips and gaps</p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Oral Surgery -->
            @if ($service3)
                <div id="oral-surgery" class="mb-20">
                    <div class="grid grid-cols-2 gap-12 items-center">
                        <div>
                            <div class="flex items-center space-x-4 mb-6">
                               <div class="bg-dental-light rounded-lg w-16 h-16 flex items-center justify-center mb-6">
                            <img src="{{ $service3->image }}">
                        </div>
                                <h4 class="text-3xl font-bold text-gray-900">{{ $service3->title }}</h4>
                            </div>
                            <p class="text-lg text-gray-600 mb-6">
                                {{ $service3->short_description }}

                            </p>
                            <div class="grid grid-cols-2 gap-4">
                                {!! $service3->description !!}

                                {{-- <div class="bg-white p-4 rounded-lg shadow-sm">
                                <h5 class="font-semibold text-gray-900 mb-2">Dental Implants</h5>
                                <p class="text-sm text-gray-600">Permanent tooth replacement</p>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                <h5 class="font-semibold text-gray-900 mb-2">Tooth Extractions</h5>
                                <p class="text-sm text-gray-600">Safe and comfortable removal</p>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                <h5 class="font-semibold text-gray-900 mb-2">Wisdom Teeth</h5>
                                <p class="text-sm text-gray-600">Expert wisdom tooth removal</p>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                <h5 class="font-semibold text-gray-900 mb-2">Bone Grafting</h5>
                                <p class="text-sm text-gray-600">Restore bone structure</p>
                            </div> --}}
                            </div>
                        </div>
                        <div class="h-96 overflow-hidden rounded-2xl">
                            <img class="w-full h-full object-cover"
                                src="{{ asset($service3->image_1) }}"
                                alt="dental implant procedure, oral surgery equipment, sterile surgical environment, professional dental care" />
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>

    <!-- Pricing Section -->
    {{-- <section id="pricing" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-4">Transparent Pricing</h3>
                <p class="text-xl text-gray-600">Quality dental care at affordable prices with flexible payment options</p>
            </div>

            <div class="grid grid-cols-3 gap-8">
                <div id="pricing-basic" class="bg-gray-50 rounded-2xl p-8 border-2 border-transparent">
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Basic Care</h4>
                    <p class="text-gray-600 mb-6">Essential dental services for maintaining oral health</p>
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between">
                            <span class="text-gray-700">Dental Cleaning</span>
                            <span class="font-semibold">$120</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-700">Dental Exam</span>
                            <span class="font-semibold">$80</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-700">X-Rays</span>
                            <span class="font-semibold">$150</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-700">Fluoride Treatment</span>
                            <span class="font-semibold">$50</span>
                        </div>
                    </div>
                    <button class="w-full bg-gray-200 text-gray-800 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                        Learn More
                    </button>
                </div>

                <div id="pricing-premium" class="bg-dental-blue rounded-2xl p-8 border-2 border-dental-blue text-white">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="text-xl font-bold">Premium Care</h4>
                        <span class="bg-white text-dental-blue px-3 py-1 rounded-full text-sm font-semibold">Popular</span>
                    </div>
                    <p class="text-blue-100 mb-6">Comprehensive care with cosmetic treatments</p>
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between">
                            <span>Deep Cleaning</span>
                            <span class="font-semibold">$300</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Teeth Whitening</span>
                            <span class="font-semibold">$500</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Composite Filling</span>
                            <span class="font-semibold">$200</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Crown</span>
                            <span class="font-semibold">$1,200</span>
                        </div>
                    </div>
                    <button class="w-full bg-white text-dental-blue py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        Book Now
                    </button>
                </div>

                <div id="pricing-advanced" class="bg-gray-50 rounded-2xl p-8 border-2 border-transparent">
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Advanced Care</h4>
                    <p class="text-gray-600 mb-6">Specialized procedures and surgical treatments</p>
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between">
                            <span class="text-gray-700">Dental Implant</span>
                            <span class="font-semibold">$3,500</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-700">Root Canal</span>
                            <span class="font-semibold">$1,000</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-700">Porcelain Veneer</span>
                            <span class="font-semibold">$1,500</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-700">Orthodontics</span>
                            <span class="font-semibold">$4,500</span>
                        </div>
                    </div>
                    <button class="w-full bg-gray-200 text-gray-800 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                        Consultation
                    </button>
                </div>
            </div>

            <div class="text-center mt-12">
                <p class="text-gray-600 mb-4">We accept most insurance plans and offer flexible payment options</p>
                <div class="flex justify-center space-x-8">
                    <div class="flex items-center space-x-2">
                        <i class="fa-solid fa-credit-card text-dental-blue"></i>
                        <span class="text-gray-700">Credit Cards</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fa-solid fa-calendar text-dental-blue"></i>
                        <span class="text-gray-700">Payment Plans</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fa-solid fa-shield text-dental-blue"></i>
                        <span class="text-gray-700">Insurance</span>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- CTA Section -->
    {{-- <section id="cta" class="py-20 bg-gradient-to-r from-dental-blue to-dental-accent">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h3 class="text-4xl font-bold text-white mb-6">Ready to Schedule Your Appointment?</h3>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                Take the first step towards better oral health. Our team is ready to provide you with exceptional dental
                care.
            </p>
            <div class="flex justify-center space-x-6">
                <button
                    class="bg-white text-dental-blue px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition">
                    Book Appointment
                </button>
                <button
                    class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-dental-blue transition">
                    Call (555) 123-4567
                </button>
            </div>
        </div>
    </section> --}}
@endsection
