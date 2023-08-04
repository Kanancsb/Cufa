<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/style.css">

    </head>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('addFamiliar').addEventListener('click', function() {
                // Clonar a seção de dados familiares
                var dadosFamiliares = document.querySelector('#dadosFamiliares');
                var clone = dadosFamiliares.cloneNode(true);

                // Adicionar um sufixo numérico único aos campos clonados
                var inputs = clone.querySelectorAll('input, select');
                inputs.forEach(function(input) {
                    input.name = input.name + '_extra[]';
                });

                // Limpar os valores dos campos clonados
                inputs.forEach(function(input) {
                    input.value = '';
                });

                // Adicionar o clone ao formulário
                dadosFamiliares.after(clone);
                });
            });
        </script>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/Cufa.png" alt="">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="/Noticias/TodasNoticias" class="nav-link">Noticias</a>
                        </li>
                        <li class="nav-item">
                            <a href="/secundarios/Sobre" class="nav-link">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a href="/secundarios/DoacaoInstitucional" class="nav-link">Doação Institucional</a>
                        </li>
                        <li class="nav-item">
                            <a href="/" class="nav-link">Contato</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="/Formularios/CompFamiliar" class="nav-link">Formulario</a>
                        </li>
                        @endguest
                        @auth
                        
                        <li class="nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                            </form>
                        </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </header>

        @yield('content')

        <footer>
            <p>Cufa Frederico Westphalen &copy; 2023</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        
    </body>
</html>
