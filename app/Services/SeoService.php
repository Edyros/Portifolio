<?php

namespace App\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class SeoService
{
    protected $config;

    public function __construct()
    {
        $this->config = Config::get('seo');
    }

    public function getMetaTags($page = 'home')
    {
        $default = $this->config['default'];
        $pageConfig = $this->config['pages'][$page] ?? [];

        return [
            'title' => $pageConfig['title'] ?? $default['title'],
            'description' => $pageConfig['description'] ?? $default['description'],
            'keywords' => $pageConfig['keywords'] ?? $default['keywords'],
            'author' => $default['author'],
            'image' => $default['image'],
            'type' => $default['type'],
            'locale' => $default['locale'],
            'site_name' => $default['site_name'],
        ];
    }

    public function getStructuredData($type = 'person')
    {
        return $this->config['structured_data'][$type] ?? null;
    }

    public function generateStructuredDataJson($type = 'person')
    {
        $data = $this->getStructuredData($type);
        if (!$data) {
            return null;
        }

        return json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function getSocialLinks()
    {
        return $this->config['social'];
    }

    public function getPagePriority($page)
    {
        return $this->config['sitemap']['priority'][$page] ?? 0.5;
    }

    public function getPageChangeFreq($page)
    {
        return $this->config['sitemap']['changefreq'][$page] ?? 'monthly';
    }

    public function generateMetaTags($page = 'home')
    {
        $meta = $this->getMetaTags($page);
        $social = $this->getSocialLinks();
        $structuredData = $this->generateStructuredDataJson();
        $currentUrl = url()->current();

        // Escapa os valores para HTML
        $title = htmlspecialchars($meta['title'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($meta['description'], ENT_QUOTES, 'UTF-8');
        $keywords = htmlspecialchars($meta['keywords'], ENT_QUOTES, 'UTF-8');
        $author = htmlspecialchars($meta['author'], ENT_QUOTES, 'UTF-8');
        $image = htmlspecialchars(asset($meta['image']), ENT_QUOTES, 'UTF-8');
        $siteName = htmlspecialchars($meta['site_name'], ENT_QUOTES, 'UTF-8');

        $tags = [
            // Meta Tags Básicas
            "<title>{$title}</title>",
            "<meta name=\"description\" content=\"{$description}\">",
            "<meta name=\"keywords\" content=\"{$keywords}\">",
            "<meta name=\"author\" content=\"{$author}\">",
            
            // Open Graph
            "<meta property=\"og:type\" content=\"{$meta['type']}\">",
            "<meta property=\"og:title\" content=\"{$title}\">",
            "<meta property=\"og:description\" content=\"{$description}\">",
            "<meta property=\"og:image\" content=\"{$image}\">",
            "<meta property=\"og:url\" content=\"{$currentUrl}\">",
            "<meta property=\"og:site_name\" content=\"{$siteName}\">",
            "<meta property=\"og:locale\" content=\"{$meta['locale']}\">",
            
            // Twitter
            "<meta name=\"twitter:card\" content=\"summary_large_image\">",
            "<meta name=\"twitter:site\" content=\"{$social['twitter']}\">",
            "<meta name=\"twitter:title\" content=\"{$title}\">",
            "<meta name=\"twitter:description\" content=\"{$description}\">",
            "<meta name=\"twitter:image\" content=\"{$image}\">",
        ];

        if ($structuredData) {
            $tags[] = "<script type=\"application/ld+json\">{$structuredData}</script>";
        }

        return implode("\n", $tags);
    }
} 