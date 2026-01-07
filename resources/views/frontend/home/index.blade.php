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
    <section id="hero" class="bg-gradient-to-br from-dental-light to-white h-[600px] flex items-center">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    {{ $sliders->title }}
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    {{ $sliders->short_description }}
                </p>
                <div class="flex space-x-4">
                    <a href="{{ route('frontend.contact') }}">
                        <button class="bg-dental-blue text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-blue-700 transition">
                            Schedule Consultation
                        </button>
                    </a>
                    <a href="{{ route('frontend.contact') }}">
                    <button class="border-2 border-dental-blue text-dental-blue px-8 py-3 rounded-lg text-lg font-semibold hover:bg-dental-blue hover:text-white transition">
                        Learn More
                    </button>
                    </a>
                </div>
            </div>
            <div class="h-96 overflow-hidden rounded-2xl">
                <img class="w-full h-full object-cover" src="{{ $sliders->image }}" alt="modern dental office with comfortable patient chair, bright lighting, professional dental equipment, clean white interior" />
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

            <div class="grid grid-cols-3 gap-8 mb-16">
                <div class="text-center">
                    <div class="bg-dental-light rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        {{-- <i class="fa-solid fa-award text-dental-blue text-2xl"></i> --}}
                        <img src="{{ $settings['home_counter_students_img'] }}">
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $settings['home_counter_students_title'] }}</h4>
                    <p class="text-gray-600">{{ $settings['home_counter_students'] }}</p>
                </div>
                <div class="text-center">
                    <div class="bg-dental-light rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        {{-- <i class="fa-solid fa-users text-dental-blue text-2xl"></i> --}}
                        <img src="{{ $settings['home_counter_students_img'] }}">

                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $settings['home_counter_scholarship_title'] }}</h4>
                    <p class="text-gray-600">{{ $settings['home_counter_scholarship'] }}</p>
                </div>
                <div class="text-center">
                    <div class="bg-dental-light rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        {{-- <i class="fa-solid fa-microscope text-dental-blue text-2xl"></i> --}}
                        <img src="{{ $settings['home_counter_students_img'] }}">

                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $settings['home_counter_enrolled_title'] }}</h4>
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

            <div class="grid grid-cols-3 gap-8">
                @foreach ($services as $service)
                <div id="service-1" class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition">
                    <div class="bg-dental-light rounded-lg w-16 h-16 flex items-center justify-center mb-6">
                        <img src="{{ $service->title }}">
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-4">General Dentistry</h4>
                    <p class="text-gray-600 mb-4">Comprehensive oral health care including cleanings, fillings, and preventive treatments.</p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Regular cleanings & exams</li>
                        <li>• Cavity fillings</li>
                        <li>• Root canal therapy</li>
                    </ul>
                </div>
                @endforeach


                {{-- <div id="service-2" class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition">
                    <div class="bg-dental-light rounded-lg w-16 h-16 flex items-center justify-center mb-6">
                        <i class="fa-solid fa-smile text-dental-blue text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-4">Cosmetic Dentistry</h4>
                    <p class="text-gray-600 mb-4">Transform your smile with our advanced cosmetic procedures and treatments.</p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Teeth whitening</li>
                        <li>• Veneers</li>
                        <li>• Smile makeovers</li>
                    </ul>
                </div>

                <div id="service-3" class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition">
                    <div class="bg-dental-light rounded-lg w-16 h-16 flex items-center justify-center mb-6">
                        <i class="fa-solid fa-user-doctor text-dental-blue text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-4">Oral Surgery</h4>
                    <p class="text-gray-600 mb-4">Expert surgical procedures performed with precision and care.</p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Tooth extractions</li>
                        <li>• Dental implants</li>
                        <li>• Wisdom tooth removal</li>
                    </ul>
                </div>

                <div id="service-4" class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition">
                    <div class="bg-dental-light rounded-lg w-16 h-16 flex items-center justify-center mb-6">
                        <i class="fa-solid fa-child text-dental-blue text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-4">Pediatric Dentistry</h4>
                    <p class="text-gray-600 mb-4">Specialized care for children in a fun, comfortable environment.</p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Children's cleanings</li>
                        <li>• Fluoride treatments</li>
                        <li>• Sealants</li>
                    </ul>
                </div>

                <div id="service-5" class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition">
                    <div class="bg-dental-light rounded-lg w-16 h-16 flex items-center justify-center mb-6">
                        <i class="fa-solid fa-align-center text-dental-blue text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-4">Orthodontics</h4>
                    <p class="text-gray-600 mb-4">Straighten your teeth with traditional braces or clear aligners.</p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Traditional braces</li>
                        <li>• Clear aligners</li>
                        <li>• Retainers</li>
                    </ul>
                </div>

                <div id="service-6" class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition">
                    <div class="bg-dental-light rounded-lg w-16 h-16 flex items-center justify-center mb-6">
                        <i class="fa-solid fa-shield-halved text-dental-blue text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-4">Preventive Care</h4>
                    <p class="text-gray-600 mb-4">Maintain optimal oral health with our preventive treatments.</p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Regular check-ups</li>
                        <li>• Professional cleanings</li>
                        <li>• Oral cancer screenings</li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Doctors Section -->
    <section id="doctors" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-4">Meet Our Expert Team</h3>
                <p class="text-xl text-gray-600">Experienced professionals dedicated to your oral health</p>
            </div>

            <div class="grid grid-cols-3 gap-8">
                <div id="doctor-1" class="text-center">
                    <div class="mb-6">
                        <img src="https://storage.googleapis.com/uxpilot-auth.appspot.com/avatars/avatar-2.jpg" alt="Dr. Sarah Johnson" class="w-48 h-48 rounded-full mx-auto object-cover shadow-lg">
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Dr. Sarah Johnson</h4>
                    <p class="text-dental-blue font-medium mb-3">Lead Dentist & Founder</p>
                    <p class="text-gray-600 mb-4">15+ years experience in general and cosmetic dentistry. Graduated from Harvard School of Dental Medicine.</p>
                    <div class="flex justify-center space-x-3">
                        <span class="bg-dental-light text-dental-blue px-3 py-1 rounded-full text-sm">General Dentistry</span>
                        <span class="bg-dental-light text-dental-blue px-3 py-1 rounded-full text-sm">Cosmetics</span>
                    </div>
                </div>

                <div id="doctor-2" class="text-center">
                    <div class="mb-6">
                        <img src="https://storage.googleapis.com/uxpilot-auth.appspot.com/avatars/avatar-3.jpg" alt="Dr. Michael Chen" class="w-48 h-48 rounded-full mx-auto object-cover shadow-lg">
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Dr. Michael Chen</h4>
                    <p class="text-dental-blue font-medium mb-3">Oral Surgeon</p>
                    <p class="text-gray-600 mb-4">Specialist in oral surgery and dental implants. 12+ years of surgical experience with advanced training.</p>
                    <div class="flex justify-center space-x-3">
                        <span class="bg-dental-light text-dental-blue px-3 py-1 rounded-full text-sm">Oral Surgery</span>
                        <span class="bg-dental-light text-dental-blue px-3 py-1 rounded-full text-sm">Implants</span>
                    </div>
                </div>

                <div id="doctor-3" class="text-center">
                    <div class="mb-6">
                        <img src="https://storage.googleapis.com/uxpilot-auth.appspot.com/avatars/avatar-5.jpg" alt="Dr. Emily Rodriguez" class="w-48 h-48 rounded-full mx-auto object-cover shadow-lg">
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Dr. Emily Rodriguez</h4>
                    <p class="text-dental-blue font-medium mb-3">Pediatric Dentist</p>
                    <p class="text-gray-600 mb-4">Specializes in children's dentistry with a gentle approach. Board certified in pediatric dental care.</p>
                    <div class="flex justify-center space-x-3">
                        <span class="bg-dental-light text-dental-blue px-3 py-1 rounded-full text-sm">Pediatric</span>
                        <span class="bg-dental-light text-dental-blue px-3 py-1 rounded-full text-sm">Prevention</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact & Inquiry Form -->
    <section id="contact" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-start">
                <div>
                    <h3 class="text-4xl font-bold text-gray-900 mb-6">Get In Touch</h3>
                    <p class="text-xl text-gray-600 mb-8">Ready to schedule your appointment? Contact us today and take the first step towards a healthier smile.</p>

                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="bg-dental-blue rounded-full w-12 h-12 flex items-center justify-center">
                                <i class="fa-solid fa-phone text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Phone</h4>
                                <p class="text-gray-600">(555) 123-4567</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="bg-dental-blue rounded-full w-12 h-12 flex items-center justify-center">
                                <i class="fa-solid fa-envelope text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Email</h4>
                                <p class="text-gray-600">info@smilecare.com</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="bg-dental-blue rounded-full w-12 h-12 flex items-center justify-center">
                                <i class="fa-solid fa-location-dot text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Address</h4>
                                <p class="text-gray-600">123 Dental Street<br>Health City, HC 12345</p>
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
                    <h4 class="text-2xl font-bold text-gray-900 mb-6">Schedule Consultation</h4>
                    <form class="space-y-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                            <input type="tel" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Service Needed</label>
                            <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent">
                                <option>Select a service</option>
                                <option>General Dentistry</option>
                                <option>Cosmetic Dentistry</option>
                                <option>Oral Surgery</option>
                                <option>Pediatric Dentistry</option>
                                <option>Orthodontics</option>
                                <option>Emergency Care</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                            <textarea rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent" placeholder="Tell us about your dental needs..."></textarea>
                        </div>

                        <button type="submit" class="w-full bg-dental-blue text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                            Schedule Appointment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
