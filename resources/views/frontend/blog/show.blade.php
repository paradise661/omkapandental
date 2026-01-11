@section('seo')
    @include('frontend.seo', [
        'name' => $blogsingle->seo_title ?? '',
        'title' => $blogsingle->seo_title ?? $blogsingle->title,
        'description' => $blogsingle->meta_description ?? '',
        'keyword' => $blogsingle->meta_keywords ?? '',
        'schema' => $blogsingle->seo_schema ?? '',
        'created_at' => $blogsingle->created_at,
        'updated_at' => $blogsingle->updated_at,
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
    <section class="py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Main Blog -->
                <div class="lg:w-2/3">
                    <div class="mb-8">
                        <img src="{{ $blogsingle->image }}" alt=""
                            class="w-full h-64 md:h-96 lg:h-[500px] rounded-lg object-cover">
                    </div>
                    <div class="space-y-4">
                        <h2 class="text-3xl font-bold text-gray-800">{{ $blogsingle->title }}</h2>
                        <p class="text-gray-600 leading-relaxed">
                            {!! $blogsingle->description !!}
                        </p>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Popular Blogs</h3>

                        <!-- Blog Card -->
                        @foreach ($blogs as $item)
                            <div class="space-y-4">
                                <a href="{{ route('frontend.blogsingle', $item->slug) }}" class=" stretched-card-link"></a>
                                <a href="#"
                                    class="flex gap-4 items-center group hover:bg-gray-100 p-2 rounded transition">
                                    <img src="{{ $item->image }}" alt="" class="w-16 h-16 object-cover rounded">
                                    <h4 class="text-gray-800 font-medium group-hover:text-blue-600">{{ $item->title }}
                                    </h4>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
