<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Crie sua conta</title>
    <script src="https://unpkg.com/@tabler/core@latest/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@latest/dist/css/tabler.min.css">
</head>
<body class="antialiased border-top-wide border-primary d-flex flex-column">
<div class="page page-center">
    <div class="container-tight py-4">
        <form class="card card-md" action="{{ route('register') }}" method="POST">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body">
                <h2 class="card-title text-center mb-4">Crie sua conta</h2>
                <div class="mb-3">
                    <label class="form-label required">Nome</label>
                    <input name="name" type="text" class="form-control" placeholder="Digite seu nome">
                </div>
                <div class="mb-3">
                    <label class="form-label required">Endereço de e-mail</label>
                    <input name="email"  type="email" class="form-control" placeholder="Digite seu endereço de e-mail">
                </div>
                <div class="mb-3">
                    <label class="form-label required">Senha</label>
                    <input name="password" type="password" class="form-control" placeholder="Digite sua senha">
                </div>
                <div class="mb-3">
                    <label class="form-label required">Confirmação da senha</label>
                    <input name="password_confirmation" type="password" class="form-control"
                           placeholder="Digite sua senha novamente">
                </div>
                <div class="mb-3">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input"/>
                        <span class="form-check-label">Concordo com os <a href="#" tabindex="-1">termos e política de privacidade</a>.</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Criar conta</button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            Ja tem uma conta? <a href="{{ route('login') }}" tabindex="-1">Entrar</a>
        </div>
    </div>
</div>
</body>
</html>