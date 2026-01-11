@section('seo')
    @include('frontend.seo', [
        'name' => $blog_page->seo_title ?? '',
        'title' => $blog_page->seo_title ?? $blog_page->title,
        'description' => $blog_page->meta_description ?? '',
        'keyword' => $blog_page->meta_keywords ?? '',
        'schema' => $blog_page->seo_schema ?? '',
        'created_at' => $blog_page->created_at,
        'updated_at' => $blog_page->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    @if ($blog_page)
        <section id="services-hero" class="bg-gradient-to-br from-dental-light to-white h-[400px] flex items-center">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-5xl font-bold text-gray-900 mb-6">{{ $blog_page->title ?? 'About Us' }}</h2>
                <div class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ $blog_page->title ?? 'About Us' }} </div>
            </div>
        </section>
    @endif
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Blog Card -->
                @foreach ($blog as $item)
                    <div class="bg-white rounded-2xl border border-gray-300 overflow-hidden transition group">
                        <a href="{{ route('frontend.blogsingle', $item->slug) }}" class=" stretched-card-link">
                            <div class="overflow-hidden">
                                <img src="{{ $item->image }}"
                                    class="w-full h-52 object-cover transform transition duration-500 group-hover:scale-105"
                                    alt="Blog image">
                            </div>
                            <div class="p-6">

                                <a href="{{ route('frontend.blogsingle', $item->slug) }}"
                                    class="inline-block text-justify text-sm font-semibold text-white
                bg-[#D5277B] px-3 py-1 rounded-full">
                                    {{ $item->short_description }}
                                </a>

                                <h3 class="text-xl font-bold mt-2 mb-3 text-gray-900">
                                    {{ $item->title }}
                                </h3>
                                <div class="text-gray-600 line-clamp-4 text-justify text-base mb-5">
                                    {!! $item->description !!}
                                </div>

                            </div>
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
