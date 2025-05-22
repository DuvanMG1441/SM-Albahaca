@extends('layout.header')
@section('content')
<link rel="stylesheet" href="{{ asset('css/enlace.css') }}">

<h1>Enlaces de Interes</h1>
<div class="introduccion">
    <p>Expande tu conocimiento sobre cultivo de albahaca y sistemas de monitoreo IoT</p>
</div>

<div class="videos-section">
    <div class="video-card">
        <iframe width="100%" height="250" src="https://www.youtube.com/watch?v=CMPmcX7gX7M" frameborder="0" allowfullscreen></iframe>
        <p>Cultivo de Albahaca - Siembra y cuidados</p>
    </div>
    <div class="video-card">
        <iframe width="100%" height="250" src="https://www.youtube.com/watch?v=BU77lTxF5KY" frameborder="0" allowfullscreen></iframe>
        <p>IoT en la Agricultura</p>
    </div>
</div>

<h2>Documentos relacionados</h2>
<table class="document-table">
    <thead>
        <tr>
            <th>Nombre del documento</th>
            <th>Enlace</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Diseño y desarrollo de un sistema de monitoreo de humedad y temperatura para huertas en zonas urbanas de Bogotá</td>
            <td><a href="https://repository.universidadean.edu.co/server/api/core/bitstreams/d2012751-810b-4dc7-8ff0-5ae707f2fd59/content" target="_blank">Ver documento</a></td>
        </tr>
        <tr>
            <td>Sistema de adquisición y control de lisímetro de pesada en maceta con Arduino</td>
            <td><a href="https://scholar.google.com/scholar?lookup=0&q=Sistema+de+adquisici%C3%B3n+y+control+de+lis%C3%ADmetro+de+pesada+en+maceta+con+Arduino&hl=es&as_sdt=0,5" target="_blank">Ver documento</a></td>
        </tr>
        <tr>
            <td>Desarrollo de una red de sensores para monitoreo de macronutrientes primarios para cultivo de café aplicado a un caso de estudio en Tecnicafé</td>
            <td><a href="https://repositorio.uniautonoma.edu.co/handle/123456789/661" target="_blank">Ver documento</a></td>
        </tr>
        <tr>
            <td>Aplicación de IoT en el proceso de fertilización de mandarinas mediante un sistema de red de sensores</td>
            <td><a href="https://repositorio.usil.edu.pe/items/0d4d3d91-24a3-446c-8400-29ef9f8a7489" target="_blank">Ver documento</a></td>
        </tr>
         <tr>
            <td>Sistema de riego automatizado para mejorar la productividad en cultivos de tomates en casa</td>
            <td><a href="https://repositorio.unicordoba.edu.co/entities/publication/df16e807-7297-4154-ac9b-630d48e03c7e" target="_blank">Ver documento</a></td>
        </tr>
        <tr>
            <td>Red de sensores inalámbricos para el monitoreo de variables agroecológicas en cultivos bajo invernadero​​</td>
            <td><a href="https://hemeroteca.unad.edu.co/index.php/publicaciones-e-investigacion/article/view/2781" target="_blank">Ver documento</a></td>
        </tr>
        <tr>
            <td>Adquisición de datos para el monitoreo remoto de variables de un cultivo vertical a través de una plataforma IoT​</td>
            <td><a href="https://scholar.google.com/scholar?cluster=12306076852762732875&hl=es&as_sdt=2005&sciodt=0,5" target="_blank">Ver documento</a></td>
        </tr>
        <tr>
            <td>Diseño e implementación de prototipo de un sistema IoT para el monitoreo y control de cultivo de arándanos mediante redes neuronales en la finca San José – La Libertad​</td>
            <td><a href="https://alicia.concytec.gob.pe/vufind/Record/UTPD_6cc600657b7a19af4b06097f6462e1bd" target="_blank">Ver documento</a></td>
        </tr>
        <tr>
            <td>Diseño e implementación de un sistema de adquisición y registro de señales e imágenes con tecnología IoT para el seguimiento de las condiciones de cultivos hidropónicos de lechuga​</td>
            <td><a href="https://scholar.google.com/scholar?hl=es&as_sdt=0%2C5&q=Dise%C3%B1o+e+implementaci%C3%B3n+de+un+sistema+de+adquisici%C3%B3n+y+registro+de+se%C3%B1ales+e+im%C3%A1genes+con+tecnolog%C3%ADa+IoT+para+el+seguimiento+de+las+condiciones+de+cultivos+hidrop%C3%B3nicos+de+lechuga&btnG=" target="_blank">Ver documento</a></td>
        </tr>
        <tr>
            <td>Desarrollo de un Sistema de monitorización y control de un invernadero aplicando Tecnología IoT​</td>
            <td><a href="https://repositorio.unican.es/xmlui/bitstream/handle/10902/15758/415207.pdf?sequence=1" target="_blank">Ver documento</a></td>
        </tr>
        <tr>
            <td>Diseño de investigación de un sistema electrónico mediante el uso de tecnologías de IoT para el monitoreo remoto de pH en agua de solución de nutrientes en un sistema de cultivo hidropónico para mejora de calidad y rendimiento de los cultivos </td>
            <td><a href="http://www.repositorio.usac.edu.gt/19433/" target="_blank">Ver documento</a></td>
        </tr>
        <tr>
            <td>Sistema de adquisición de datos en cultivos de huertos urbanos </td>
            <td><a href="https://repositorio.utn.edu.ec/handle/123456789/14365" target="_blank">Ver documento</a></td>
        </tr>
    </tbody>
</table>

<h2 class="ref">Referencias</h2>
    <div class="referencias">
        <ol>
            <li>Morales Moreno, N. A., & Pulido Angel, J. P. (2024). <em>Diseño y desarrollo de un sistema de monitoreo de humedad y temperatura para huertas en zonas urbanas de Bogotá</em>.</li>
            <li>Antolino Merino, A. (2016). <em>Sistema de adquisición y control de lisímetro de pesada en maceta con Arduino</em>.</li>
            <li>Meneses Vidal, J. A., & Urrutia Quirá, S. A. (2021). <em>Desarrollo de una red de sensores para monitoreo de macronutrientes primarios para cultivo de café aplicado a un caso de estudio en Tecnicafé</em> (Tesis doctoral, Uniautónoma del Cauca).</li>
            <li>Cruz Gavilan, L. D., & Maguiña Vilchez, E. A. (2021). <em>Aplicación de IOT en el proceso de fertilización de mandarinas mediante un sistema de red de sensores</em>.</li>
            <li>García Cuadrado, C. D., & Rojas Soto, J. M. (2023). <em>Sistema de riego automatizado para mejorar la productividad en cultivos de tomates en casa</em>.</li>
            <li>Aguirre, E. A., Pira, D. D. B., Rodríguez, J. S. S., Mesa, H. C. B., & Castro, D. A. V. (2019). <em>Red de sensores inalámbricos para el monitoreo de variables agroecológicas en cultivos bajo invernadero</em>. Publicaciones e Investigación, 13(1), 53-60.</li>
            <li>Plazas, M. (2020). <em>Adquisición de datos para el monitoreo remoto de variables de un cultivo vertical a través de una plataforma IoT</em>. Universidad de Antioquia.</li>
            <li>Prieto Guerrero, P. R., & Yamunaque Gamboa, L. E. (2023). <em>Diseño e implementación de prototipo de un sistema IoT para el monitoreo y control de cultivo de arándanos mediante redes neuronales en la finca San José–La Libertad</em>.</li>
            <li>Torres Cortes, G. H. (2021). <em>Diseño e implementación de un sistema de adquisición y registro de señales e imágenes con tecnología IoT para el seguimiento de las condiciones de cultivos hidropónicos de lechuga</em>.</li>
            <li>Hernández Sanz, E. M. (2019). <em>Desarrollo de un sistema de monitorización y control de un invernadero aplicando tecnología IoT</em>.</li>
            <li>Pablo, J. A. (2020). <em>Diseño de investigación de un sistema electrónico mediante el uso de tecnologías de IoT para el monitoreo remoto de pH en agua de solución de nutrientes en un sistema de cultivo hidropónico</em>. Universidad de San Carlos de Guatemala.</li>
            <li>Mesa Cabascango, L. I. (2023). <em>Sistema de adquisición de datos en cultivos de huertos urbanos</em> [Tesis de pregrado, Universidad Técnica del Norte]. Recuperado de 
            </li>
        </ol>
    </div>
@endsection

@section('js')

@endsection