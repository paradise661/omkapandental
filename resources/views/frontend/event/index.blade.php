@section('seo')
    @include('frontend.seo', [
    'name' => $event_page->seo_title ?? '',
    'title' => $event_page->seo_title ?? $event_page->title ?? '',
    'description' => $event_page->meta_description ?? '',
    'keyword' => $event_page->meta_keywords ?? '',
    'schema' => $event_page->seo_schema ?? '',
    'created_at' => $event_page->created_at ?? now(),
    'updated_at' => $event_page->updated_at ?? now(),
])
@endsection
@extends('layouts.frontend.master')
@section('content')
        <!-- Hero Section -->
        <section class="bg-gradient-to-br from-dental-light to-white min-h-[400px] flex items-center" id="about-hero">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6">
                    {{ $event_page->title ?? 'Event' }}
                </h2>
                <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto" style="text-align: justify">
                    {{ $event_page->short_description ?? ''}}
                </p>
            </div>
        </section>

        <div class="max-w-7xl mx-auto py-10 px-4">
        <!-- Events Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($events as $event)
                            @php
                $eventDate = \Carbon\Carbon::parse($event->date);
                $today = now()->startOfDay();
                $isExpired = $eventDate->lt($today);

                $formattedDate = $eventDate->format('d M Y');
                $formattedTime = \Carbon\Carbon::parse($event->time)->format('h:i A');
                            @endphp

                            <div class="relative bg-white rounded-xl shadow-md overflow-hidden flex flex-col h-full">

                                <!-- Status Badge -->
                                {{-- <span
                                    class="absolute top-4 right-4 z-10 px-3 py-1 text-xs font-semibold rounded-full
                                    {{ $isExpired
                                        ? 'bg-red-100 text-red-600'
                                        : 'bg-green-100 text-green-600'
                                    }}">
                                    {{ $isExpired ? 'Expired' : 'Upcoming' }}
                                </span> --}}

                                <!-- Event Image -->
                                <div class="overflow-hidden">
                                    <img
                                        src="{{  $event->image ?? '' }}"
                                        alt="{{ $event->name ?? '' }}"
                                        class="w-full h-[280px] object-cover transition duration-300 hover:scale-105"
                                    />
                                </div>

                                <!-- Event Details -->
                                <div class="p-6 flex flex-col flex-grow">
                                    <h3 class="text-xl font-semibold text-gray-800 mb-2">
                                        {{ $event->name ?? '' }}
                                    </h3>

                                    <p class="text-gray-600 text-sm mb-4">
                                        {!! Str::words(strip_tags($event->description ?? ''), 18, '...') !!}
                                    </p>

                                    <!-- Event Info -->
                                    <div class="space-y-3 text-sm text-gray-700 mb-6">
                                        <div class="flex items-center gap-3">
                                            <i class="fas fa-calendar text-yellow-500"></i>
                                            <span><strong>{{ $formattedDate }}</strong></span>
                                        </div>

                                        <div class="flex items-center gap-3">
                                            <i class="fas fa-clock text-yellow-500"></i>
                                            <span>{{ $formattedTime }} onwards</span>
                                        </div>

                                        <div class="flex items-center gap-3">
                                            <i class="fas fa-map-marker-alt text-yellow-500"></i>
                                            <span>{{ $event->location ?? '' }}</span>
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <a
                                        href="{{ route('frontend.eventsingle', $event->slug) }}"
                                        class="mt-auto inline-block text-center px-6 py-3 rounded-lg font-medium transition bg-dental-blue text-white ">
                                        Learn More
                                    </a>
                                </div>
                            </div>
            @endforeach
        </div>
    </div>

@endsection
