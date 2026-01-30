<div x-data="{ showTopBar: true, lastScroll: 0 }"
    @scroll.window="
        showTopBar = (window.pageYOffset < lastScroll) || window.pageYOffset < 10;
        lastScroll = window.pageYOffset;
    "
    class="sticky top-0 z-50">

    <!-- Top Info Bar -->
    <div x-show="showTopBar" x-transition:enter="transition transform duration-300"
        x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0"
        x-transition:leave="transition transform duration-300" x-transition:leave-start="translate-y-0"
        x-transition:leave-end="-translate-y-full" class="bg-[#802F84] text-white text-sm">
        <div class="max-w-7xl mx-auto px-6 py-2 flex flex-wrap justify-between items-center">
            <div class="flex items-center space-x-4">
                <span class="flex items-center">
                    <i class="fa-solid fa-phone mr-2"></i>
                    {{ $settings['site_phone'] }}
                </span>
                <span class="hidden sm:flex items-center">
                    <i class="fa-solid fa-envelope mr-2"></i>
                    {{ $settings['site_email'] ?? 'info@example.com' }}
                </span>
            </div>

            <div class="hidden md:flex items-center">
                <i class="fa-solid fa-clock mr-2"></i>
                Mon–Sat: 9:00 AM – 8:00 PM
            </div>
        </div>
    </div>

</div>

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
                <a class="text-gray-700 hover:text-dental-blue font-medium flex items-center space-x-1 cursor-pointer"
                    href="{{ route('frontend.about') }}">
                    <span>About</span>

                    <!-- Only one icon visible at a time -->
                    <i class="fa-solid fa-chevron-down text-sm" x-show="!aboutOpenDesktop" x-cloak></i>
                    <i class="fa-solid fa-chevron-up text-sm" x-show="aboutOpenDesktop" x-cloak></i>

                </a>
                <!-- Dropdown menu -->
                <div class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50"
                    x-show="aboutOpenDesktop" x-transition.opacity.duration.300ms x-cloak>
                    <a class="block px-4 py-2 text-gray-700 hover:bg-dental-blue hover:text-white"
                        href="{{ route('frontend.about') }}">
                        About Us
                    </a>
                    <a class="block px-4 py-2 text-gray-700 hover:bg-dental-blue hover:text-white"
                        href="{{ route('frontend.messagefromfounder') }}">
                        Message from CEO
                    </a>
                    <a class="block px-4 py-2 text-gray-700 hover:bg-dental-blue hover:text-white"
                        href="{{ route('frontend.team') }}">
                        Doctors
                    </a>
                      <a class="block px-4 py-2 text-gray-700 hover:bg-dental-blue hover:text-white"
                        href="{{ route('frontend.event') }}">
                       Event
                    </a>
                    <a class="block px-4 py-2 text-gray-700 hover:bg-dental-blue hover:text-white"
                        href="{{ route('frontend.testimonial') }}">
                        Review
                    </a>
                </div>
            </div>

            <a class="text-gray-700 hover:text-dental-blue font-medium"
                href="{{ route('frontend.service') }}">Services</a>
            <a class="text-gray-700 hover:text-dental-blue font-medium"
                href="{{ route('frontend.gallery') }}">Gallery</a>
            <a class="text-gray-700 hover:text-dental-blue font-medium" href="{{ route('frontend.blog') }}">Blog</a>
            <a class="text-gray-700 hover:text-dental-blue font-medium" href="https://www.youtube.com/@Omkapandental"
                target="_blank" rel="noopener noreferrer">
                Video
            </a>
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
    <div class="lg:hidden bg-white border-t" x-show="mobileMenuOpen" x-transition>
        <nav class="flex flex-col space-y-4 px-6 py-4">

            <a class="text-gray-700 hover:text-dental-blue font-medium" href="/">Home</a>

            <!-- About Dropdown Mobile -->
            <div class="relative">
                <div class="flex justify-between items-center">
                    <a class="text-gray-700 hover:text-dental-blue font-medium" href="{{ route('frontend.about') }}">
                        About
                    </a>

                    <button class="text-gray-700" @click="aboutOpenMobile = !aboutOpenMobile">
                        <i class="fa-solid fa-chevron-down" x-show="!aboutOpenMobile" x-cloak></i>
                        <i class="fa-solid fa-chevron-up" x-show="aboutOpenMobile" x-cloak></i>
                    </button>
                </div>

                <div class="mt-2 flex flex-col space-y-1 pl-4" x-show="aboutOpenMobile" x-transition x-cloak>
                    <a class="text-gray-700 hover:text-dental-blue font-medium"
                        href="{{ route('frontend.messagefromfounder') }}">
                        Message from CEO
                    </a>
                    <a class="text-gray-700 hover:text-dental-blue font-medium" href="{{ route('frontend.gallery') }}">
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
