<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Clinic</title>
    <link rel="icon" href="data:,">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'dental-blue': '#1E40AF',
                        'dental-light': '#EFF6FF',
                        'dental-accent': '#3B82F6'
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script> window.FontAwesomeConfig = { autoReplaceSvg: 'nest'};</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>::-webkit-scrollbar { display: none;}</style>
</head>

<body>
    @include('layouts.frontend.header')
    <main>
        @yield('content')
    </main>

    @include('layouts.frontend.footer')
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const header = document.querySelector("#header");
            const navLogo = document.querySelector("#nav-logo");

            const handleScroll = () => {
                const scrollTop = window.scrollY;
                if (scrollTop > 100) {
                    header.classList.add('sticky');
                    // navLogo.style.filter = 'invert(100%) brightness(1000%)'; // Makes the logo white
                } else {
                    header.classList.remove('sticky');
                    // navLogo.style.filter = 'invert(0%) brightness(100%)'; // Restores the original colors
                }
            };
            window.addEventListener("scroll", handleScroll);
        });
    </script>
    @stack('js')
    <script src="{{ asset('admin/assets/js/sweetalert-new.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/aos.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('frontend/assets/js/scrollScript.js') }}"></script>
    {{--
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}






</body>

</html>

<script src="scrollScript.js"></script>
