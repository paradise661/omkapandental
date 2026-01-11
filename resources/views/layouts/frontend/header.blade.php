<!-- Header -->
<header id="header" class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 flex flex-wrap items-center justify-between py-3">

    <!-- Logo -->
    <div class="flex items-center space-x-3 flex-shrink-0">
        <div class="rounded-full p-2">
            <a href="{{ route('frontend.home') }}"><img src="{{ $settings['site_main_logo'] }}"
                 class="h-16 w-16 sm:h-20 sm:w-20 md:h-24 md:w-24 lg:h-24 lg:w-24 object-contain"></a>
        </div>
    </div>

    <!-- Desktop Nav -->
    <nav class="hidden lg:flex flex-wrap flex-1 justify-center space-x-6">
        <a href="/" class="text-gray-700 hover:text-dental-blue font-medium">Home</a>
        <a href="{{ route('frontend.about') }}" class="text-gray-700 hover:text-dental-blue font-medium">About</a>
        <a href="{{ route('frontend.service') }}" class="text-gray-700 hover:text-dental-blue font-medium">Services</a>
        <a href="{{ route('frontend.team') }}" class="text-gray-700 hover:text-dental-blue font-medium">Doctors</a>
        <a href="{{ route('frontend.blog') }}" class="text-gray-700 hover:text-dental-blue font-medium">Blog</a>
        <a href="{{ route('frontend.testimonial') }}" class="text-gray-700 hover:text-dental-blue font-medium">Review</a>
        <a href="{{ route('frontend.contact') }}" class="text-gray-700 hover:text-dental-blue font-medium">Contact</a>
    </nav>

    <!-- Right Section -->
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

    <!-- Mobile/Tablet Hamburger -->
    <button id="menuBtn" class="lg:hidden text-dental-blue text-2xl ml-auto">
        <i class="fa-solid fa-bars"></i>
    </button>
</div>


    <!-- Mobile & Tablet Menu -->
    <div id="mobileMenu" class="hidden lg:hidden bg-white border-t">
        <nav class="flex flex-col space-y-4 px-6 py-4">
            <a href="/" class="text-gray-700 hover:text-dental-blue font-medium">Home</a>
            <a href="{{ route('frontend.about') }}" class="text-gray-700 hover:text-dental-blue font-medium">About</a>
            <a href="{{ route('frontend.service') }}" class="text-gray-700 hover:text-dental-blue font-medium">Services</a>
            <a href="{{ route('frontend.team') }}" class="text-gray-700 hover:text-dental-blue font-medium">Doctors</a>
            <a href="{{ route('frontend.blog') }}" class="text-gray-700 hover:text-dental-blue font-medium">Blog</a>
            <a href="{{ route('frontend.testimonial') }}" class="text-gray-700 hover:text-dental-blue font-medium">Review</a>
            <a href="{{ route('frontend.contact') }}" class="text-gray-700 hover:text-dental-blue font-medium">Contact</a>

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

<!-- Toggle Script -->
<script>
    document.getElementById('menuBtn').addEventListener('click', function() {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });
</script>
