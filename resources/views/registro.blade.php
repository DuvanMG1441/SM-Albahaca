@extends('layout.header')
@section('content')

<link rel="stylesheet" href="{{ asset('css/registro.css') }}">
<div class="contenedor">
<div class="register-container">
        <h2>Crear Cuenta</h2>
        <form method="POST" action="{{ route('registro') }}">
            @csrf
            <div class="input-group">
                <label for="name">Nombre Completo</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="input-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="input-group">
                <label for="phone">Teléfono</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="input-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
            <button type="submit" class="btn">Registrarse</button>
        </form>
        <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>
    </div>
    <div class="text-container">
        <h1>Da el primer paso hacia un cultivo inteligente.</h1>
        <p></p>
        <h2>Regístrate y optimiza el crecimiento de tu albahaca con monitoreo avanzado</h2>
    </div>
</div>
@endsection
