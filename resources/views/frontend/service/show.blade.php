@extends('layouts.frontend.master')

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

@section('content')
    @if ($service_page)
        <!-- Hero Banner -->
        <section class="relative bg-gray-100">
            <!-- Banner Image -->
            <div class="relative">
                <img class="w-full h-64 sm:h-96 object-cover" src="{{ asset($service_page->banner_image) }}"
                    alt="{{ $service_page->title }}">

                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/30 flex flex-col justify-center items-center text-center px-6">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-2">
                        {{ $servicesingle->title ?? 'Service Details' }}
                    </h1>
                    <p class="text-white/80 text-sm sm:text-base">
                        <a class="hover:underline" href="{{ route('frontend.home') }}">Home</a> /
                        <a class="hover:underline"
                            href="{{ route('frontend.service') }}">{{ $service_page->title ?? 'Services' }}</a> /
                        <span>{{ $servicesingle->title ?? '' }}</span>
                    </p>
                </div>
            </div>
        </section>
    @endif

    <!-- Main Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:flex lg:gap-12">
            <!-- Main Content -->
            <div class="lg:w-2/3 bg-white rounded-3xl shadow-xl p-8 mb-8 lg:mb-0">
                <img class="w-full h-80 object-cover rounded-2xl mb-6" src="{{ asset($servicesingle->image_1) }}"
                    alt="{{ $servicesingle->title }}">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $servicesingle->title }}</h2>
                <div class="prose max-w-none text-gray-700">
                    {!! $servicesingle->description !!}
                </div>
            </div>

            <!-- Sidebar: Top Services -->
            <aside class="lg:w-1/3 flex-shrink-0">
                <div class="sticky top-24 space-y-4">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Top Services</h3>
                    @foreach ($services as $course)
                        <a href="{{ route('frontend.servicesingle', $course->slug) }}">
                            <div class="flex gap-4 bg-white rounded-2xl shadow hover:shadow-xl transition p-4 mb-3">
                                <img class="w-20 h-20 object-cover rounded-xl flex-shrink-0"
                                    src="{{ asset($course->image_1 ?? 'frontend/assets/images/default.jpg') }}"
                                    alt="{{ $course->title }}">
                                <div class="flex flex-col justify-between">
                                    <h4 class="text-gray-900 font-semibold text-lg line-clamp-1">{{ $course->title }}</h4>
                                    <p class="text-gray-600 text-sm line-clamp-2">{{ $course->short_description }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </aside>
        </div>
    </section>
@endsection
