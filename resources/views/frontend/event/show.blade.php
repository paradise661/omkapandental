@section('seo')
    @include('frontend.seo', [
    'name' => $eventsingle->seo_title ?? '',
    'title' => $eventsingle->seo_title ?? $eventsingle->title,
    'description' => $eventsingle->meta_description ?? '',
    'keyword' => $eventsingle->meta_keywords ?? '',
    'schema' => $eventsingle->seo_schema ?? '',
    'created_at' => $eventsingle->created_at,
    'updated_at' => $eventsingle->updated_at,
])
@endsection
@extends('layouts.frontend.master')
@section('content')
                <!-- Hero Section -->
                <section class="bg-gradient-to-br from-dental-light to-white min-h-[400px] flex items-center" id="about-hero">
                    <div class="max-w-7xl mx-auto px-6 text-center">
                        <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6">
                            {{ $eventsingle->name ?? 'Event' }}
                        </h2>
                        <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto" style="text-align: justify">
                            {{ $eventsingle->short_description }}
                        </p>
                    </div>
                </section>

                <div class="max-w-7xl mx-auto py-10 px-4">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                    <!-- Main Content -->
                    <div class="lg:col-span-8" data-aos="fade-right" data-aos-duration="3000">
                        <div class="bg-white rounded-2xl shadow-sm p-6">

                            <!-- Event Image -->
                            <div class="text-center">
                                <img
                                    src="{{ asset($eventsingle->image) }}"
                                    alt="{{ $eventsingle->name }}"
                                    class="w-full h-[350px] object-cover rounded-2xl mb-6"
                                />
                            </div>

                            @php
    $eventsingleDate = \Carbon\Carbon::parse($eventsingle->date);
    $today = now()->startOfDay();
    $isExpired = $eventsingleDate->lt($today);
    $formattedDate = $eventsingleDate->format('d M Y');
    $formattedTime = \Carbon\Carbon::parse($eventsingle->time)->format('h:i A');
                            @endphp

                            <!-- Event Info Row -->
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-y-4 text-center border rounded-2xl py-4 px-2 shadow-sm mb-6">

                                <div class="flex flex-col items-center">
                                    <i class="fas fa-calendar-alt text-lg event-icon mb-1"></i>
                                    <small class="font-semibold">{{ $formattedDate }}</small>
                                </div>

                                <div class="flex flex-col items-center">
                                    <i class="fas fa-clock text-lg event-icon mb-1"></i>
                                    <small class="font-semibold">{{ $formattedTime }}</small>
                                </div>

                                <div class="flex flex-col items-center">
                                    <i class="fas fa-map-marker-alt text-lg event-icon mb-1"></i>
                                    <small class="font-semibold">
                                        {{ $eventsingle->location ?? 'N/A' }}
                                    </small>
                                </div>

                                <div class="flex flex-col items-center">
                                    <i class="fas fa-info-circle text-lg event-icon mb-1"></i>
                                    <span
                                        class="inline-block px-3 py-1 text-sm rounded-full text-white
                                        {{ $isExpired ? 'bg-red-500' : 'bg-green-500' }}">
                                        {{ $isExpired ? 'Expired' : 'Upcoming' }}
                                    </span>
                                </div>

                            </div>

                            <!-- Post Description -->
                            <div class="mt-6">
                                <p class="text-lg leading-relaxed text-gray-700">
                                    {!! $eventsingle->description !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="lg:col-span-4" data-aos="fade-left" data-aos-duration="3000">
                        <div class="sticky top-24">
                            <div class="bg-white rounded-lg shadow-sm p-6">

                                <h4 class="text-center text-dental-blue font-semibold text-lg mb-6">
                                    Recent Events
                                </h4>

                                <ul class="space-y-4">
                                    @foreach ($popular_events as $popular_posts)
                                        <li class="flex items-center gap-4">
                                            <img
                                                src="{{ asset($popular_posts->image) }}"
                                                alt="{{ $popular_posts->name }}"
                                                class="w-12 h-12 rounded object-cover"
                                            />
                                            <a
                                                href="{{ route('frontend.eventsingle',$popular_posts->slug) }}"
                                                class="text-gray-800 hover:text-blue-600 transition"
                                            >
                                                {{ $popular_posts->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

@endsection    