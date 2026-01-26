@section('seo')
    @include('frontend.seo', [
    'name' => $message_page->seo_title ?? '',
    'title' => $message_page->seo_title ?? $message_page->title,
    'description' => $message_page->meta_description ?? '',
    'keyword' => $message_page->meta_keywords ?? '',
    'schema' => $message_page->seo_schema ?? '',
    'created_at' => $message_page->created_at,
    'updated_at' => $message_page->updated_at,
])
@endsection
@extends('layouts.frontend.master')
@section('content')
        <!-- Hero Section -->
            <section class="bg-gradient-to-br from-dental-light to-white min-h-[400px] flex items-center" id="about-hero">
                <div class="max-w-7xl mx-auto px-6 text-center">
                    <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6">
                        {{ $message_page->title ?? 'Message From Ceo' }}
                    </h2>
                    <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto" style="text-align: justify">
                        {{ $message_page->short_description }}
                    </p>
                </div>
            </section>

            {{-- about us section --}}
            {{-- about us section --}}
            <section class="py-10">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <!-- Image -->
                <div
                    class="flex items-center justify-center"
                    data-aos="fade-right"
                    data-aos-duration="3000"
                >
                    <div class="about-us-img-ceo">
                        <img class="rounded-lg"
                            src="{{ asset($message_page->banner_image) }}"
                            alt="{{ $message_page->title }}"
                        />
                    </div>
                </div>

                <!-- Content -->
                <div
                    class="flex items-center justify-center"
                    data-aos="fade-left"
                    data-aos-duration="3000"
                >
                    <div class="service-content-container text-center lg:text-left">
                        <h6 class="my-2">
                            {{ $message_page->title ?? 'About us' }}
                        </h6>

                        <h3 class="my-2">
                            {{ $message_page->short_description }}
                        </h3>

                        <div class="text-css-counter message-from-ceo">
                            {!! $message_page->description !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
