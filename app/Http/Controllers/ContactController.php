<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Adiciona dados úteis do usuário
        $validated['ip'] = $request->ip();
        $validated['user_agent'] = $request->header('User-Agent');
        $validated['datetime'] = now()->format('d/m/Y H:i:s');

        try {
            Mail::to(config('mail.from.address'))->send(new ContactFormMail($validated));

            return back()->with('success', 'Mensagem enviada com sucesso! Entrarei em contato em breve.');
        } catch (\Exception $e) {
            return back()->with('error', 'Ocorreu um erro ao enviar a mensagem. Por favor, tente novamente mais tarde.');
        }
    }
} 