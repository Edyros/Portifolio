<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $dir = public_path('img/projects/whats4');
        $imagens = [];
        if (is_dir($dir)) {
            $files = glob($dir . '/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
            // Coloca a imagem principal primeiro, se existir
            usort($files, function($a, $b) {
                if (stripos(basename($a), 'principal') === 0) return -1;
                if (stripos(basename($b), 'principal') === 0) return 1;
                return strcmp($a, $b);
            });
            // Transforma em caminhos relativos para o asset()
            $imagens = array_map(function($file) {
                return 'img/projects/whats4/' . basename($file);
            }, $files);
        }
        return view('portfolio.index', compact('imagens'));
    }

    public function about()
    {
        return view('portfolio.about');
    }

    public function skills()
    {
        return view('portfolio.skills');
    }

    public function projects()
    {
        return view('portfolio.projects');
    }

    public function contact()
    {
        return view('portfolio.contact');
    }
} 