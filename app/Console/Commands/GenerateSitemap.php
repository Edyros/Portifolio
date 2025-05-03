<?php

namespace App\Console\Commands;

use App\Services\SeoService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Gera o arquivo sitemap.xml';

    protected $seoService;

    public function __construct(SeoService $seoService)
    {
        parent::__construct();
        $this->seoService = $seoService;
    }

    public function handle()
    {
        $this->info('Gerando sitemap.xml...');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // Páginas estáticas
        $pages = [
            '/' => 'home',
            '/sobre' => 'about',
            '/habilidades' => 'skills',
            '/projetos' => 'projects',
            '/contato' => 'contact',
        ];

        foreach ($pages as $path => $page) {
            $url = url($path);
            $priority = $this->seoService->getPagePriority($page);
            $changefreq = $this->seoService->getPageChangeFreq($page);
            $lastmod = date('Y-m-d');

            $xml .= "    <url>\n";
            $xml .= "        <loc>{$url}</loc>\n";
            $xml .= "        <lastmod>{$lastmod}</lastmod>\n";
            $xml .= "        <changefreq>{$changefreq}</changefreq>\n";
            $xml .= "        <priority>{$priority}</priority>\n";
            $xml .= "    </url>\n";
        }

        $xml .= '</urlset>';

        // Salva o arquivo
        $path = public_path('sitemap.xml');
        File::put($path, $xml);

        $this->info('Sitemap gerado com sucesso em: ' . $path);
    }
} 