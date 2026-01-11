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
    <!-- Hero Section -->
    <section id="hero" class="bg-gradient-to-br from-dental-light to-white min-h-[600px] flex items-center">
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
    <section id="about" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-4">{{ $settings['aboutus_title'] }}</h3>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ $settings['aboutus_description'] }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">

                <div class="text-center">
                    <div class="bg-dental-blue rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        {{-- <i class="fa-solid fa-award text-dental-blue text-2xl"></i> --}}
                        <img src="{{ $settings['home_counter_scholarship_img'] }}">
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $settings['home_counter_students_title'] }}</h4>
                    <p class="text-gray-600">{{ $settings['home_counter_students'] }}</p>
                </div>
                <div class="text-center">
                    <div class="bg-dental-blue rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        {{-- <i class="fa-solid fa-users text-dental-blue text-2xl"></i> --}}
                        <img src="{{ $settings['home_counter_enrolled_img'] }}">

                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $settings['home_counter_scholarship_title'] }}
                    </h4>
                    <p class="text-gray-600">{{ $settings['home_counter_scholarship'] }}</p>
                </div>
                <div class="text-center">
                    <div class="bg-dental-blue rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        {{-- <i class="fa-solid fa-microscope text-dental-blue text-2xl"></i> --}}
                        <img src="{{ $settings['home_counter_students_img'] }}">

                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $settings['home_counter_enrolled_title'] }}
                    </h4>
                    <p class="text-gray-600">{{ $settings['home_counter_enrolled'] }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-4">{{ $settings['services_title'] }}</h3>
                <p class="text-xl text-gray-600">{{ $settings['services_description'] }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($services as $service)
                    <div id="service-1" class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition">
                        <div class="bg-dental-light rounded-lg w-16 h-16 flex items-center justify-center mb-6">
                            <img src="{{ $service->image }}">
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-4">{{ $service->title }}</h4>
                        <p class="text-gray-600 mb-4">{{ $service->short_description }}</p>
                        <ul class="list-disc pl-5">
                            {!! $service->description !!}
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Doctors Section -->
    <section id="doctors" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-4">{{ $settings['teams_title'] }}</h3>
                <p class="text-xl text-gray-600">{{ $settings['teams_description'] }}</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($teams as $item)
                    <div id="doctor-1" class="text-center">
                        <div class="mb-6">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}"
                                class="w-48 h-48 rounded-full mx-auto object-cover shadow-lg">
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $item->title }}</h4>
                        <p class="text-dental-blue font-medium mb-3">{{ $item->position }}</p>
                        <div class="text-gray-600 mb-4">{!! $item->description !!}</div>
                        <div class="flex justify-center space-x-3">
                            <span
                                class="bg-dental-light text-dental-blue px-3 py-1 rounded-full text-sm">{{ $item->email }}</span>
                            <span
                                class="bg-dental-light text-dental-blue px-3 py-1 rounded-full text-sm">{{ $item->whatsapp }}</span>
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
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition">
                        <img src="{{ $item->image }}" class="w-full h-52 object-cover" alt="Blog image">
                        <div class="p-6">
                            <span
                                class="inline-block text-justify text-sm font-semibold text-white
             bg-[#D5277B] px-3 py-1 rounded-full">
                                {{ $item->short_description }}
                            </span>
                            <h3 class="text-xl font-bold mt-2 mb-3 text-gray-900">
                                {{ $item->title }}
                            </h3>
                            <div class="text-gray-600 line-clamp-4 text-justify text-base mb-5">
                                {!! $item->description !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Contact & Inquiry Form -->
    <section id="contact" class="py-20 bg-gray-50">
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

                <div id="inquiry-form" class="bg-white rounded-2xl p-8 shadow-xl">
                    <h4 class="text-2xl font-bold text-gray-900 mb-6">{{ $settings['contactform_title'] }}</h4>
                    <form action="{{ route('frontend.contact.submit') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2"> Name</label>
                            <input name="name" id="name" placeholder=" " type="text"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent">
                        </div>


                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email"type="email" name="email" id="email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                            <input type="tel" name="phone" id="phone"
                                class="w-full text-sm sm:text-base px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                            <textarea id="description" name="message" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                placeholder="Tell us about your dental needs..."></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-dental-blue text-white py-3 rounded-lg font-semibold hover:bg-[#2fa3c6] transition">
                            Schedule Appointment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
