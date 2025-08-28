<?php
// resources/views/components/product-carousel.blade.php
?>

@props(['products', 'title' => 'Featured Products', 'sectionClass' => 'flat-spacing-2'])

<section class="{{ $sectionClass }}">
    <div class="container">
        <div class="flat-title flex-row justify-content-between px-0">
            <span class="title wow fadeInUp" data-wow-delay="0s">{{ $title }}</span>
            <div class="box-sw-navigation">
                <div class="nav-sw square nav-next-slider nav-next-product">
                    <span class="icon icon-arrow1-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous products</span>
                </div>
                <div class="nav-sw square nav-prev-slider nav-prev-product">
                    <span class="icon icon-arrow1-right" aria-hidden="true"></span>
                    <span class="sr-only">Next products</span>
                </div>
            </div>
        </div>
        <div class="hover-sw-nav hover-sw-2">
            <div dir="ltr" class="swiper tf-sw-product-sell wrap-sw-over" data-preview="4" data-tablet="3" data-mobile="2" data-space-lg="30" data-space-md="15" data-pagination="2" data-pagination-md="3" data-pagination-lg="3">
                <div class="swiper-wrapper">
                    @foreach($products as $product)
                        <div class="swiper-slide" lazy="true">
                            <article class="card-product style-2">
                                <div class="card-product-wrapper">
                                    <a href="{{ $product['url'] }}" class="product-img" aria-label="View {{ $product['name'] }}">
                                        <img
                                            class="lazyload img-product"
                                            data-src="{{ asset($product['image']) }}"
                                            src="{{ asset($product['image']) }}"
                                            alt="{{ $product['alt'] }}"
                                            width="360"
                                            height="450"
                                        >
                                        @if(isset($product['hover_image']))
                                            <img
                                                class="lazyload img-hover"
                                                data-src="{{ asset($product['hover_image']) }}"
                                                src="{{ asset($product['hover_image']) }}"
                                                alt="{{ $product['alt'] }} - Alternative view"
                                                width="360"
                                                height="450"
                                            >
                                        @endif
                                    </a>

                                    {{-- Wishlist & Compare buttons --}}
                                    <div class="list-product-btn column-left">
                                        <button
                                            type="button"
                                            class="box-icon wishlist bg_white btn-icon-action"
                                            data-product-id="{{ $product['id'] }}"
                                            aria-label="Add {{ $product['name'] }} to wishlist"
                                        >
                                            <span class="icon icon-heart" aria-hidden="true"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete" aria-hidden="true"></span>
                                        </button>
                                        <button
                                            type="button"
                                            class="box-icon bg_white compare btn-icon-action"
                                            data-product-id="{{ $product['id'] }}"
                                            aria-label="Add {{ $product['name'] }} to compare"
                                        >
                                            <span class="icon icon-compare" aria-hidden="true"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                    {{-- Quick actions --}}
                                    <div class="list-product-btn absolute-3">
                                        <button
                                            type="button"
                                            class="box-icon quick-add style-2"
                                            data-product-id="{{ $product['id'] }}"
                                            aria-label="Quick add {{ $product['name'] }} to cart"
                                        >
                                            <span class="icon icon-bag" aria-hidden="true"></span>
                                            <span class="text">QUICK ADD</span>
                                        </button>
                                        <button
                                            type="button"
                                            class="box-icon quickview style-2"
                                            data-product-id="{{ $product['id'] }}"
                                            aria-label="Quick view {{ $product['name'] }}"
                                        >
                                            <span class="icon icon-view" aria-hidden="true"></span>
                                            <span class="text">QUICK VIEW</span>
                                        </button>
                                    </div>

                                    {{-- Sizes if available --}}
                                    @if(isset($product['sizes']) && count($product['sizes']) > 0)
                                        <div class="size-list style-2">
                                            @foreach($product['sizes'] as $size)
                                                <span>{{ $size }}</span>
                                            @endforeach
                                        </div>
                                    @endif

                                    {{-- Sale badge --}}
                                    @if(isset($product['sale_percentage']) && $product['sale_percentage'] > 0)
                                        <div class="on-sale-wrap text-end">
                                            <div class="on-sale-item">-{{ $product['sale_percentage'] }}%</div>
                                        </div>
                                    @endif

                                    {{-- Countdown timer for flash sales --}}
                                    @if(isset($product['countdown']))
                                        <div class="countdown-box">
                                            <div class="js-countdown" data-timer="{{ $product['countdown'] }}" data-labels="d :,h :,m :,s"></div>
                                        </div>
                                    @endif
                                </div>

                                <div class="card-product-info">
                                    <h3>
                                        <a href="{{ $product['url'] }}" class="title link">{{ $product['name'] }}</a>
                                    </h3>

                                    <div class="price-wrapper">
                                        @if(isset($product['original_price']))
                                            <span class="price-original" aria-label="Original price">{{ $product['original_price'] }}</span>
                                        @endif
                                        <span class="price" aria-label="Current price">{{ $product['price'] }}</span>
                                    </div>

                                    {{-- Color variants --}}
                                    @if(isset($product['colors']) && count($product['colors']) > 0)
                                        <ul class="list-color-product" aria-label="Available colors">
                                            @foreach($product['colors'] as $index => $color)
                                                <li class="list-color-item color-swatch {{ $index === 0 ? 'active' : '' }}">
                                                    <span class="tooltip">{{ $color['name'] }}</span>
                                                    <span class="swatch-value {{ $color['class'] }}" aria-label="{{ $color['name'] }}"></span>
                                                    <img
                                                        class="lazyload"
                                                        data-src="{{ asset($color['image']) }}"
                                                        src="{{ asset($color['image']) }}"
                                                        alt="{{ $product['name'] }} in {{ $color['name'] }}"
                                                        width="360"
                                                        height="450"
                                                    >
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Navigation arrows --}}
            <div class="nav-sw nav-next-slider nav-next-product box-icon w_46 round">
                <span class="icon icon-arrow-left" aria-hidden="true"></span>
            </div>
            <div class="nav-sw nav-prev-slider nav-prev-product box-icon w_46 round">
                <span class="icon icon-arrow-right" aria-hidden="true"></span>
            </div>
        </div>
    </div>
</section>

{{-- Product Schema Markup --}}
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ItemList",
    "name": "{{ $title }}",
    "numberOfItems": {{ count($products) }},
    "itemListElement": [
        @foreach($products as $index => $product)
        {
            "@type": "Product",
            "position": {{ $index + 1 }},
            "name": "{{ $product['name'] }}",
            "url": "{{ $product['url'] }}",
            "image": "{{ asset($product['image']) }}",
            "offers": {
                "@type": "Offer",
                "price": "{{ preg_replace('/[^0-9.]/', '', $product['price']) }}",
                "priceCurrency": "USD",
                "availability": "{{ $product['in_stock'] ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock' }}"
            }
        }{{ !$loop->last ? ',' : '' }}
        @endforeach
    ]
}
</script>
