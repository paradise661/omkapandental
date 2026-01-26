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
    <section class="bg-gradient-to-br from-dental-light to-white h-[400px] flex items-center" id="contact-hero">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-5xl font-bold text-gray-900 mb-6">{{ $team_page->title ?? 'Contact Us' }}</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ $team_page->short_description ?? 'Contact Us' }}
            </p>
        </div>
    </section>
    <!-- Doctors Section -->
    <section class="py-20 bg-white" id="doctors">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($teams as $item)
                    <div class="text-center" id="doctor-1">
                        <div class="mb-6">
                            <img class="w-48 h-48 rounded-full mx-auto object-cover shadow-lg"
                                src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $item->name ?? '' }}</h4>
                        <p class="text-dental-blue font-medium mb-3">{{ $item->position ?? '' }}</p>
                        <div class="text-gray-600 mb-4">{!! $item->description !!}</div>
                        <div class="flex justify-center space-x-3">
                            <span
                                class="bg-dental-light text-dental-blue px-3 py-1 rounded-full text-sm">{{ $item->email ?? '' }}</span>
                            <span
                                class="bg-dental-light text-dental-blue px-3 py-1 rounded-full text-sm">{{ $item->whatsapp ?? '' }}</span>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
