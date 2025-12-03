@push('styles')
    <style>
        /* Contenedor general */
        .cmp-container {
            width: 100%;
            max-width: 780px;
            margin: 40px auto;
            margin-bottom: 150px;
        }

        /* TITULOS */
        .cmp-title {
            text-align: center;
            font-size: 22px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 16px;
        }

        /* Campo de búsqueda */
        .cmp-input-wrapper {
            position: relative;
            margin-bottom: 16px;
        }

        .cmp-input-icon {
            position: absolute;
            inset: 0;
            left: 12px;
            display: flex;
            align-items: center;
            color: #9CA3AF;
            pointer-events: none;
        }

        .cmp-input {
            width: 100%;
            padding: 12px 16px 12px 42px;
            border: 1px solid #D1D5DB;
            border-radius: 12px;
            outline: none;
            transition: 0.2s;
            font-size: 16px;
        }

        .cmp-input:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.4);
        }

        /* Mensajes */
        .cmp-alert {
            padding: 16px;
            border-radius: 12px;
            text-align: center;
            font-size: 15px;
            margin-bottom: 20px;
        }

        .cmp-alert-blue {
            background: #EFF6FF;
            border: 1px solid #BFDBFE;
            color: #1E3A8A;
        }

        .cmp-alert-yellow {
            background: #FEFCE8;
            border: 1px solid #FDE68A;
            color: #92400E;
        }

        /* Tarjeta de resultado */
        .cmp-card {
            margin-top: 24px;
            padding: 32px;
            background: white;
            border: 1px solid #E5E7EB;
            border-radius: 14px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        .cmp-card-title {
            font-size: 20px;
            font-weight: 600;
            color: #1F2937;
            margin-bottom: 24px;
        }

        /* Bloques de información */
        .cmp-block {
            margin-bottom: 32px;
        }

        .cmp-block-title {
            font-size: 17px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 12px;
        }

        .cmp-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px 40px;
        }

        @media(min-width: 768px) {
            .cmp-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        .cmp-item-label {
            color: #6B7280;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 11px;
            margin-bottom: 2px;
        }

        .cmp-item-value {
            color: #111827;
            font-weight: 500;
        }

        /* Chips / tags */
        .cmp-chip {
            display: inline-block;
            padding: 4px 10px;
            background: #F3F4F6;
            color: #1F2937;
            border-radius: 6px;
            font-size: 13px;
            margin-right: 6px;
            margin-bottom: 6px;
        }

        .cmp-chip-blue {
            background: #DBEAFE;
            color: #1E3A8A;
        }

        /* Lista */
        .cmp-list {
            padding-left: 20px;
            color: #111827;
        }
    </style>
@endpush

<div class="cmp-container">

    <h2 class="cmp-title">Buscar empresa por NIF</h2>

    <div class="cmp-input-wrapper">

        <span class="cmp-input-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.515 3.515a7.5 7.5 0 0013.135 13.135z" />
            </svg>
        </span>

        <input id="buscar" type="text" maxlength="10" wire:model.debounce.300ms="buscar"
            placeholder="Escribe un NIF completo…" class="cmp-input">

    </div>


    {{-- MENSAJE: comenzar búsqueda --}}
    @if(strlen($buscar) < 8)
        <div class="cmp-alert cmp-alert-blue">
            Empieza a escribir un NIF completo para ver resultados.
        </div>

        {{-- MENSAJE: no encontrado --}}
    @elseif(!$empresa)
        <div class="cmp-alert cmp-alert-yellow">
            Para solucionar la incidencia, contacte con la Cámara de Comercio en el correo <a
                href="mailto:info@camaralanzarote.org">info@camaralanzarote.org</a>
        </div>
    @endif


    {{-- RESULTADO --}}
    @if ($empresa)
        <div class="cmp-card">

            <h3 class="cmp-card-title">Empresa encontrada</h3>

            {{-- BLOQUE 1 — IDENTIFICACIÓN --}}
            <div class="cmp-block">
                <h4 class="cmp-block-title">Identificación</h4>

                <div class="cmp-grid">
                    <div>
                        <p class="cmp-item-label">Nombre</p>
                        <p class="cmp-item-value">{{ $empresa->nombre }}</p>
                    </div>

                    <div>
                        <p class="cmp-item-label">NIF</p>
                        <p class="cmp-item-value">{{ $empresa->nif }}</p>
                    </div>

                    <div>
                        <p class="cmp-item-label">Inicio actividad</p>
                        <p class="cmp-item-value">{{ $empresa->inicio_actividad ?? '—' }}</p>
                    </div>

                </div>
            </div>

            {{-- BLOQUE 2 — ACTIVIDAD ECONÓMICA --}}
            <div class="cmp-block">
                <h4 class="cmp-block-title">Actividad económica</h4>

                <div class="cmp-grid">

                    <p class="cmp-item-label">Epígrafes</p>



                    <p class="cmp-item-label">Nombres de epígrafe</p>

                    @foreach ($epigrafes as $epigrafe => $nombreEpigrafe)

                        <div>
                            <div>
                                <span class="cmp-chip">{{ $epigrafe }}</span>

                            </div>
                        </div>

                        <div>
                            <ul class="cmp-list">
                                <li>{{ $nombreEpigrafe }}</li>
                            </ul>
                        </div>

                    @endforeach
                </div>
            </div>

            {{-- BLOQUE 3 — UBICACIÓN --}}
            <div class="cmp-block">
                <h4 class="cmp-block-title">Ubicación</h4>

                <div class="cmp-grid">

                    <div>
                        <p class="cmp-item-label">Dirección</p>
                        <p class="cmp-item-value">{{ $empresa->direccion }}</p>
                    </div>

                    <div>
                        <p class="cmp-item-label">Municipio</p>
                        <p class="cmp-item-value">{{ $empresa->municipio }}</p>
                    </div>

                    <div>
                        <p class="cmp-item-label">Código postal</p>
                        <p class="cmp-item-value">{{ $empresa->codigo_municipio_fiscal ?? '—' }}</p>
                    </div>

                </div>
            </div>

        </div>
    @endif

</div>