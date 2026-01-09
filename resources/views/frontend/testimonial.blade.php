@section('seo')
    @include('frontend.seo', [
        'name' => $testimonial_page->seo_title ?? '',
        'title' => $testimonial_page->seo_title ?? $testimonial_page->title,
        'description' => $testimonial_page->meta_description ?? '',
        'keyword' => $testimonial_page->meta_keywords ?? '',
        'schema' => $testimonial_page->seo_schema ?? '',
        'created_at' => $testimonial_page->created_at,
        'updated_at' => $testimonial_page->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    @if ($testimonial_page)
        <section id="services-hero" class="bg-gradient-to-br from-dental-light to-white h-[400px] flex items-center">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-5xl font-bold text-gray-900 mb-6">{{ $testimonial_page->title ?? 'About Us' }}</h2>
                <div class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ $testimonial_page->short_description ?? 'About Us' }} </div>
            </div>
        </section>
    @endif
    <section id="reviews" class=" bg-white">
        <div class="max-w-6xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Review Card -->
                @foreach ($testimonial as $item)
                    <div class="bg-gradient-to-br from-white to-gray-100 rounded-2xl p-8 border border-gray-200">
                        <!-- Header -->
                        <div class="flex items-center gap-4 mb-4">
                            <img src="{{ $item->image }}" class="w-14 h-14 rounded-full object-cover" alt="Reviewer">

                            <div>
                                <h4 class="font-bold text-gray-900 uppercase text-sm">
                                    {{ $item->name }}
                                </h4>
                                <p class="text-xs text-gray-500 uppercase tracking-wide">
                                    {{ $item->position }}
                                </p>
                            </div>
                        </div>

                        <!-- Stars (Icons) -->
                        <div class="flex gap-1 mb-4 text-yellow-400">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>

                        <!-- Review Text -->
                        <div class="text-gray-600 text-sm line-clamp-3 leading-relaxed mb-4">
                            {!! $item->description !!}
                        </div>

                    </div>
                @endforeach

            </div>
        </div>

    </section>
@endsection
