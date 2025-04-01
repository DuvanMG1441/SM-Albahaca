@extends('layout.header')
@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="contenedor">
    <div class="text">
        <h1>Convierte cada cosecha en una experiencia.</h1>
        <h2>Monitorea, optimiza y cultiva con inteligencia</h2>
    </div>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="btn">Ingresar</button>
        </form>
        <p>¿No tienes cuenta? <a href="{{ route('registro') }}">Registrate Aqui</a></p>
    </div>
</div>

@endsection

@section('js')
   
@if (session('error') == 'Credenciales incorrectas.')
<script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Datos del usuario no encontrados",
                showConfirmButton: false,
                timer: 2000
                });
        </script>
@endif
    
@if (session('cierre') == 'Se ha cerrado la sesion correctamente')
        <script>
            Swal.fire({
                icon: "success",
                title: "Tu sesion se ha cerrado correctamente",
                showConfirmButton: false,
                timer: 2000
                });
        </script>
    @endif

    @if (session('registro') == 'Registro exitoso, ahora puedes iniciar sesión.')
        <script>
            Swal.fire({
                icon: "success",
                title: "Registro Exitoso",
                text: "Ahora puedes iniciar sesion",
                showConfirmButton: false,
                timer: 2000
                });
        </script>
    @endif

    @if (session('delete') == 'Tu cuenta ha sido eliminada correctamente.')
        <script>
            Swal.fire({
                icon: "success",
                title: "Cuenta Eliminada Correctamente",
                text: "Tus datos han sido eliminados",
                showConfirmButton: false,
                timer: 2000
                });
        </script>
    @endif           

@endsection


