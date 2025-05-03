@component('mail::message')
# Nova mensagem do formulário de contato

**Nome:** {{ $name }}  
**Email:** {{ $email }}

**Mensagem:**  
{{ $message }}

@component('mail::button', ['url' => 'mailto:' . $email])
Responder
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent 