<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Login</title>

    <script src="https://unpkg.com/@tabler/core@latest/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@latest/dist/css/tabler.min.css">
</head>
<body class="antialiased border-top-wide border-primary d-flex flex-column">
<div class="page page-center">
    <div class="container-tight py-4">
        <form class="card card-md" action="{{ route('login') }}" method="POST">
            @csrf

            <div class="card-body">
                <h2 class="card-title text-center mb-4">Faça login na sua conta</h2>
                <div class="mb-3">
                    <label class="form-label">Endereço de e-mail</label>
                    <input name="email" type="email" class="form-control" placeholder="Digite seu e-mail">
                </div>
                <div class="mb-2">
                    <label class="form-label">Senha<span class="form-label-description">
                </span>
                    </label>
                    <div class="input-group input-group-flat">
                        <input name="password" type="password" class="form-control" placeholder="Senha">

                    </div>
                </div>
                <div class="mb-2">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input"/>
                        <span class="form-check-label">Continuar conectado</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </div>
            </div>
        </form>

        @if ($errors->any())
            <div class="mt-3 alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="text-center text-muted mt-3">
            Ainda não tem uma conta? <a href="{{ route('register') }}" tabindex="-1">Inscreva-se</a>
        </div>
    </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
</body>
</html>