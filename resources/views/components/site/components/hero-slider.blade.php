<?php
// resources/views/components/hero-slider.blade.php
?>

@props(['slides'])

<div class="tf-slideshow slider-home-2 slider-effect-fade position-relative">
    <div dir="ltr" class="swiper tf-sw-slideshow" data-preview="1" data-tablet="1" data-mobile="1" data-centered="false" data-space="0" data-loop="true" data-auto-play="true" data-delay="2000" data-speed="1000">
        <div class="swiper-wrapper">
            @foreach($slides as $index => $slide)
                <div class="swiper-slide" lazy="true">
                    <div class="wrap-slider">
                        <img
                            class="lazyload"
                            data-src="{{ asset($slide['image']) }}"
                            src="{{ asset($slide['image']) }}"
                            alt="{{ $slide['alt'] }}"
                            width="1920"
                            height="800"
                        />
                        <div class="box-content">
                            <div class="container">
                                <h1 class="fade-item fade-item-1">{!! $slide['title'] !!}</h1>
                                <p class="fade-item fade-item-2">{{ $slide['subtitle'] }}</p>
                                <a
                                    href="{{ $slide['button_url'] }}"
                                    class="fade-item fade-item-3 tf-btn btn-fill animate-hover-btn btn-xl radius-3"
                                    aria-label="{{ $slide['button_text'] }} - {{ strip_tags($slide['title']) }}"
                                >
                                    <span>{{ $slide['button_text'] }}</span>
                                    <i class="icon icon-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="wrap-pagination sw-absolute-2">
        <div class="container">
            <div class="sw-dots sw-pagination-slider" role="tablist" aria-label="Slideshow pagination"></div>
        </div>
    </div>
</div>

{{-- Schema markup for hero slider --}}
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ImageGallery",
    "name": "Hero Fashion Collection",
    "description": "Latest fashion trends and summer collections",
    "image": [
        @foreach($slides as $index => $slide)
            "{{ asset($slide['image']) }}"{{ !$loop->last ? ',' : '' }}
        @endforeach
    ]
}
</script>
