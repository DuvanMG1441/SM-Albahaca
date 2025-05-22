@extends('layout.header')
@section('content')
<link rel="stylesheet" href="{{ asset('css/inicio.css') }}">

<div class="view ">
    <aside class="sidebar">
        <div class="position-fixed">
            <h3>Menú</h3>
            <ul>
                <li><a href="/Proyecto">Mis Macetas</a></li>
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
        <h1>Bienvenido, {{ Auth::user()->name }}</h1>
        <h2>Configuración de usuario</h2>
    
    <div class="cards">
        <div class="card">
            <img src="{{ asset('imagenes/sol.png') }}" alt="Albahaca recibiendo luz" class="card-img">
            <h3>PROPORCIONA LUZ SOLAR</h3>
            <p>Coloca la albahaca en un lugar donde reciba al menos 6 horas de luz solar directa al día o usa luz artificial si estás en interiores.</p>
        </div>
        <div class="card">
            <img src="{{ asset('imagenes/riego.png') }}" alt="Regando albahaca" class="card-img">
            <h3>RIEGA CONSTANTEMENTE</h3>
            <p>Mantén la tierra húmeda pero sin encharcar. Riégala cuando la capa superior de la tierra esté seca al tacto.</p>
        </div>
        <div class="card">
            <img src="{{ asset('imagenes/poda.png') }}" alt="Podando albahaca" class="card-img">
            <h3>PODA REGULARMENTE</h3>
            <p>Recorta las hojas superiores para estimular el crecimiento y evitar que la planta florezca demasiado pronto.</p>
        </div>
    </div>
    </main>
</div>

@endsection

@section('js')

@if (session('login') == 'Se ha iniciado la sesion correctamente')
<script>
            Swal.fire({
                icon: "success",
                title: "Ingreso Exitoso",
                text: "Bienvenido a Eco Fertil",
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

@endsection