<!-- Header -->
<header id="header" class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <div class="bg-dental-blue rounded-full p-2">
                <i class="fa-solid fa-tooth text-white text-xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-900">     {{ $settings['site_title'] }}</h1>
        </div>

        <nav class="hidden md:flex space-x-8">
            <a href="/" class="text-gray-700 hover:text-dental-blue font-medium">Home</a>
            <a href="{{ route('frontend.about') }}" class="text-gray-700 hover:text-dental-blue font-medium">About</a>
            <a href="{{ route('frontend.service') }}" class="text-gray-700 hover:text-dental-blue font-medium">Services</a>
            <a href="{{ route('frontend.service') }}" class="text-gray-700 hover:text-dental-blue font-medium">Doctors</a>
            <a href="{{ route('frontend.contact') }}" class="text-gray-700 hover:text-dental-blue font-medium">Contact</a>
        </nav>

        <div class="flex items-center space-x-4">
            <span class="text-dental-blue font-semibold">
                <i class="fa-solid fa-phone mr-2"></i>
                (555) 123-4567
            </span>
            <button class="bg-dental-blue text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Book Appointment
            </button>
        </div>
    </div>
</header>
