<!-- Footer -->
<footer id="footer" class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-4 gap-8">
            <div>
                <div class="flex items-center space-x-3">
                    <div class="p-1`">
                        <a href="#">
                            <img src="{{ asset($settings['site_main_logo']) }}" style="height: 100px" alt="" />
                        </a>
                    </div>
                    <h1 class="text-2xl font-bold">     {{ $settings['site_title'] }}</h1>
                </div>
                <p class="text-gray-400 mb-4">     {{ $settings['site_information'] }}
                </p>
                <div class="flex space-x-4">
                    <a href="#"
                        class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-dental-blue transition">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="#"
                        class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-dental-blue transition">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#"
                        class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-dental-blue transition">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Services</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="{{ route('frontend.service') }}" class="hover:text-white transition">General Dentistry</a></li>
                    <li><a href="{{ route('frontend.service') }}" class="hover:text-white transition">Cosmetic Dentistry</a></li>
                    <li><a href="{{ route('frontend.service') }}" class="hover:text-white transition">Oral Surgery</a></li>
                    <li><a href="{{ route('frontend.service') }}" class="hover:text-white transition">Pediatric Care</a></li>
                    <li><a href="{{ route('frontend.service') }}" class="hover:text-white transition">Orthodontics</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="{{ route('frontend.about') }}" class="hover:text-white transition">About Us</a></li>
                    <li><a href="#" class="hover:text-white transition">Our Team</a></li>
                    <li><a href="#" class="hover:text-white transition">Patient Info</a></li>
                    <li><a href="#" class="hover:text-white transition">Insurance</a></li>
                    <li><a href="#" class="hover:text-white transition">Reviews</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                <div class="space-y-3 text-gray-400">
                    <p><i class="fa-solid fa-phone mr-2"></i>{{ $settings['contact_phone'] ?? '(555) 123-4567' }}</p>
                    <p><i class="fa-solid fa-envelope mr-2"></i> {{ $settings['contact_email'] ?? 'email' }}</p>
                    <p><i class="fa-solid fa-location-dot mr-2"></i> {{ $settings['contact_location'] ?? 'location' }}</p>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>&copy;  {{ date('Y') }}
                        {!! $settings['site_copyright'] ?? 'u00a9 Celta Eucare. All rights reserved' !!}</p>
        </div>
    </div>
</footer>
