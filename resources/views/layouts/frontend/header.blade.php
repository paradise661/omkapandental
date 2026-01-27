<header class="bg-white shadow-lg sticky top-0 z-50" x-data="{ aboutOpenDesktop: false, aboutOpenMobile: false, mobileMenuOpen: false }">

    <div class="max-w-7xl mx-auto px-6 flex flex-wrap items-center justify-between">

        <!-- Logo -->
        <div class="flex items-center space-x-3 flex-shrink-0">
            <div class="rounded-full p-2">
                <a href="{{ route('frontend.home') }}">
                    <img class="h-16 w-16 sm:h-20 sm:w-20 md:h-24 md:w-24 lg:h-24 lg:w-24 object-contain"
                        src="{{ $settings['site_main_logo'] }}">
                </a>
            </div>
        </div>

        <!-- Desktop Nav -->
        <nav class="hidden lg:flex flex-wrap flex-1 justify-center space-x-6">

            <a class="text-gray-700 hover:text-dental-blue font-medium" href="/">Home</a>

            <!-- About Dropdown (Desktop) -->
            <div class="relative" @mouseenter="aboutOpenDesktop = true" @mouseleave="aboutOpenDesktop = false">

                <!-- About Link (clickable) -->
                <a href="{{ route('frontend.about') }}"
                    class="text-gray-700 hover:text-dental-blue font-medium flex items-center space-x-1 cursor-pointer">
                    <span>About</span>

                    <!-- Only one icon visible at a time -->
                    <i x-show="!aboutOpenDesktop" x-cloak class="fa-solid fa-chevron-down text-sm"></i>
                    <i x-show="aboutOpenDesktop" x-cloak class="fa-solid fa-chevron-up text-sm"></i>

                </a>
                <!-- Dropdown menu -->
                <div x-show="aboutOpenDesktop" x-transition.opacity.duration.300ms x-cloak
                    class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                    <a href="{{ route('frontend.messagefromfounder') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-dental-blue hover:text-white">
                        Message from CEO
                    </a>
                    <a href="{{ route('frontend.gallery') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-dental-blue hover:text-white">
                        Gallery
                    </a>
                </div>
            </div>

            <a class="text-gray-700 hover:text-dental-blue font-medium"
                href="{{ route('frontend.service') }}">Services</a>
            <a class="text-gray-700 hover:text-dental-blue font-medium" href="{{ route('frontend.team') }}">Doctors</a>
            <a class="text-gray-700 hover:text-dental-blue font-medium" href="{{ route('frontend.blog') }}">Blog</a>
            <a class="text-gray-700 hover:text-dental-blue font-medium"
                href="{{ route('frontend.testimonial') }}">Review</a>
            <a class="text-gray-700 hover:text-dental-blue font-medium"
                href="{{ route('frontend.contact') }}">Contact</a>

        </nav>

        <!-- Right Section (Desktop) -->
        <div class="hidden lg:flex items-center space-x-4 flex-shrink-0">
            <span class="text-dental-blue font-semibold flex items-center">
                <i class="fa-solid fa-phone mr-2"></i>
                {{ $settings['site_phone'] }}
            </span>
            <a href="{{ route('frontend.appointment') }}">
                <button class="bg-dental-blue text-white px-6 py-2 rounded-lg hover:bg-[#2fa3c6] transition">
                    Book Appointment
                </button>
            </a>
        </div>

        <!-- Mobile Hamburger -->
        <button class="lg:hidden text-dental-blue text-2xl ml-auto" @click="mobileMenuOpen = !mobileMenuOpen">
            <i class="fa-solid fa-bars"></i>
        </button>

    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-transition class="lg:hidden bg-white border-t">
        <nav class="flex flex-col space-y-4 px-6 py-4">

            <a class="text-gray-700 hover:text-dental-blue font-medium" href="/">Home</a>

            <!-- About Dropdown Mobile -->
            <div class="relative">
                <div class="flex justify-between items-center">
                    <a href="{{ route('frontend.about') }}" class="text-gray-700 hover:text-dental-blue font-medium">
                        About
                    </a>
                    <button @click="aboutOpenMobile = !aboutOpenMobile" class="text-gray-700">
                        <i :class="aboutOpenMobile ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down'"></i>
                    </button>
                </div>

                <div x-show="aboutOpenMobile" x-transition class="mt-2 flex flex-col space-y-1 pl-4">
                    <a href="{{ route('frontend.messagefromfounder') }}"
                        class="text-gray-700 hover:text-dental-blue font-medium">
                        Message from CEO
                    </a>
                    <a href="{{ route('frontend.gallery') }}" class="text-gray-700 hover:text-dental-blue font-medium">
                        Gallery
                    </a>
                </div>
            </div>

            <a class="text-gray-700 hover:text-dental-blue font-medium"
                href="{{ route('frontend.service') }}">Services</a>
            <a class="text-gray-700 hover:text-dental-blue font-medium" href="{{ route('frontend.team') }}">Doctors</a>
            <a class="text-gray-700 hover:text-dental-blue font-medium" href="{{ route('frontend.blog') }}">Blog</a>
            <a class="text-gray-700 hover:text-dental-blue font-medium"
                href="{{ route('frontend.testimonial') }}">Review</a>
            <a class="text-gray-700 hover:text-dental-blue font-medium"
                href="{{ route('frontend.contact') }}">Contact</a>

            <span class="text-dental-blue font-semibold pt-2 flex items-center">
                <i class="fa-solid fa-phone mr-2"></i>
                {{ $settings['site_phone'] }}
            </span>

            <a href="{{ route('frontend.appointment') }}">
                <button class="w-full bg-dental-blue text-white px-6 py-2 rounded-lg hover:bg-[#2fa3c6] transition">
                    Book Appointment
                </button>
            </a>
        </nav>
    </div>

</header>
