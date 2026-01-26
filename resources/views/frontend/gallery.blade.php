@extends('layouts.frontend.master')

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
@section('content')

         <!-- Hero Section -->
            <section id="about-hero" class="bg-gradient-to-br from-dental-light to-white min-h-[400px] flex items-center">
                <div class="max-w-7xl mx-auto px-6 text-center">
                    <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6">
                   {{ $gallery_page->title ?? 'About Us' }}
                </h2>
                <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ $gallery_page->short_description }}
                </p>
                </div>
            </section>
            <div class="container mx-auto py-6">
        <!-- Tabs -->
        <div class="flex justify-center border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px" id="albumTab">
                @foreach ($albums as $key => $album)
                                        <li class="mr-2">
                                            <button
                                                class="tab-btn inline-block px-5 py-2 rounded-t-lg border-b-2 font-medium transition
                                                {{ $key == 0
        ? 'border-dental-blue text-dental-blue'
        : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                                                }}"
                                                data-tab="content-{{ $album->slug }}">
                                                {{ $album->name }}
                                            </button>
                                        </li>
                @endforeach
            </ul>
        </div>

        <!-- Tabs Content -->
        <div class="mt-6">
            @foreach ($albums as $key => $album)
                <div
                    id="content-{{ $album->slug }}"
                    class="tab-content {{ $key == 0 ? '' : 'hidden' }}">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach ($album->galleries as $gallery)
                            <a
                                class="block overflow-hidden rounded-lg fro-dropzone-image-a fancybox"
                                data-fancybox="gallery"
                                data-caption="{{ $gallery->title }}"
                                href="{{ $gallery->image }}">
                                <img
                                    src="{{ $gallery->image }}"
                                    alt="{{ $gallery->title }}"
                                    class=" fro-dropzone-image-a w-full h-full p-3 object-cover rounded-lg hover:scale-105 transition duration-300"
                                />
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>



@endsection
@push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Fancybox.bind("[data-fancybox='gallery']", {
                    // Customize your FancyBox options here
                    infinite: true,
                    buttons: ["zoom", "slideShow", "fullScreen", "download", "thumbs", "close"],
                });
            });
        </script>
        <script>
        document.querySelectorAll('.tab-btn').forEach(button => {
            button.addEventListener('click', () => {
                // Remove active styles
                document.querySelectorAll('.tab-btn').forEach(btn => {
                    btn.classList.remove('border-dental-blue', 'text-dental-blue');
                    btn.classList.add('border-transparent', 'text-gray-500');
                });

                // Hide all tab contents
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.add('hidden');
                });

                // Activate clicked tab
                            button.classList.add('border-dental-blue', 'text-dental-blue');
                button.classList.remove('border-transparent', 'text-gray-500');

                // Show related content
                document.getElementById(button.dataset.tab).classList.remove('hidden');
            });
        });
    </script>

@endpush