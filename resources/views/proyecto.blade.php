@extends('layout.header')
@section('content')
<link rel="stylesheet" href="{{ asset('css/proyecto.css') }}">

<div class="view ">
    <aside class="sidebar">
        <div class="position-fixed">
            <h3>Menú</h3>
            <ul>
                <li><a href="/Proyectos">Mis Macetas</a></li>
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

    <div class="container">
        <h2>Lista de Cultivos</h2>
        <table>
            <thead>
                <tr>
                    <th>Cultivo</th>
                    <th>Descripción</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha Final</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cultivos as $cultivo)
                <tr>
                    <td>{{ $cultivo->Id_cultivo }}</td>
                    <td>{{ $cultivo->Descripcion }}</td>
                    <td>{{ $cultivo->Fecha_inicio }}</td>
                    <td>{{ $cultivo->Fecha_Final ?? 'No definida' }}</td>
                    <td>{{ $cultivo->Estado }}</td>
                    <td>
                        <button type="button"
                            class="btn btn-edit edit-btn"
                            data-id="{{ $cultivo->Id_cultivo }}"
                            data-descripcion="{{ $cultivo->Descripcion }}"
                            data-fecha-inicio="{{ $cultivo->Fecha_inicio }}"
                            data-estado="{{ $cultivo->Estado }}">
                            Editar
                        </button>
                        <form class="delete_cultivo" action="{{ route('proyecto.eliminar', $cultivo->Id_cultivo) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Eliminar</button>
                        </form>
                        <button type="button" class="btn btn-detail" onclick=" showDetailsUltimo('{{ $cultivo->Id_cultivo}}', '{{ $cultivo->Id_descripcion}}'), grafica('{{ $cultivo->Id_cultivo}}', '{{ $cultivo->Id_descripcion}}')">
                            Ver Detalles
                        </button>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

        <div id="cultivo-details" style="display: none; padding: 20px; margin-top: 20px; border: 1px solid #ccc; border-radius: 8px;">
            <h2 id="detalle-descripcion" style="text-align:center; margin-bottom:20px;"></h2>

            <div id="estado-monitoreo"></div>

            <table style="width: 100%; border-collapse: collapse; margin-top: 20px; display: none;">
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th style="padding: 10px; border: 1px solid #ddd;">pH</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">Temperatura</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">Humedad</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">Fecha</th>
                    </tr>
                </thead>
                <tbody id="detalle-tabla">
                </tbody>
            </table>

            <div style="display: flex; justify-content: center; gap: 50px; margin-top: 40px;">


                <div class="bloque-medicion">
                    <h1>Temperatura (°C)</h1>
                    <div id="circulo-temperatura" class="circulo">
                        <span id="valor-temperatura" class="valor">--</span>
                    </div>
                    <div class="rango">
                        <p>Rango Adecuado: 23 °C a 26 °C</p>
                    </div>
                    <p id="mensaje-temperatura" class="mensaje-indicador"></p>
                </div>

                <div class="bloque-medicion">
                    <h1>PH</h1>
                    <div id="circulo-ph" class="circulo">
                        <span id="valor-ph" class="valor">--</span>
                    </div>
                    <div class="rango">
                        <p>Rango Adecuado: 6.0 a 7.5</p>
                    </div>
                    <p id="mensaje-ph" class="mensaje-indicador"></p>
                </div>

                <div class="bloque-medicion">
                    <h1>Humedad (%)</h1>
                    <div id="circulo-humedad" class="circulo">
                        <span id="valor-humedad" class="valor">--</span>
                    </div>
                    <div class="rango">
                        <p>Rango Adecuado: 50% a 70%</p>
                    </div>
                    <p id="mensaje-humedad" class="mensaje-indicador"></p>
                </div>

            </div>
            <div class="grafica">
                <h1> Detalles del pH </h1>
                <div id="grafica-ph" style="max-width: 700px; margin: 30px auto;"></div>
                <h1> Detalles de la humedad </h1>
                <div id="grafica-humedad" style="max-width: 700px; margin: 30px auto;"></div>
                <h1> Detalles de la temperatura </h1>
                <div id="grafica-temperatura" style="max-width: 700px; margin: 30px auto;"></div>
            </div>
        </div>

        <h2>Crear nuevo cultivo</h2>
        <form action="{{ route('cultivo.guardar') }}" method="POST">
            @csrf
            <table>
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Fecha de Inicio</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="Descripcion" required></td>
                        <td><input type="date" value="{{ now()->format('Y-m-d') }}" readonly></td>
                        <td>
                            <select name="Estado" required>
                                <option value="Activo" selected>Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-save">Guardar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

    </div>
    @endsection

    @section('js')

    <script>
        function grafica(id, descripcion) {
            document.getElementById('valor-ph').textContent = "--";
            document.getElementById('valor-temperatura').textContent = "--";
            document.getElementById('valor-humedad').textContent = "--";
            document.getElementById('cultivo-details').style.display = 'block';
            document.getElementById('detalle-descripcion').textContent = descripcion;

            const tabla = document.getElementById('detalle-tabla');
            tabla.innerHTML = '';

            // Limpiar gráficas anteriores
            document.querySelector("#grafica-ph").innerHTML = "";
            document.querySelector("#grafica-humedad").innerHTML = "";
            document.querySelector("#grafica-temperatura").innerHTML = "";

            fetch(`/cultivo/${id}/datos`)
                .then(response => response.json())
                .then(data => {
                    const datosPH = [];
                    const datosHumedad = [];
                    const datosTemperatura = [];
                    const fechas = [];

                    data.datos.forEach(dato => {
                        datosPH.push(dato.ph);
                        datosHumedad.push(dato.humedad);
                        datosTemperatura.push(dato.temperatura);
                        fechas.push(dato.fecha);

                        const fila = `<tr>
                    <td>${dato.ph}</td>
                    <td>${dato.temperatura}</td>
                    <td>${dato.humedad}</td>
                    <td>${dato.fecha}</td>
                </tr>`;
                        tabla.innerHTML += fila;
                    });

                    const optionsPH = {
                        chart: {
                            type: 'line',
                            height: 350,
                            toolbar: {
                                show: false
                            }
                        },
                        series: [{
                            name: 'pH',
                            data: datosPH
                        }],
                        xaxis: {
                            categories: fechas,
                            title: {
                                text: 'Fecha'
                            }
                        },
                        yaxis: {
                            title: {
                                text: 'pH'
                            },
                            min: 0,
                            max: 10
                        },
                        colors: ['#047365'],
                        markers: {
                            size: 5
                        },
                        annotations: {
                            yaxis: [{
                                    y: 5.5,
                                    y2: 6.0,
                                    borderColor: '#FDD835',
                                    fillColor: '#FFF59D',
                                    opacity: 0.4
                                },
                                {
                                    y: 6.0,
                                    y2: 7.5,
                                    borderColor: '#00E396',
                                    fillColor: '#b5f5d1',
                                    opacity: 0.4
                                },
                                {
                                    y: 7.5,
                                    y2: 8.0,
                                    borderColor: '#FDD835',
                                    fillColor: '#FFF59D',
                                    opacity: 0.4
                                }
                            ]
                        }
                    };

                    // Configuración de la gráfica de Humedad
                    const optionsHumedad = {
                        chart: {
                            type: 'line',
                            height: 350,
                            toolbar: {
                                show: false
                            }
                        },
                        series: [{
                            name: 'Humedad (%)',
                            data: datosHumedad
                        }],
                        xaxis: {
                            categories: fechas,
                            title: {
                                text: 'Fecha'
                            }
                        },
                        yaxis: {
                            title: {
                                text: 'Humedad (%)'
                            },
                            min: 0,
                            max: 100
                        },
                        colors: ['#2196F3'],
                        markers: {
                            size: 5
                        },
                        annotations: {
                            yaxis: [{
                                    y: 40,
                                    y2: 50,
                                    borderColor: '#FDD835',
                                    fillColor: '#FFF59D',
                                    opacity: 0.4
                                },
                                {
                                    y: 50,
                                    y2: 70,
                                    borderColor: '#00E396',
                                    fillColor: '#b5f5d1',
                                    opacity: 0.4
                                },
                                {
                                    y: 70,
                                    y2: 80,
                                    borderColor: '#FDD835',
                                    fillColor: '#FFF59D',
                                    opacity: 0.4
                                }
                            ]
                        }
                    };

                    // Configuración de la gráfica de Temperatura
                    const optionsTemperatura = {
                        chart: {
                            type: 'line',
                            height: 350,
                            toolbar: {
                                show: false
                            }
                        },
                        series: [{
                            name: 'Temperatura (°C)',
                            data: datosTemperatura
                        }],
                        xaxis: {
                            categories: fechas,
                            title: {
                                text: 'Fecha'
                            }
                        },
                        yaxis: {
                            title: {
                                text: 'Temperatura (°C)'
                            },
                            min: 0,
                            max: 50
                        },
                        colors: ['#FF5722'], // Naranja temperatura
                        markers: {
                            size: 5
                        },
                        annotations: {
                            yaxis: [{
                                    y: 17,
                                    y2: 20,
                                    borderColor: '#FDD835',
                                    fillColor: '#FFF59D',
                                    opacity: 0.4
                                },
                                {
                                    y: 20,
                                    y2: 26,
                                    borderColor: '#00E396',
                                    fillColor: '#b5f5d1',
                                    opacity: 0.4
                                },
                                {
                                    y: 26,
                                    y2: 29,
                                    borderColor: '#FDD835',
                                    fillColor: '#FFF59D',
                                    opacity: 0.4
                                }
                            ]
                        }
                    };

                    // Renderizar gráficas
                    new ApexCharts(document.querySelector("#grafica-ph"), optionsPH).render();
                    new ApexCharts(document.querySelector("#grafica-humedad"), optionsHumedad).render();
                    new ApexCharts(document.querySelector("#grafica-temperatura"), optionsTemperatura).render();

                })
                .catch(error => {
                    console.error('Error al obtener los datos:', error);
                });
        }
    </script>



    <script>
        function showDetailsUltimo(id, descripcion) {
            document.getElementById('valor-ph').textContent = "--";
            document.getElementById('valor-temperatura').textContent = "--";
            document.getElementById('valor-humedad').textContent = "--";

            document.getElementById('mensaje-ph').textContent = "";
            document.getElementById('mensaje-temperatura').textContent = "";
            document.getElementById('mensaje-humedad').textContent = "";

            document.getElementById('cultivo-details').style.display = 'block';
            document.getElementById('detalle-descripcion').textContent = descripcion;

            const estado = document.querySelector(`[data-id='${id}']`).getAttribute('data-estado');

            const estadoHtml = (estado === "Activo") ?
                '<h2 class="btn-state-asset">MONITOREO ACTIVO</h2>' :
                '<h2 class="btn-state-idle">MONITOREO INACTIVO</h2>';

            document.getElementById('estado-monitoreo').innerHTML = estadoHtml;

            const tabla = document.getElementById('detalle-tabla');
            tabla.innerHTML = '';

            fetch(`/cultivo/${id}/ultimo-dato`)
                .then(response => response.json())
                .then(data => {
                    if (data.dato) {
                        const dato = data.dato;

                        const fila = `<tr>
                        <td>${dato.ph}</td>
                        <td>${dato.temperatura}</td>
                        <td>${dato.humedad}</td>
                        <td>${dato.fecha}</td>
                    </tr>`;

                        tabla.innerHTML = fila;

                        document.getElementById('valor-ph').textContent = dato.ph;
                        document.getElementById('valor-temperatura').textContent = dato.temperatura;
                        document.getElementById('valor-humedad').textContent = dato.humedad;

                        validarIndicador('ph', dato.ph, 6.0, 7.5);
                        validarIndicador('temperatura', dato.temperatura, 23, 26);
                        validarIndicador('humedad', dato.humedad, 50, 70);
                    } else {
                        tabla.innerHTML = '<tr><td colspan="4">No hay datos disponibles.</td></tr>';
                    }
                })
                .catch(error => {
                    console.error('Error al obtener el último dato:', error);
                });
        }

        function validarIndicador(tipo, valor, min, max) {
            const margen = 2;

            const circulo = document.getElementById(`circulo-${tipo}`);
            const mensaje = document.getElementById(`mensaje-${tipo}`);

            let color = 'gray';
            let texto = 'Sin datos.';

            if (valor >= min && valor <= max) {
                color = 'green';
                texto = `Tu ${tipo} es el adecuado.`;
            } else if ((valor >= min - margen && valor < min) || (valor > max && valor <= max + margen)) {
                color = 'orange';
                texto = `Tu ${tipo} está ligeramente fuera del rango óptimo.`;
            } else {
                color = 'red';
                texto = `Tu ${tipo} está fuera del rango adecuado.`;
            }

            circulo.style.borderColor = color;
            mensaje.textContent = texto;
        }
    </script>


    <script>
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.dataset.id;
                const descripcion = button.dataset.descripcion;
                const fechaInicio = button.dataset.fechaInicio;
                const estado = button.dataset.estado;

                Swal.fire({
                    title: 'Editar Cultivo',
                    html: `<form id="editForm" action="/proyectos/${id}/actualizar" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label>Descripción</label><br>
                        <input type="text" id="swal-descripcion" name="Descripcion" value="${descripcion}" class="swal2-input" required><br>
                        <br><label>Estado</label><br><br>   
                        <select name="Estado" id="swal-estado" class="swal2-input">
                            <option value="Activo" ${estado === 'Activo' ? 'selected' : ''}>Activo</option>
                            <option value="Inactivo" ${estado === 'Inactivo' ? 'selected' : ''}>Inactivo</option>
                        </select>
                    </form>`,
                    showCancelButton: true,
                    confirmButtonText: 'Guardar Cambios',
                    cancelButtonText: 'Cancelar',
                    customClass: {
                        confirmButton: 'my-confirm-btn',
                        cancelButton: 'my-cancel-btn'
                    },
                    buttonsStyling: false,
                    preConfirm: () => {
                        document.getElementById('editForm').submit();
                    }
                });
            });
        });
    </script>

@if (session('success'))
<script>
    
        Swal.fire({
            icon: "success",
            title: '¡Éxito!',
            text: "{{ session('success') }}",
            timer: 5000,
            showConfirmButton: false
        });
</script>
@endif
    @if(session('error'))
<script>
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "{{ session('error') }}",
            timer: 5000,
            showConfirmButton: false
        });
</script>
@endif

    @if (session('success') == 'Cultivo agregado correctamente.')
    <script>
        Swal.fire({
            icon: "success",
            title: "Cultivo creado",
            text: "La informacion de tu cultivo ha sido guardada correctamente",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
    @endif

    @if (session('success') == 'Cultivo eliminado correctamente.')
    <script>
        Swal.fire({
            icon: "success",
            title: "Cultivo Eliminado",
            text: "La información del cultivo se elimino correctamente",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
    @endif


    <script>
        $('.alert-logout').submit(function(e) {
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
        $('.delete_cultivo').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: "¿ESTAS SEGURO?",
                text: "Tu cultivo se eliminara",
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