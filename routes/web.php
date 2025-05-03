<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CurriculoController;

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::get('/sobre', [PortfolioController::class, 'about'])->name('about');
Route::get('/habilidades', [PortfolioController::class, 'skills'])->name('skills');
Route::get('/projetos', [PortfolioController::class, 'projects'])->name('projects');
Route::get('/contato', [PortfolioController::class, 'contact'])->name('contact');
Route::get('/curriculo', [CurriculoController::class, 'gerar'])->name('curriculo.pdf');

// Rota para processar o formulário de contato
Route::post('/contato', function (Request $request) {
    // Validação dos dados
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    // Aqui você pode adicionar a lógica para enviar o e-mail
    // Por exemplo, usando o Mail facade do Laravel

    return back()->with('success', 'Mensagem enviada com sucesso!');
});

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'pt_BR'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('language.switch');
