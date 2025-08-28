<?php

namespace App\Services;

class SeoService
{
    protected array $meta = [];
    protected array $structuredData = [];

    public function setTitle(string $title): self
    {
        $this->meta['title'] = $title;
        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->meta['description'] = $description;
        return $this;
    }

    public function setKeywords(string $keywords): self
    {
        $this->meta['keywords'] = $keywords;
        return $this;
    }

    public function setCanonical(string $url): self
    {
        $this->meta['canonical'] = $url;
        return $this;
    }

    public function setOgImage(string $image): self
    {
        $this->meta['og_image'] = $image;
        return $this;
    }

    public function addStructuredData(string $type, array $data): self
    {
        $this->structuredData[$type] = $data;
        return $this;
    }

    public function generateBreadcrumbs(array $breadcrumbs): array
    {
        return [
            "@context" => "https://schema.org",
            "@type" => "BreadcrumbList",
            "itemListElement" => array_map(function ($item, $index) {
                return [
                    "@type" => "ListItem",
                    "position" => $index + 1,
                    "name" => $item['name'],
                    "item" => $item['url'] ?? null
                ];
            }, $breadcrumbs, array_keys($breadcrumbs))
        ];
    }

    public function generateProductSchema(array $product): array
    {
        return [
            "@context" => "https://schema.org",
            "@type" => "Product",
            "name" => $product['name'],
            "description" => $product['description'] ?? '',
            "image" => $product['images'] ?? [],
            "sku" => $product['sku'] ?? '',
            "brand" => [
                "@type" => "Brand",
                "name" => $product['brand'] ?? config('app.name')
            ],
            "offers" => [
                "@type" => "Offer",
                "price" => $product['price'] ?? 0,
                "priceCurrency" => $product['currency'] ?? 'USD',
                "availability" => $product['in_stock'] ?
                    "https://schema.org/InStock" : "https://schema.org/OutOfStock",
                "url" => $product['url'] ?? '',
                "seller" => [
                    "@type" => "Organization",
                    "name" => config('app.name')
                ]
            ]
        ];
    }

    public function getMeta(): array
    {
        return $this->meta;
    }

    public function getStructuredData(): array
    {
        return $this->structuredData;
    }

    public function renderStructuredData(): string
    {
        $output = '';
        foreach ($this->structuredData as $data) {
            $output .= '<script type="application/ld+json">' . json_encode($data, JSON_UNESCAPED_SLASHES) . '</script>';
        }
        return $output;
    }
}
