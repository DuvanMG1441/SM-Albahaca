@extends('layout.header')
@section('content')
<link rel="stylesheet" href="{{ asset('css/proyecto.css') }}">

<div class="view ">
    <aside class="sidebar">
        <div class="position-fixed">
            <h3>Menú</h3>
            <ul>
                <li><a href="/Proyectos">Ver Proyectos</a></li>
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
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.dataset.id;
            const descripcion = button.dataset.descripcion;
            const fechaInicio = button.dataset.fechaInicio;
            const estado = button.dataset.estado;

            Swal.fire({
                title: 'Editar Cultivo',
                html:
                    `<form id="editForm" action="/proyectos/${id}/actualizar" method="POST">
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
                    Swal.fire({
                    icon: "success",
                    title: "Cultivo Modificado",
                    text: "La informacion de tu cultivo ha sido actualizada correctamente",
                    showConfirmButton: false,
                    timer: 5000
                    });
                }
            });
        });
    });
</script>


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
    
    $('.delete_cultivo').submit(function(e){
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