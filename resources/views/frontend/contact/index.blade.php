@extends('layouts.frontend.master')

@section('seo')
    @include('frontend.seo', [
        'name' => $contact_page->seo_title ?? '',
        'title' => $contact_page->seo_title ?? $contact_page->title,
        'description' => $contact_page->meta_description ?? '',
        'keyword' => $contact_page->meta_keywords ?? '',
        'schema' => $contact_page->seo_schema ?? '',
        'created_at' => $contact_page->created_at,
        'updated_at' => $contact_page->updated_at,
    ])
@endsection
@section('content')
    <section id="contact-hero"
        class="bg-gradient-to-br from-dental-light to-white 
                       h-[280px] md:h-[400px] flex items-center">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-4 md:mb-6">
                {{ $contact_page->title ?? 'Contact Us' }}
            </h2>
            <p class="text-base md:text-xl text-gray-600 max-w-3xl mx-auto">
                {{ $contact_page->short_description ?? 'Contact Us' }}
            </p>
        </div>
    </section>
    <!-- Contact Information -->
    <section id="contact-info" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">

                <div id="contact-phone" class="bg-dental-light rounded-xl p-8 text-center">
                    <div class="bg-dental-blue rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <i class="fa-solid fa-phone text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Phone</h3>
                    <p class="text-dental-blue text-xl font-semibold mb-2">{{ $settings['contact_phone'] }}</p>
                    {{-- <p class="text-gray-600">Monday - Friday: 8:00 AM - 6:00 PM</p>
                        <p class="text-gray-600">Saturday: 9:00 AM - 3:00 PM</p> --}}
                </div>

                <div id="contact-email" class="bg-dental-light rounded-xl p-8 text-center">
                    <div class="bg-dental-blue rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <i class="fa-solid fa-envelope text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Email</h3>
                    <p class="text-dental-blue text-xl font-semibold mb-2">{{ $settings['contact_email'] }}</p>
                    {{-- <p class="text-gray-600">We respond within 24 hours</p> --}}
                    {{-- <p class="text-gray-600">Emergency: emergency@smilecare.com</p> --}}
                </div>

                <div id="contact-location" class="bg-dental-light rounded-xl p-8 text-center">
                    <div class="bg-dental-blue rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <i class="fa-solid fa-location-dot text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Location</h3>
                    <p class="text-gray-900 font-semibold mb-2">{{ $settings['contact_location'] }}</p>

                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form & Map -->
    <section id="contact-form-map" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16">
                <!-- Contact Form -->
                <div id="contact-form-container">
                    <h3 class="text-3xl font-bold text-gray-900 mb-8">{{ $settings['contactform_title'] }}</h3>
                    <form action="{{ route('frontend.contact.submit') }}" method="POST" id="contact-form"
                        class="space-y-6">
                        @csrf
                        <div class="">
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Name *</label>
                                <input name="name" type="text"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent">
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Email Address *</label>
                            <input name="email" type="email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Phone Number</label>
                            <input name="phone" type="tel"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Subject *</label>
                            <input name="course" type="text"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Message *</label>
                            <textarea name="message" rows="5"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                placeholder="Please describe your inquiry or tell us how we can help you..."></textarea>
                        </div>
                        <input type="hidden" name="g-recaptcha-response" id="recaptcha_token">

                        <button type="submit"
                            class="w-full bg-dental-blue text-white py-4 rounded-lg text-lg font-semibold hover:bg-blue-700 transition">
                            Send Message
                        </button>
                    </form>
                </div>
                <!-- Map & Directions -->
                <div id="map-directions">
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 md:mb-8">Find Us</h3>
                    <div class="bg-gray-300 rounded-xl h-64 md:h-80 mb-8 flex items-center justify-center overflow-hidden">
                        <iframe src="{{ $settings['contact_map'] }}" class="w-full h-full border-0" allowfullscreen
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ Section -->
    <section id="faq" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ $faq_page->title }}</h3>
                <p class="text-xl text-gray-600">{{ $faq_page->short_description }}</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- <div id="faq-left" class="space-y-6"> --}}
                @foreach ($faqs as $faq)
                    <div class="bg-white rounded-lg p-6">
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 md:mb-6">{{ $faq->question }}</h3>
                        <p class="text-base md:text-xl text-gray-600">{{ $faq->answer }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('recaptcha.site_key') }}"></script>
    <script>
        document.getElementById('contact-form').addEventListener('submit', function (e) {
            e.preventDefault();
    
            grecaptcha.ready(function () {
                grecaptcha.execute('{{ config('recaptcha.site_key') }}', {
                    action: 'contact'
                }).then(function (token) {
                    document.getElementById('recaptcha_token').value = token;
                    e.target.submit();
                });
            });
        });
    </script>
    
@endsection
