<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Obtém o idioma da sessão ou usa o padrão
        $locale = Session::get('locale', 'pt_BR');
        
        // Define o idioma da aplicação
        App::setLocale($locale);
        
        // Continua a requisição
        return $next($request);
    }
} 