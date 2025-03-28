@extends('layout.header')
@section('content')
<link rel="stylesheet" href="{{ asset('css/perfil.css') }}">

<div class="view ">
    <aside class="sidebar">
        <div class="position-fixed">
            <h3>Menú</h3>
            <ul>
                <li><a href="#">Ver Proyectos</a></li>
                <li><a href="/Perfil">Perfil</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="alert-logout">
                        @csrf
                        <button type="submit" class="logout-btn close-session ">Cerrar Sesión</button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>
    <main class="content">
    <h1>Hola, {{ Auth::user()->name }}</h1>
    <h2>Configuración de Usuario</h2>

    <div class="profile-container">
        <h2>Perfil de Usuario</h2>
        <form action="{{ route('perfil.actualizar') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group">
                    <label for="name">Nombre Completo</label>
                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}">
                </div>

                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="text" id="Telefono" name="Telefono" value="{{ Auth::user()->Telefono }}">
                </div>
            </div>

            <h3>Cambiar Contraseña</h3>

            <div class="form-row">
                <div class="form-group">
                    <label for="current-password">Contraseña Actual</label>
                    <input type="password" id="current-password" name="current_password">
                </div>

                <div class="form-group">
                    <label for="new-password">Nueva Contraseña</label>
                    <input type="password" id="new-password" name="new_password">
                </div>
            </div>

            <button type="submit" class="btn">Guardar Cambios</button>
        </form>
        <form action="{{ route('perfil.eliminar') }}" method="POST" class="delete_user">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar Cuenta</button>
        </form>
    </div>
</main>


    
    

@endsection

@section('js')

@if (session('success') == 'Perfil actualizado correctamente.')
<script>
            Swal.fire({
                icon: "success",
                title: "Datos Actualizados",
                text: "Tu información ha sido actualizada correctamente",
                showConfirmButton: false,
                timer: 2000
                });
        </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: "error",
            title: "Contraseña actual no válida",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif


<script>

    $('.alert-logout').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: "¿ESTAS SEGURO?",
            text: "Tu sesion se cerrara",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Estoy Seguro"
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            });
    })
</script>

<script>
    
    $('.delete_user').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: "¿ESTAS SEGURO?",
            text: "Tu cuenta se eliminara",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Estoy Seguro"
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            });
    })
</script>
@endsection