@extends('layout.header')
@section('content')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
    
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
@endsection
