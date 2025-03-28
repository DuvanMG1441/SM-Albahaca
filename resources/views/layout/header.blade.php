<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco Fertil </title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .yield {
            margin-top: 86px;
        }  
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <img src="{{ asset('Imagenes/Logo SM.png') }}" alt="Logo" class="rounded-circle" style="width: 70px; height: 70px;">
        <a class="navbar-brand ms-2 fs-3 text-white bold ms-3" href="/">EcoFertil</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav w-100 justify-content-end" >
                <li class="nav-item me-5">
                    <a class="nav-link active fs-4 text-white" aria-current="page" href="/">Inicio</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link fs-4 text-white" href="#">Mis Proyectos</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link fs-4 text-white" href="#">Manual</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link fs-4 text-white" href="/AcercaDe">Acerca De</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="yield ">  
    @yield('content')
</div>

<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3 text-center text-md-start">
                <img src="{{ asset('Imagenes/Logo SM.png') }}" alt="Logo" class="rounded-circle" style="width: 115px; height: 115px;">
            </div>
            <div class="col-md-6 text-center">
                <p class="mb-1">&copy; 2025 EcoFertil. Todos los derechos reservados.</p>
                <p><strong>Duvan Monsalve</strong> & <strong>Jimmy Saavedra</strong></p>
                <p class="mb-1"><strong>Universidad Distrital Francisco José de Caldas</strong></p>
            </div>

            <div class="col-md-3 text-center text-md-end">
                <p class="mb-1">📧 Email: contacto@ecofertil.com</p>
                <p class="mb-0">📞 Teléfono: +57 300 123 4567</p>
            </div>
        </div>
    </div>
</footer>

@yield('js')

</body>
</html>