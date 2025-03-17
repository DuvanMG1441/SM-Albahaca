<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - EcoFertil</title>
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
</head>
<body>
    <header>
        <h1>EcoFertil</h1>
        <nav>
            <a href="#">Inicio</a>
            <a href="#">Acerca</a>
            <a href="#">Contacto</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Cerrar Sesión</button>
            </form>
        </nav>
    </header>

    <main class="container">
        <h2>Bienvenido {{ Auth::user()->name }}</h2>
        <div class="cards">
            <div class="card">
                <h3>Configuración del Perfil</h3>
                <p>Administra tu información personal y preferencias.</p>
                <a href="#">Ir a Configuración</a>
            </div>
            <div class="card">
                <h3>Ver Cultivos</h3>
                <p>Consulta el estado de tus cultivos en tiempo real.</p>
                <a href="#">Ver Cultivos</a>
            </div>
            <div class="card">
                <h3>Manual de Uso</h3>
                <p>Aprende cómo usar la plataforma con nuestra guía.</p>
                <a href="#">Leer Manual</a>
            </div>
        </div>
    </main>
</body>
</html>
