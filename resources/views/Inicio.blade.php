@extends('layout.header')
@section('content')
<link rel="stylesheet" href="{{ asset('css/inicio.css') }}">

<div class="view ">
    <aside class="sidebar">
        <div class="position-fixed">
            <h3>Menú</h3>
            <ul>
                <li><a href="#">Crear Proyecto</a></li>
                <li><a href="#">Ver Proyectos</a></li>
                <li><a href="#">Perfil</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn close-session">Cerrar Sesión</button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>

    <main class="content">
        <h2>Bienvenido, {{ Auth::user()->name }}</h2>
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
</div>
@endsection
