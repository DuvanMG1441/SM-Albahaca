@extends('layout.header')
@section('content')
<link rel="stylesheet" href="{{ asset('css/manual.css') }}">

<h1>Manual de Usuario</h1>
<h2>Introducción</h2>
<div class="introduccion">
    <p>Bienvenido al manual de usuario del sistema de monitoreo para cultivos de albahaca. Esta aplicación web ha sido diseñada para facilitar el seguimiento en tiempo real de parámetros clave como la temperatura, la humedad y el pH del suelo, con el objetivo de optimizar el crecimiento y la salud de la planta. A través de una interfaz intuitiva, los usuarios pueden registrarse, iniciar sesión, acceder a recomendaciones personalizadas y visualizar los datos recolectados por los sensores. Este manual le guiará paso a paso en el uso de todas las funcionalidades de la plataforma, asegurando una experiencia eficaz y productiva en el manejo de su cultivo. </p>
</div>


<div class="manual-contenedor">
    <h2>Registro de Usuario</h2>
    <div class="bloque">
        <div class="texto">
            <p>Para comenzar a utilizar la plataforma Eco Fértil, primero debes crear una cuenta.</p>
            <p>Accede a la página principal de la aplicación web y haz clic en la opción Registrarse y completa el formulario con la información correspondiente.</p>
            <p>Una vez completado el formulario, haz clic en el botón Registrarse. Asegúrate de ingresar datos correctos y recuerda guardar tu contraseña en un lugar seguro. Si ya tienes una cuenta, haz clic en iniciar sesión para acceder directamente a la pestaña de ingreso. </p>
        </div>
        <div class="imagen">
            <img src="{{ asset('imagenes/manual_registro.png') }}" alt="Fotos de la vista de registro">
        </div>
    </div>
    <hr>

    <h2>Inicio de Sesión</h2>
    <div class="bloque invertido">
        <div class="texto">
            <p>Para acceder a tu cuenta en la plataforma, dirígete a la página principal y selecciona la opción Iniciar Sesión. En el formulario, introduce tu correo electrónico y la contraseña que usaste durante el registro, luego haz clic en el botón Ingresar. Si aún no tienes una cuenta, puedes crear una fácilmente haciendo clic en el enlace Regístrate Aquí que aparece en la parte baja del formulario. </p>
        </div>
        <div class="imagen">
            <img src="{{ asset('imagenes/manual_inicio.png') }}" alt="Foto de vista de inicio de sesion">
        </div>
    </div>
    <hr>

     <h2>Menú Principal</h2>
    <div class="bloque">
        <div class="texto">
            <p>Una vez que inicies sesión en, accederás al menú principal, donde podrás navegar fácilmente por las diferentes secciones de la plataforma. En el panel lateral izquierdo encontrarás botones para ver tus proyectos, acceder a tu perfil y cerrar sesión. En el área central de la pantalla se presentan recomendaciones útiles para el cuidado de la albahaca, como proporcionar luz solar adecuada, mantener un riego constante y realizar podas regulares. Esta sección ofrece consejos visuales y prácticos que ayudan a mejorar el crecimiento y la salud de tu cultivo. </p>
        </div>
        <div class="imagen">
            <img src="{{ asset('imagenes/manual_menu.png') }}" alt="Fotos de la vista de registro">
        </div>
    </div>
    <hr>

    <h2>Cerrar Sesión</h2>
    <div class="bloque invertido">
        <div class="texto">
            <p>Para salir de tu cuenta, haz clic en el botón Cerrar Sesión ubicado en el menú lateral izquierdo. Al hacerlo, aparecerá una ventana emergente de confirmación preguntando si estás seguro de cerrar la sesión. Si deseas continuar, haz clic en Sí, Estoy Seguro; en caso contrario, selecciona Cancelar para permanecer en la plataforma. Esta medida ayuda a evitar cierres accidentales y protege tu información personal. </p>
        </div>
        <div class="imagen">
            <img src="{{ asset('imagenes/manual_cerrar.png') }}" alt="Foto de vista de inicio de sesion">
        </div>
    </div>
    <hr>

     <h2>Perfil de Usuario</h2>
    <div class="bloque">
        <div class="texto">
            <p>En la sección de configuración de usuario, los usuarios pueden actualizar fácilmente su información personal. Aquí es posible modificar el nombre completo, el correo electrónico y el número de teléfono directamente en los campos correspondientes. Recuerda ingresar tus datos correctamente. Además, si se desea cambiar la contraseña, basta con ingresar la contraseña actual y establecer una nueva antes de hacer clic en Guardar Cambios. Para quienes deseen cerrar su cuenta de forma definitiva, se encuentra disponible el botón Eliminar Cuenta, que debe utilizarse con precaución, ya que esta acción no se puede deshacer. </p>
        </div>
        <div class="imagen">
            <img src="{{ asset('imagenes/manual_perfil.png') }}" alt="Fotos de la vista de registro">
        </div>
    </div>
    <hr>

    <h2>Información del Proyecto</h2>
    <div class="bloque invertido">
        <div class="texto">
            <p>En esta sección, a la cual puedes acceder desde el menú ubicado en la parte superior derecha de la plataforma, encontrarás información detallada sobre los integrantes y desarrolladores del proyecto. Se presenta una descripción clara de quiénes conforman el equipo, intereses y motivaciones que impulsaron el desarrollo de esta herramienta. Además, se ofrece una visión general del propósito del proyecto, su origen, así como los objetivos específicos que busca alcanzar. Esta sección está pensada para brindar transparencia, contextualizar el desarrollo de la aplicación y permitir al usuario comprender mejor el enfoque y el impacto que se espera lograr. </p>
        </div>
        <div class="imagen">
            <img src="{{ asset('imagenes/manual_informacion.png') }}" alt="Foto de vista de inicio de sesion">
        </div>
    </div>
    <hr>

     <h2>Mis Macetas</h2>
    <div class="bloque">
        <div class="texto">
            <p>En la sección Ver Proyectos, los usuarios pueden visualizar y gestionar sus cultivos registrados de forma clara y organizada. Se presenta una tabla con información clave como el identificador del cultivo, su descripción, la fecha de inicio, fecha final (si aplica), el estado actual y un conjunto de acciones disponibles. Cada cultivo puede ser editado, eliminado o consultado en mayor detalle mediante botones específicos. Además, se incluye un formulario para crear nuevos cultivos, permitiendo al usuario ingresar una descripción, seleccionar la fecha de inicio y definir el estado del proyecto. Esta interfaz busca facilitar el seguimiento y administración de múltiples cultivos, brindando control total sobre cada etapa del proceso de monitoreo. </p>
        </div>
        <div class="imagen">
            <img src="{{ asset('imagenes/manual_macetas.png') }}" alt="Fotos de la vista de registro">
        </div>
    </div>
    <hr>

    <h2>Datos de las macetas</h2>
    <div class="bloque invertido">
        <div class="texto">
            <p>En la sección Ver Detalles de cada una de las materas registradas, podemos visualizar cada uno de los parámetros monitoreados, además con la descripción de cómo es el estado actual por medio de texto y de forma visual con colores. Color verde que es óptimo, amarillo que esta levemente fuera del rango adecuado, pero no es perjudicial para el cultivo y rojo que significa que el parámetro definitivamente no se encuentra en el rango adecuado y debe ser intervenido rápidamente.  En la parte inferior se pueden observar por medio de graficas el comportamiento histórico de los datos para así validar la eficacia del cultivo, de igual forma se representa de manera visual por medio de colores los rangos establecidos para cada uno de los parámetros. </p>
        </div>
        <div class="imagen">
            <img src="{{ asset('imagenes/manual_dato.png') }}" alt="Foto de vista de inicio de sesion">
        </div>
    </div>
    <hr>

</div>


@endsection

@section('js')

@endsection