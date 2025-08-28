<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function index(): View
    {
        // SEO Data
        $seoData = [
            'title' => 'Summer Style Sensations - Premium Fashion Store',
            'description' => 'Discover the hottest summer fashion trends and must-have looks. Shop our collection of premium clothing, accessories, and stylish pieces for men and women.',
            'keywords' => 'summer fashion, style trends, premium clothing, fashion accessories, men fashion, women fashion, designer clothes, fashion store',
            'ogImage' => 'images/slider/fashion-slideshow-04.jpg',
        ];

        // Hero Slider Data
        $heroSlides = [
            [
                'image' => 'images/slider/fashion-slideshow-04.jpg',
                'title' => 'Summer Style<br>Sensations',
                'subtitle' => 'Discover the hottest trends and must-have looks',
                'button_text' => 'Shop collection',
                'button_url' => route('shop.index'),
                'alt' => 'Summer Fashion Collection - Premium Styles'
            ],
            [
                'image' => 'images/slider/fashion-slideshow-05.jpg',
                'title' => 'Youthful<br>Summer style',
                'subtitle' => 'Discover the hottest trends and must-have looks',
                'button_text' => 'Shop collection',
                'button_url' => route('shop.index'),
                'alt' => 'Youthful Summer Fashion - Trendy Styles'
            ],
            [
                'image' => 'images/slider/fashion-slideshow-06.jpg',
                'title' => 'Gentle<br>Summer style',
                'subtitle' => 'Discover the hottest trends and must-have looks',
                'button_text' => 'Shop collection',
                'button_url' => route('shop.index'),
                'alt' => 'Gentle Summer Fashion - Elegant Collection'
            ]
        ];

        // Collections Data
        $collections = [
            [
                'id' => 'women',
                'title' => 'Women',
                'image' => 'images/collections/collection-21.jpg',
                'url' => route('shop.category', 'women'),
                'alt' => 'Women\'s Fashion Collection'
            ],
            [
                'id' => 'handbag',
                'title' => 'Handbag',
                'image' => 'images/collections/collection-22.jpg',
                'url' => route('shop.category', 'handbags'),
                'alt' => 'Designer Handbags Collection'
            ],
            [
                'id' => 'accessories',
                'title' => 'Accessories',
                'image' => 'images/collections/collection-23.jpg',
                'url' => route('shop.category', 'accessories'),
                'alt' => 'Fashion Accessories Collection'
            ],
            [
                'id' => 'men',
                'title' => 'Men',
                'image' => 'images/collections/collection-24.jpg',
                'url' => route('shop.category', 'men'),
                'alt' => 'Men\'s Fashion Collection'
            ]
        ];

        // Shop Banner Data
        $shopBanner = [
            'image' => 'images/collections/collection-25.jpg',
            'subtitle' => 'SPRING SALE 30% OFF',
            'title' => 'Effortless <br> Denim Delights',
            'description' => 'Discover the versatility of denim with our collection of jeans, jackets',
            'link' => route('shop.collection', 'denim'),
            'alt' => 'Spring Denim Collection - 30% Off Sale'
        ];

        // Best Sellers - This would typically come from database
        $bestSellers = $this->getBestSellerProducts();

        // Banner Collection Data
        $bannerCollection = [
            [
                'image' => 'images/shop/file/banner-gr-1.jpg',
                'title' => 'Accessories Galore',
                'description' => 'Shop through our latest selection of Fashion',
                'url' => route('shop.category', 'accessories'),
                'alt' => 'Fashion Accessories Collection Banner'
            ],
            [
                'image' => 'images/shop/file/banner-gr-2.jpg',
                'title' => 'Statement Pieces',
                'description' => 'Shop through our latest selection of Womens',
                'url' => route('shop.category', 'women'),
                'alt' => 'Women\'s Statement Pieces Collection Banner'
            ]
        ];

        // Store Locations
        $stores = [
            [
                'id' => 'hongkong',
                'name' => 'Hongkong Store',
                'address' => '301 Front St WToronto,',
                'email' => 'Ecomus@support.com',
                'phone' => '(08) 8942 1299',
                'hours' => [
                    'Mon - Fri, 8:30am - 10:30pm',
                    'Saturday, 8:30am - 10:30pm',
                    'Sunday Closed'
                ],
                'image' => 'images/shop/store/ourstore1.png',
                'active' => true
            ],
            // Add other stores...
        ];

        // Brand Logos
        $brands = [
            ['image' => 'images/brand/brand-01.png', 'alt' => 'Brand Partner 1'],
            ['image' => 'images/brand/brand-02.png', 'alt' => 'Brand Partner 2'],
            ['image' => 'images/brand/brand-03.png', 'alt' => 'Brand Partner 3'],
            ['image' => 'images/brand/brand-04.png', 'alt' => 'Brand Partner 4'],
            ['image' => 'images/brand/brand-05.png', 'alt' => 'Brand Partner 5'],
            ['image' => 'images/brand/brand-06.png', 'alt' => 'Brand Partner 6'],
        ];

        $context = [
            'heroSlides' => $heroSlides,
            'collections' => $collections,
            'shopBanner' => $shopBanner,
            'bestSellers' => $bestSellers,
            'bannerCollection' => $bannerCollection,
            'stores' => $stores,
            'brands' => $brands,
        ];

        return view(
            'home',
            array_merge($seoData, $context)
        );
    }

    private function getBestSellerProducts(): array
    {
        // This would typically fetch from database
        // For now, returning static data based on your template
        return [
            [
                'id' => 1,
                'name' => 'Ribbed Tank Top',
                'price' => '$16.95',
                'original_price' => null,
                'sale_percentage' => 33,
                'image' => 'images/products/orange-1.jpg',
                'hover_image' => 'images/products/white-1.jpg',
                'url' => route('product.show', 'ribbed-tank-top'),
                'alt' => 'Ribbed Tank Top - Orange',
                'colors' => [
                    ['name' => 'Orange', 'class' => 'bg_orange-3', 'image' => 'images/products/orange-1.jpg'],
                    ['name' => 'Black', 'class' => 'bg_dark', 'image' => 'images/products/black-1.jpg'],
                    ['name' => 'White', 'class' => 'bg_white', 'image' => 'images/products/white-1.jpg'],
                ],
                'sizes' => ['S', 'M', 'L', 'XL'],
                'countdown' => 1007500, // seconds
                'is_sale' => true,
                'in_stock' => true
            ],
            // Add more products...
        ];
    }
}
