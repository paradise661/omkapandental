@section('seo')
    @include('frontend.seo', [
        'name' => $service_page->seo_title ?? '',
        'title' => $service_page->seo_title ?? $service_page->title,
        'description' => $service_page->meta_description ?? '',
        'keyword' => $service_page->meta_keywords ?? '',
        'schema' => $service_page->seo_schema ?? '',
        'created_at' => $service_page->created_at,
        'updated_at' => $service_page->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    
    <!-- Hero Section -->
   <section id="services-hero"
    class="bg-gradient-to-br from-dental-light to-white
           h-[300px] md:h-[400px] flex items-center">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-4 md:mb-6">
            {{ $settings['services_title'] }}
        </h2>
        <div class="text-base md:text-xl text-gray-600 max-w-3xl mx-auto">
            {{ $settings['services_description'] }}
        </div>
    </div>
</section>


    <!-- Services Overview -->
    <section id="services-overview" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16 items-center mb-20">

                <div>
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">
    {{ $service_page->title }}
</h3>

                    <p class="text-lg text-gray-600 mb-6">
                        {{ $service_page->short_description }}
                    </p>
                    <div class="space-y-4">
                        {!! $service_page->description !!}
                        
                    </div>
                </div>
                <div class="h-64 md:h-96 overflow-hidden rounded-2xl mt-8 md:mt-0">

                    <img class="w-full h-full object-cover" src="{{ $service_page->banner_image }}"
                        alt="modern dental clinic interior with multiple treatment rooms, advanced equipment, clean white design, professional lighting" />
                </div>
            </div>
        </div>
    </section>

    <!-- Detailed Services -->
    <section id="detailed-services" class="py-20 bg-gray-50">
        @php
            $service1 = $services->get(0);
            $service2 = $services->get(1);
            $service3 = $services->get(2);
            // $service4 = $services->get(3);
        @endphp
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-4xl font-bold text-gray-900 text-center mb-16">Explore {{ $settings['services_title'] }}</h3>
            @if ($service1)
                <!-- General Dentistry -->
                <div id="general-dentistry" class="mb-20">
                    <div class="grid grid-cols-1 md:grid-cols-2
 gap-12 items-center">
                        <div>
                            <div class="flex items-center space-x-4 mb-6">
                                 <div class="bg-dental-light rounded-lg w-16 h-16 flex items-center justify-center mb-6">
                            <img src="{{ $service1->image }}">
                        </div>
                               <h4 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $service1->title }}</h4>
                            </div>
                            <p class="text-lg text-gray-600 mb-6">
                                {{ $service1->short_description }}
                            </p>
                            <div class="grid grid-cols-1 md:grid-cols-2
 gap-4">
                                {!! $service1->description !!}
                               
                            </div>
                        </div>
                        <div class="h-64 md:h-96 overflow-hidden rounded-2xl mt-8 md:mt-0">
                            <img class="w-full h-full object-cover" src="{{ $service1->image_1 }}"
                                alt="dentist performing dental cleaning on patient, professional dental hygiene procedure, modern dental office" />
                        </div>
                    </div>
                </div>
            @endif
            <!-- Cosmetic Dentistry -->
            @if ($service2)
                <div id="cosmetic-dentistry" class="mb-20">
                    <div class="grid grid-cols-1 md:grid-cols-2
 gap-12 items-center">
                        <div class="h-96 overflow-hidden rounded-2xl">
                            <img class="w-full h-full object-cover" src="{{ $service2->image_1 }}"
                                alt="before and after teeth whitening results, bright white smile, cosmetic dentistry transformation" />
                        </div>
                        <div>
                            <div class="flex items-center space-x-4 mb-6">
                                <div class="bg-dental-light rounded-lg w-16 h-16 flex items-center justify-center mb-6">
                            <img src="{{ $service2->image }}">
                        </div>
                                <h4 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $service2->title }}</h4>
                            </div>
                            <p class="text-lg text-gray-600 mb-6">
                                {{ $service2->short_description }}
                            </p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                {!! $service2->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Oral Surgery -->
            @if ($service3)
                <div id="oral-surgery" class="mb-20">
                    <div class="grid grid-cols-1 md:grid-cols-2
 gap-12 items-center">
                        <div>
                            <div class="flex items-center space-x-4 mb-6">
                               <div class="bg-dental-light rounded-lg w-16 h-16 flex items-center justify-center mx-auto md:mx-0 mb-4 md:mb-6">
                            <img src="{{ $service3->image }}">
                        </div>
                                <h4 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $service3->title }}</h4>
                            </div>
                            <p class="text-lg text-gray-600 mb-6">
                                {{ $service3->short_description }}
                            </p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                {!! $service3->description !!}
                            </div>
                        </div>
                        <div class="h-64 md:h-96 overflow-hidden rounded-2xl mt-8 md:mt-0">
                            <img class="w-full h-full object-cover"
                                src="{{ asset($service3->image_1) }}"
                                alt="dental implant procedure, oral surgery equipment, sterile surgical environment, professional dental care" />
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>

@endsection
