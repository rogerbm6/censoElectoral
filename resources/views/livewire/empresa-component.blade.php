<div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="buscar">
                    <strong>Buscar</strong>
                    @if($picked)
                        <span class="badge badge-success">Picked</span>
                    @else
                        <span class="badge badge-danger">Picked</span>
                    @endif
                </label>
                <input wire:model="buscar" 
                    wire:keydown.enter="asignarPrimero()" type="text" class="form-control" id="buscar">
                @error("buscar")                    
                    <small class="form-text text-danger">{{$message}}</small>                                    
                @else
                    @if($empresa)
                        @if(!$picked)
                        <div class="shadow rounded px-3 pt-3 pb-0">
                                <div style="cursor: pointer;">
                                    <a wire:click="asignarEmpresa('{{ $empresa->nif }}')">
                                        {{ $empresa->nif }}
                                    </a>
                                </div>
                                <hr>
                        </div>
                        @endif
                    @else
                        <small class="form-text text-muted">Comienza a teclear para que aparezcan los resultados</small>
                    @endif
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <p><strong>Resultados</strong></p>
            <p>
                @if ($empresa)
                <span class="badge badge-secondary">Nombre :{{ $empresa->nombre }}</span>
                <span class="badge badge-secondary">Epigrafe :{{ $empresa->epigrafe }}</span>
                <span class="badge badge-secondary">Epigrafe Nombre :{{ $empresa->nombre_epigrafe }}</span>
                <span class="badge badge-secondary">NIF :{{ $empresa->nif }}</span>
                <span class="badge badge-secondary">Grupo :{{ $empresa->grupo }}</span>
                <span class="badge badge-secondary">Nombre de grupo :{{ $empresa->categoria_grupo }}</span>
                <span class="badge badge-secondary">Categoria electoral:{{ $empresa->categoria_electoral }}</span>

                <span class="badge badge-secondary">Nombre ategoria electoral:{{ $empresa->categoria_electoral_nombre }}</span>

                @endif
                
            </p>
        </div>
    </div>    
</div>