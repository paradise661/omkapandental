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
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-dental-light to-white
           h-[300px] md:h-[400px] flex items-center"
        id="services-hero">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-4 md:mb-6">
                {{ $settings['services_title'] }}
            </h2>
            <div class="text-base md:text-xl text-gray-600 max-w-3xl mx-auto">
                {{ $settings['services_description'] }}
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    <section class="py-20 bg-white" id="services-overview">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16 items-center mb-20">

                <div>
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">
                        {{ $service_page->title }}
                    </h3>

                    <p class="text-lg text-justify text-gray-600 mb-6">
                        {{ $service_page->short_description }}
                    </p>
                    <div class="space-y-4">
                        {!! $service_page->description !!}

                    </div>
                </div>
                <div class="h-64 md:h-96 overflow-hidden rounded-2xl mt-8 md:mt-0">

                    <img class="w-full h-full object-cover" src="{{ $service_page->banner_image }}"
                        alt="modern dental clinic interior with multiple treatment rooms, advanced equipment, clean white design, professional lighting" />
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50" id="services">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-4">{{ $settings['services_title'] }}</h3>
                <p class="text-xl text-gray-600">{{ $settings['services_description'] }}</p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($services as $service)
                    <div
                        class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col transition hover:shadow-2xl duration-300">

                        <!-- Top Image -->
                        <div class="overflow-hidden">
                            <img class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105"
                                src="{{ $service->image }}" alt="{{ $service->title ?? '' }}">
                        </div>

                        <!-- Card Content -->
                        <div class="p-6 flex flex-col flex-grow">
                            <!-- Title -->
                            <h4 class="text-2xl font-bold text-gray-900 mb-3">{{ $service->title ?? '' }}</h4>

                            <!-- Short Description -->
                            <p class="text-gray-600 text-justify mb-6 line-clamp-4 flex-grow">{{ $service->short_description }}</p>

                            <!-- Full Width Button -->
                            <a class="w-full text-center bg-dental-blue hover:bg-[#2fa3c6] text-white font-semibold py-3 rounded-lg transition"
                                href="{{ route('frontend.servicesingle', $service->slug) }}">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
