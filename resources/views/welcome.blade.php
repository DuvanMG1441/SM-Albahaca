<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">


    </head>
    <body>
    <header>
    <img src="{{ asset('img/logo.png') }}" alt="EcoFertil Logo" class="logo"> EcoFertil
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Nosotros</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h2>Sistema de Monitoreo</h2>
            <p>Ayuda para tus cultivos de albahaca.</p>
            <a href="{{ route('login') }}" class="btn">Ingresa</a>
        </div>
    </section>

    <section class="features">
        <div class="feature">
            <h3>🌿 Fertilizantes Orgánicos</h3>
            <p>Mejora la calidad de tus cultivos con soluciones ecológicas.</p>
        </div>
        <div class="feature">
            <h3>🚜 Tecnología Sostenible</h3>
            <p>Optimiza el uso de recursos con innovación en la agricultura.</p>
        </div>
        <div class="feature">
            <h3>📈 Aumento de Producción</h3>
            <p>Resultados visibles con métodos eficientes y amigables con el medio ambiente.</p>
        </div>
    </section>

    <footer>
        <p>© 2025 EcoFertil. Todos los derechos reservados.</p>
    </footer>
    </body>
</html>
