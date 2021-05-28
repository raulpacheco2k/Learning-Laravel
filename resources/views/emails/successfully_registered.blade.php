@component('emails.vendor.html.message')
# Cadastro realizado com sucesso!

Olá {{ $user->name }}, seu cadastro foi efetuado com sucesso.

@component('emails.vendor.html.button', ['url' => env('APP_URL')])
    Acesse sua conta
@endcomponent

@endcomponent