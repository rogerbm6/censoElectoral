<div class="w-full max-w-3xl mx-auto mt-8">

    {{-- TÍTULO --}}
    <h2 class="text-center text-xl font-semibold text-gray-700 mb-4">
        Buscar empresa por NIF
    </h2>

    {{-- CONTENEDOR DEL INPUT --}}
    <div class="relative mb-4">
        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
            <!-- Icono de búsqueda -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.515 3.515a7.5 7.5 0 0013.135 13.135z" />
            </svg>
        </span>

        <input id="buscar" type="text" maxlength="10" wire:model.debounce.300ms="buscar"
            placeholder="Escribe un NIF completo…" class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-xl shadow-sm
                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none
                   transition">
    </div>


    {{-- MENSAJE: comenzar búsqueda --}}
    @if(strlen($buscar) < 8)
        <div class="p-4 text-center bg-blue-50 border border-blue-200 text-blue-700 rounded-xl">
            Empieza a escribir un NIF completo para ver resultados.
        </div>

        {{-- MENSAJE: no encontrado --}}
    @elseif(!$empresa)
        <div class="p-4 text-center bg-yellow-50 border border-yellow-200 text-yellow-700 rounded-xl">
            No se encontró ninguna empresa con el NIF
            <strong>"{{ $buscar }}"</strong>.
        </div>
    @endif


    {{-- RESULTADO --}}
    @if ($empresa)
        <div class="mt-6 p-8 bg-white border border-gray-200 rounded-xl shadow-xl">

            {{-- TÍTULO --}}
            <h3 class="text-lg font-semibold text-gray-800 mb-6">
                Empresa encontrada
            </h3>

            {{-- BLOQUE 1 — IDENTIFICACIÓN --}}
            <div class="mb-8">
                <h4 class="text-md font-semibold text-gray-700 mb-3">Identificación</h4>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6 text-base">

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">Nombre</p>
                        <p class="font-medium text-gray-900">{{ $empresa->nombre }}</p>
                    </div>

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">NIF</p>
                        <p class="font-medium text-gray-900">{{ $empresa->nif }}</p>
                    </div>

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">Inicio actividad</p>
                        <p class="font-medium text-gray-900">
                            {{ $empresa->inicio_actividad ?? '—' }}
                        </p>
                    </div>

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">Ejercicio</p>
                        <p class="font-medium text-gray-900">
                            {{ $empresa->ejercicio ?? '—' }}
                        </p>
                    </div>

                </div>
            </div>

            {{-- BLOQUE 2 — ACTIVIDAD ECONÓMICA --}}
            <div class="mb-8">
                <h4 class="text-md font-semibold text-gray-700 mb-3">Actividad económica</h4>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6 text-base">

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">Epígrafes</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($epigrafes as $item)
                                <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-md text-sm">
                                    {{ $item }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">Nombres de epígrafe</p>
                        <ul class="list-disc pl-6 text-gray-900">
                            @foreach($nombre_epigrafes as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">Categorías de grupo</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($categorias_grupo as $item)
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-md text-sm">
                                    {{ $item }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">Grupo</p>
                        <p class="font-medium text-gray-900">{{ $empresa->grupo }}</p>
                    </div>

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">Categoría electoral</p>
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-md text-sm font-medium">
                            {{ $empresa->categoria_electoral }}
                        </span>
                    </div>

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">Nombre categoría electoral</p>
                        <p class="font-medium text-gray-900">{{ $empresa->categoria_electoral_nombre }}</p>
                    </div>

                </div>
            </div>


            {{-- BLOQUE 3 — UBICACIÓN --}}
            <div>
                <h4 class="text-md font-semibold text-gray-700 mb-3">Ubicación</h4>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6 text-base">

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">Dirección</p>
                        <p class="font-medium text-gray-900">{{ $empresa->direccion }}</p>
                    </div>

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">Municipio</p>
                        <p class="font-medium text-gray-900">{{ $empresa->municipio }}</p>
                    </div>

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">Municipio fiscal</p>
                        <p class="font-medium text-gray-900">{{ $empresa->municipio_fiscal }}</p>
                    </div>

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">Municipio actual</p>
                        <p class="font-medium text-gray-900">{{ $empresa->municipio_actual }}</p>
                    </div>

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">Código postal</p>
                        <p class="font-medium text-gray-900">
                            {{ $empresa->codigo_postal ?? '—' }}
                        </p>
                    </div>

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">Código municipio fiscal</p>
                        <p class="font-medium text-gray-900">
                            {{ $empresa->codigo_municipio_fiscal }}
                        </p>
                    </div>

                    <div class="space-y-1 text-left">
                        <p class="text-gray-500 uppercase tracking-widest text-xs">Código municipio</p>
                        <p class="font-medium text-gray-900">
                            {{ $empresa->codigo_municipio }}
                        </p>
                    </div>

                </div>
            </div>

        </div>
    @endif



</div>