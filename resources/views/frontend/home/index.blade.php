@section('seo')
    @include('frontend.seo', [
        'name' => $settings['homepage_title'] ?? '',
        'title' => $settings['homepage_seo_title'] ?? '',
        'description' => $settings['home_seo_description'] ?? '',
        'keyword' => $settings['homepage_seo_keywords'] ?? '',
        'created_at' => '2024-04-26T08:09:15+00:00',
        'updated_at' => '2024-04-26T10:54:05+00:00',
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    <!-- Include Alpine.js if not already -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Popup Modal with Title on Top -->
    @if ($popup)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-4 sm:p-6" x-data="{ open: true }"
            x-show="open" x-cloak x-transition.opacity>

            <!-- Modal Container -->
            <div class="relative bg-white rounded-2xl shadow-2xl max-w-full max-h-full" @click.away="open = false"
                style="width: auto; height: auto;">

                <!-- Close Button -->
                <button class="absolute top-3 right-3 text-white text-gray-700 hover:text-gray-900 text-3xl font-bold z-50"
                    @click="open = false">
                    &times;
                </button>

                <!-- Title on Top -->
                {{-- @if ($popup->title)
                    <div class="absolute top-4 left-1/2 transform -translate-x-1/2 px-4 py-2 bg-black/60 rounded-lg z-50">
                        <h3 class="text-white text-xl sm:text-2xl font-bold">{{ $popup->title }}</h3>
                    </div>
                @endif --}}

                <!-- Image with natural aspect ratio -->
                <img class="block max-w-full max-h-[90vh] w-auto h-auto mx-auto object-contain"
                    src="{{ $popup->image ?? '' }}" alt="Popup Image">
            </div>
        </div>
    @endif

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-dental-light to-white min-h-[600px] flex items-center" id="hero">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="text-center lg:text-left">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6 leading-tight mt-6">
                    {{ $sliders->title }}
                </h2>
                <p class="text-lg lg:text-xl text-gray-600 mb-8">
                    {{ $sliders->short_description }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="{{ route('frontend.appointment') }}">
                        <button
                            class="bg-dental-blue text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-[#2fa3c6] transition">
                            Schedule Consultation
                        </button>
                    </a>
                    <a href="{{ route('frontend.contact') }}">
                        <button
                            class="border-2 border-dental-blue text-dental-blue px-8 py-3 rounded-lg text-lg font-semibold hover:bg-dental-blue hover:text-white transition">
                            Learn More
                        </button>
                    </a>
                </div>
            </div>

            <div class="h-72 sm:h-96 overflow-hidden rounded-2xl">
                <img class="w-full h-full object-cover" src="{{ $sliders->image }}">
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 bg-white" id="about">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-4">{{ $settings['aboutus_title'] }}</h3>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ $settings['aboutus_description'] }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">

                <div class="text-center">
                    <div class="bg-dental-light rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        {{-- <i class="fa-solid fa-award text-dental-blue text-2xl"></i> --}}
                        <img src="{{ $settings['home_counter_students_img'] }}">
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $settings['home_counter_students_title'] }}
                    </h4>
                    <p class="text-gray-600">{{ $settings['home_counter_students'] }}</p>
                </div>
                <div class="text-center">
                    <div class="bg-dental-light rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        {{-- <i class="fa-solid fa-users text-dental-blue text-2xl"></i> --}}
                        <img src="{{ $settings['home_counter_scholarship_img'] }}">

                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $settings['home_counter_scholarship_title'] }}
                    </h4>
                    <p class="text-gray-600">{{ $settings['home_counter_scholarship'] }}</p>
                </div>
                <div class="text-center">
                    <div class="bg-dental-light rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        {{-- <i class="fa-solid fa-microscope text-dental-blue text-2xl"></i> --}}
                        <img src="{{ $settings['home_counter_enrolled_img'] }}">

                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $settings['home_counter_enrolled_title'] }}
                    </h4>
                    <p class="text-gray-600">{{ $settings['home_counter_enrolled'] }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
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
                            <p class="text-gray-600 mb-6 line-clamp-4 flex-grow">{{ $service->short_description }}</p>

                            <!-- Full Width Button -->
                            <a class="w-full text-center bg-dental-blue hover:bg-[#2fa3c6] text-white font-semibold py-3 rounded-lg transition"
                                href="{{ route('frontend.servicesingle', $service->slug) }}">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Services Button -->
            <div class="mt-12 text-center">
                <a class="inline-block bg-dental-blue hover:bg-[#2fa3c6] text-white font-semibold py-3 px-8 rounded-lg transition text-lg"
                    href="{{ route('frontend.service') }}">
                    View All Services
                </a>
            </div>
        </div>
    </section>

    <!-- Doctors Section -->
    <section class="py-20 bg-white" id="doctors">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-4">{{ $settings['teams_title'] }}</h3>
                <p class="text-xl text-gray-600">{{ $settings['teams_description'] }}</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($teams as $item)
                    <div class="text-center" id="doctor-1">
                        <div class="mb-6">
                            <img class="w-48 h-48 rounded-full mx-auto object-cover shadow-lg"
                                src="{{ asset($item->image) }}" alt="{{ $item->title }}">
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
    <!--blog section start-->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-4">{{ $settings['blogs_title'] }}</h3>
                <p class="text-xl text-gray-600">{{ $settings['blogs_description'] }}</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Blog Card -->
                @foreach ($blogs as $item)
                    <div class="bg-white rounded-2xl border border-gray-300 overflow-hidden transition group">
                        <a class=" stretched-card-link" href="{{ route('frontend.blogsingle', $item->slug) }}">
                            <div class="overflow-hidden">
                                <img class="w-full h-52 object-cover transform transition duration-500 group-hover:scale-105"
                                    src="{{ $item->image }}" alt="Blog image">
                            </div>
                            <div class="p-6">

                                <a class="inline-block text-justify text-sm font-semibold text-white
                bg-[#D5277B] px-3 py-1 rounded-full"
                                    href="{{ route('frontend.blogsingle', $item->slug) }}">
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
    <section class=" bg-white" id="reviews">
        <div class="max-w-6xl mx-auto px-4 py-12">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-4">{{ $settings['testioninal_title'] }}</h3>
                <p class="text-xl text-gray-600">{{ $settings['testioninal_description'] }}</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Review Card -->
                @foreach ($testimonials as $item)
                    <div class="bg-gradient-to-br from-white to-gray-100 rounded-2xl p-8 border border-gray-200">
                        <!-- Header -->
                        <div class="flex items-center gap-4 mb-4">
                            <img class="w-14 h-14 rounded-full object-cover" src="{{ $item->image }}" alt="Reviewer">

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
                        <div class="text-gray-600 line-clamp-3 text-sm leading-relaxed mb-4">
                            {!! $item->description !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact & Inquiry Form -->
    <section class="py-20 bg-gray-50" id="contact">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

                <div>
                    <h3 class="text-4xl font-bold text-gray-900 mb-6">{{ $settings['contact_section_title'] }}</h3>
                    <p class="text-xl text-gray-600 mb-8">{{ $settings['contact_description'] }}</p>

                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="bg-dental-blue rounded-full w-12 h-12 flex items-center justify-center">
                                <i class="fa-solid fa-phone text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Phone</h4>
                                <p class="text-gray-600">{{ $settings['contact_phone'] }}</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="bg-dental-blue rounded-full w-12 h-12 flex items-center justify-center">
                                <i class="fa-solid fa-envelope text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Email</h4>
                                <p class="text-gray-600">{{ $settings['contact_email'] }}</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="bg-dental-blue rounded-full w-12 h-12 flex items-center justify-center">
                                <i class="fa-solid fa-location-dot text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Address</h4>
                                <p class="text-gray-600">{{ $settings['contact_location'] }}</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="bg-dental-blue rounded-full w-12 h-12 flex items-center justify-center">
                                <i class="fa-solid fa-clock text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Hours</h4>
                                <p class="text-gray-600">Mon-Fri: 8AM-6PM<br>Sat: 9AM-3PM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-xl" id="inquiry-form">
                    <h4 class="text-2xl font-bold text-gray-900 mb-6">{{ $settings['contactform_title'] }}</h4>
                    <form class="space-y-6" action="{{ route('frontend.contact.submit') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="name"> Name</label>
                            <input
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                id="name" name="name" placeholder=" " type="text">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="email">Email</label>
                            <input
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                id="email" type="email"type="email" name="email">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="phone">Phone</label>
                            <input
                                class="w-full text-sm sm:text-base px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue"
                                id="phone" type="tel" name="phone">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                            <textarea
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                id="description" name="message" rows="4" placeholder="Tell us about your dental needs..."></textarea>
                        </div>

                        <button
                            class="w-full bg-dental-blue text-white py-3 rounded-lg font-semibold hover:bg-[#2fa3c6] transition"
                            type="submit">
                            Schedule Appointment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
