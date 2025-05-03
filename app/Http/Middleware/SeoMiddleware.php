<?php

namespace App\Http\Middleware;

use App\Services\SeoService;
use Closure;
use Illuminate\Http\Request;

class SeoMiddleware
{
    protected $seoService;

    public function __construct(SeoService $seoService)
    {
        $this->seoService = $seoService;
    }

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($response->isSuccessful()) {
            $content = $response->getContent();
            
            // Determina a página atual
            $page = $this->determinePage($request);
            
            // Gera as meta tags
            $metaTags = $this->seoService->generateMetaTags($page);
            
            // Insere as meta tags no head
            $content = $this->injectMetaTags($content, $metaTags);
            
            $response->setContent($content);
        }

        return $response;
    }

    protected function determinePage(Request $request)
    {
        $path = $request->path();
        
        if ($path === '/') {
            return 'home';
        }
        
        $pages = [
            'sobre' => 'about',
            'habilidades' => 'skills',
            'projetos' => 'projects',
            'contato' => 'contact',
        ];
        
        foreach ($pages as $route => $page) {
            if (strpos($path, $route) === 0) {
                return $page;
            }
        }
        
        return 'home';
    }

    protected function injectMetaTags($content, $metaTags)
    {
        // Procura pela tag </head>
        $headEnd = strpos($content, '</head>');
        
        if ($headEnd !== false) {
            // Remove as meta tags existentes
            $content = preg_replace('/<title>.*?<\/title>/s', '', $content);
            $content = preg_replace('/<meta[^>]+name=["\'](description|keywords|author)["\'][^>]*>/', '', $content);
            $content = preg_replace('/<meta[^>]+property=["\']og:[^"\']+["\'][^>]*>/', '', $content);
            $content = preg_replace('/<meta[^>]+name=["\']twitter:[^"\']+["\'][^>]*>/', '', $content);
            
            // Insere as novas meta tags antes do fechamento do head
            $content = substr_replace($content, $metaTags, $headEnd, 0);
        }
        
        return $content;
    }
} 