@extends('layout.header')
@section('content')
<link rel="stylesheet" href="{{ asset('css/acerca.css') }}">

<div class="container-info">
        <section class="autores">
            <div class="imagenes">
                <div>
                    <img src="{{ asset('imagenes/Duvan.jpg') }}" alt="Autor 1">
                    <p><strong>Duvan Monsalve</strong></p>
                </div>       
            </div>
            <div class="texto">
                <h2>Información de Autores</h2>
                <p>Estudiantes del programa <strong>Sistematización de Datos</strong> de la <strong>Universidad Distrital Francisco Jose de Caldas</strong>. Vinculados al grupo de investigación <strong>Metis</strong>. El en cual se realiza el desarrollo de proyecto del grado.</p>
            </div>
            <div class="imagenes">
                <div>
                    <img src="{{ asset('imagenes/Jimmy.jpg') }}" alt="Autor 2">
                    <p><strong>Jimmy Saavedra</strong></p>
                </div>
            </div>
        </section>

        <section class="descripcion">
            <h2>Descripción del Proyecto</h2>
            <p>Este proyecto busca desarrollar un sistema de monitoreo para cultivos de albahaca en macetas, utilizando un dispositivo con sensores que miden <strong>pH, temperatura y humedad </strong>. Los datos serán enviados a un servidor y almacenados en una base de datos, permitiendo a los usuarios acceder a ellos mediante un <strong>sitio web</strong>. A través de esta plataforma, se podrán visualizar métricas en tiempo real y recibir alertas para <strong>optimizar el crecimiento de la planta.</strong></p>
        </section>

        <section class="objetivos">
            <h2>Objetivos del Proyecto</h2>
            <p>
                <strong>1.</strong> Seleccionar y configurar <strong>sensores</strong> adecuados para la medición de <strong>temperatura, humedad y pH</strong> en el cultivo, asegurando su compatibilidad con el <strong>sistema IoT</strong> y su precisión en la toma de datos. 
                <br><br>
                <strong>2.</strong> Integrar un sistema de <strong>almacenamiento y análisis de datos</strong> que facilite el procesamiento y la interpretación de la información recopilada para la <strong>toma de decisiones</strong>. 
                <br><br>
                <strong>3.</strong> Establecer <strong>umbrales de referencia</strong> para <strong>temperatura, humedad y pH</strong>, definiendo <strong>alertas y notificaciones</strong> cuando estos parámetros se encuentren fuera de los rangos óptimos para el <strong>cultivo de albahaca</strong>. 
                <br><br>
                <strong>4.</strong> Validar el <strong>sistema de monitoreo</strong> en condiciones reales, realizando pruebas en el <strong>cultivo de albahaca</strong> y ajustando el sistema según los <strong>resultados obtenidos</strong>.
            </p>
        </section>
    </div>

@endsection

@section('js')

@endsection