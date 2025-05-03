<?php

namespace App\Console\Commands;

use App\Services\SeoService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CheckSeo extends Command
{
    protected $signature = 'seo:check';
    protected $description = 'Verifica o SEO do site';

    protected $seoService;

    public function __construct(SeoService $seoService)
    {
        parent::__construct();
        $this->seoService = $seoService;
    }

    public function handle()
    {
        $this->info('Verificando SEO do site...');

        $pages = [
            '/' => 'home',
            '/sobre' => 'about',
            '/habilidades' => 'skills',
            '/projetos' => 'projects',
            '/contato' => 'contact',
        ];

        foreach ($pages as $path => $page) {
            $url = url($path);
            $this->checkPage($url, $page);
        }

        $this->info('Verificação de SEO concluída!');
    }

    protected function checkPage($url, $page)
    {
        $this->info("\nVerificando página: {$url}");

        try {
            // Configura o cliente HTTP para ignorar erros SSL em ambiente local
            $client = Http::withOptions([
                'verify' => false,
                'timeout' => 30,
            ]);

            $response = $client->get($url);
            $content = $response->body();

            // Verifica meta tags
            $this->checkMetaTags($content, $page);

            // Verifica estrutura HTML
            $this->checkHtmlStructure($content);

            // Verifica performance
            $this->checkPerformance($url);

        } catch (\Exception $e) {
            $this->error("Erro ao verificar {$url}: " . $e->getMessage());
        }
    }

    protected function checkMetaTags($content, $page)
    {
        $meta = $this->seoService->getMetaTags($page);

        // Verifica title
        if (strpos($content, '<title>' . $meta['title'] . '</title>') === false) {
            $this->warn("Title não encontrado ou incorreto para a página {$page}");
        }

        // Verifica description
        if (strpos($content, 'name="description" content="' . $meta['description'] . '"') === false) {
            $this->warn("Meta description não encontrada ou incorreta para a página {$page}");
        }

        // Verifica keywords
        if (strpos($content, 'name="keywords" content="' . $meta['keywords'] . '"') === false) {
            $this->warn("Meta keywords não encontradas ou incorretas para a página {$page}");
        }

        // Verifica Open Graph
        $ogTags = [
            'og:title',
            'og:description',
            'og:image',
            'og:url',
            'og:type',
        ];

        foreach ($ogTags as $tag) {
            if (strpos($content, 'property="' . $tag . '"') === false) {
                $this->warn("Tag Open Graph {$tag} não encontrada para a página {$page}");
            }
        }
    }

    protected function checkHtmlStructure($content)
    {
        // Verifica se há apenas um h1
        $h1Count = substr_count($content, '<h1');
        if ($h1Count !== 1) {
            $this->warn("A página deve ter exatamente um h1. Encontrados: {$h1Count}");
        }

        // Verifica se há imagens com alt
        $imgCount = substr_count($content, '<img');
        $imgWithAltCount = substr_count($content, '<img') - substr_count($content, '<img alt=""') - substr_count($content, '<img alt=\'\'');
        if ($imgCount > 0 && $imgWithAltCount < $imgCount) {
            $this->warn("Algumas imagens não possuem atributo alt");
        }

        // Verifica se há links com rel="noopener"
        $linkCount = substr_count($content, '<a href="http');
        $linkWithNoopenerCount = substr_count($content, 'rel="noopener"');
        if ($linkCount > 0 && $linkWithNoopenerCount < $linkCount) {
            $this->warn("Alguns links externos não possuem rel=\"noopener\"");
        }
    }

    protected function checkPerformance($url)
    {
        try {
            $client = Http::withOptions([
                'verify' => false,
                'timeout' => 30,
            ]);

            $response = $client->get($url);
            $loadTime = $response->transferStats->getTransferTime();
            
            if ($loadTime > 2) {
                $this->warn("Tempo de carregamento alto: {$loadTime} segundos");
            } else {
                $this->info("Tempo de carregamento bom: {$loadTime} segundos");
            }
        } catch (\Exception $e) {
            $this->error("Erro ao verificar performance: " . $e->getMessage());
        }
    }
} 