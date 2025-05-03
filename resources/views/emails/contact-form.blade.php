@component('mail::message')
# Nova mensagem do formulário de contato

> <span style="color: #3B82F6;">Mensagem enviada pelo Portfólio</span>

**Link do Portfólio:** [{{ config('app.url') }}]({{ config('app.url') }})

---

**Nome:** {{ $name }}  
**Email:** {{ $email }}

**Mensagem:**  
{{ $message }}

---

**Dados do Usuário:**
- **IP:** {{ $ip ?? 'Não informado' }}
- **Navegador:** {{ $user_agent ?? 'Não informado' }}
- **Data/Hora:** {{ $datetime ?? now()->format('d/m/Y H:i:s') }}

@component('mail::button', ['url' => 'mailto:' . $email])
Responder
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent 