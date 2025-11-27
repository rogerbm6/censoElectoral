<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cámara Fuerteventura</title>

    <!-- TAILWIND CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

@livewireStyles
@livewireScripts

<body class="bg-gray-100 text-gray-800">

    <!-- HEADER -->
    <header class="w-full shadow bg-white">

        <!-- TOP BAR -->
        <div class="flex justify-between items-center text-sm px-6 py-2 bg-gray-200">
            <div class="space-x-4">
                <a href="https://www.camaradefuerteventura.org/" class="hover:text-red-700">Transparencia y Buen
                    Gobierno</a>
                <a href="https://www.camaradefuerteventura.org/" class="hover:text-red-700">Fondos Europeos</a>
                <a href="https://www.camaradefuerteventura.org/" class="hover:text-red-700">Declaración de
                    Accesibilidad</a>
            </div>

            <div class="flex items-center space-x-4">
                <a href="https://www.camaradefuerteventura.org/" class="hover:text-red-700">Acceder</a>
                <span class="font-semibold cursor-pointer">Fuerteventura ▼</span>
            </div>
        </div>

        <!-- MAIN HEADER -->
        <div class="flex justify-between items-center px-6 py-4 bg-white">
            <div>
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/4a/C%C3%A1mara_de_Comercio_de_Espa%C3%B1a_logo.png"
                    alt="Logo" class="h-12">
            </div>

            <nav class="hidden md:flex space-x-6 font-medium text-sm">
                <a href="https://www.camaradefuerteventura.org/" class="hover:text-red-700">Emprendimiento</a>
                <a href="https://www.camaradefuerteventura.org/" class="hover:text-red-700">Formación y empleo</a>
                <a href="https://www.camaradefuerteventura.org/" class="hover:text-red-700">Innovación</a>
                <a href="https://www.camaradefuerteventura.org/" class="hover:text-red-700">Internacional</a>
                <a href="https://www.camaradefuerteventura.org/" class="hover:text-red-700">Servicios</a>
                <a href="https://www.camaradefuerteventura.org/" class="hover:text-red-700">Eventos</a>
                <a href="https://www.camaradefuerteventura.org/" class="hover:text-red-700">Contacto</a>
                <a href="https://www.camaradefuerteventura.org/" class="hover:text-red-700">Admin</a>
            </nav>
        </div>

    </header>

    <!-- HERO -->
    <section class="h-[320px] bg-cover bg-center flex items-center justify-center"
        style="background-image:url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1500&q=80');">
        <div class="text-center bg-black/50 p-6 rounded-lg text-white max-w-lg">
            <h1 class="text-4xl font-bold mb-3">Censo Electoral</h1>
            <p class="mb-4">Buscador de empresas por NIF</p>
        </div>
    </section>

    <!-- CONTENIDO TEMPORAL -->
    <section class="p-10 text-center">
        <section class="error-404 not-found">
            @yield('content')

            <!-- Formulario para subir el excel de importación -->
            {{-- <form action="{{route('empresas.import.excel')}}" method="POST" enctype="multipart/form-data">
                @csrf @if (Session::has('message'))
                <p>
                    {{Session::get('message')}}</p>
                @endif

                <input type="file" name="file">

                <button
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">Importar
                    empresas</button>

            </form> --}}

        </section>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-300 pt-12 px-8">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12">

            <!-- Contacto -->
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Contacto</h3>
                <p class="mb-2">📞 +34 928 861 070</p>
                <p class="mb-2">✉️ info@camarafuerteventura.org</p>
                <p class="leading-relaxed">
                    📍 C/ Secundino Alonso 98, 1º<br>
                    35600 Puerto del Rosario<br>
                    Fuerteventura
                </p>
            </div>

            <!-- Enlaces rápidos -->
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Enlaces rápidos</h3>
                <ul class="space-y-2">
                    <li><a href="https://www.camaradefuerteventura.org/" class="hover:text-white">Creación de
                            Empresas</a></li>
                    <li><a href="https://www.camaradefuerteventura.org/" class="hover:text-white">Formación</a></li>
                    <li><a href="https://www.camaradefuerteventura.org/"
                            class="hover:text-white">Internacionalización</a></li>
                    <li><a href="https://www.camaradefuerteventura.org/" class="hover:text-white">Innovación</a></li>
                    <li><a href="https://www.camaradefuerteventura.org/" class="hover:text-white">Subvenciones</a></li>
                    <li><a href="https://www.camaradefuerteventura.org/" class="hover:text-white">Trámites</a></li>
                </ul>
            </div>

            <!-- Legal -->
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Legal</h3>
                <ul class="space-y-2">
                    <li><a href="https://www.camaradefuerteventura.org/" class="hover:text-white">Aviso legal</a></li>
                    <li><a href="https://www.camaradefuerteventura.org/" class="hover:text-white">Política de
                            privacidad</a></li>
                    <li><a href="https://www.camaradefuerteventura.org/" class="hover:text-white">Política de
                            cookies</a></li>
                    <li><a href="https://www.camaradefuerteventura.org/" class="hover:text-white">Portal de
                            transparencia</a></li>
                    <li><a href="https://www.camaradefuerteventura.org/" class="hover:text-white">Perfil del
                            contratante</a></li>
                    <li><a href="https://www.camaradefuerteventura.org/" class="hover:text-white">Canal de Denuncias</a>
                    </li>
                </ul>
            </div>

            <!-- Síguenos -->
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Síguenos</h3>

                <div class="flex space-x-3 text-xl mb-4">
                    <a href="https://www.camaradefuerteventura.org/" class="hover:text-white">📘</a>
                    <a href="https://www.camaradefuerteventura.org/" class="hover:text-white">🔗</a>
                    <a href="https://www.camaradefuerteventura.org/" class="hover:text-white">📷</a>
                </div>

                <p class="mb-4">🕒 Horario: Lunes a Viernes 7:30 - 15:00</p>

                <div class="space-y-2 text-sm">
                    <p>🛡 Sitio Web Oficial Verificado</p>
                    <p>🔒 Conexión Segura SSL/TLS</p>
                    <p>🏛 Entidad Pública Oficial</p>
                </div>

                <p class="text-sm mt-4">
                    CIF: Q3500374H - Inscrita en el Registro de Cámaras
                </p>
            </div>

        </div>

        <!-- Bottom -->
        <div class="border-t border-gray-700 py-4 text-center text-gray-400 text-sm">
            © 2025 Cámara de Comercio de Fuerteventura. Todos los derechos reservados.
        </div>

    </footer>

</body>

</html>