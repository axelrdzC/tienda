<div>
    <div class="col px-5">
    
        <!-- header de la seccion -->
        @section('titulo-seccion', 'Almacenes')
        @section('buscador', 'Escriba el nombre de un almacen aqui')
        @section('add-boton')
            <!-- add almacen -->
            @can('crear almacenes')
                <div class="col-2">
                    <div class="d-flex align-items-center">
                        <button type="button" onclick="window.location.href='{{ route('almacenes.create') }}'" class="btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 shadow-sm">
                            Agregar almacen +
                        </button>
                    </div>
                </div>
            @endcan
        @endsection
        @include('components.tituloSeccion')

        <div class="d-flex gap-4">
            <!-- Filtros -->
            <div class="d-flex h-100" style="width: 18rem;">
                <div class="card border-0 bg-white shadow-sm w-100">
                    <div class="card-body">
                        <div class="mb-3">
                            <small class="form-label">ORDENAR POR</small>
                            <select wire:model="order" class="form-select selects">
                                <option selected>Seleccionar</option>
                                <option value="1">Alfabético: A-Z</option>
                                <option value="2">Alfabético: Z-A</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <small class="form-label">NIVEL DE OCUPACIÓN</small>
                            <select wire:model="capacidad" class="form-select selects">
                                <option selected>Seleccionar</option>
                                <option value="vinilos">Vinilos</option>
                                <option value="galletas">Galletas</option>
                                <option value="ropa">Ropa</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <small class="form-label">UBICACIÓN</small>
                            <select wire:model="pais" class="form-select selects">
                                <option selected>Seleccionar</option>
                                <option value="México">México</option>
                                <option value="Estados Unidos">Estados Unidos</option>
                            </select>
                        </div>
                        <button type="button" wire:click="resetFilters" class="btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 shadow-sm mt-2">
                            Restablecer filtros
                        </button>
                    </div>
                </div>
            </div> 
            <!-- Contenedor de almacenes -->
            <div class="container p-0 flex-grow-1">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach ($almacenes as $almacen)
                        <div class="col">
                            <div class="card shadow-sm bg-white border-0 h-100">
                                <div class="card-body d-flex flex-column p-0">
                                    <img src="{{ asset($almacen->img ?? 'storage/img/almacen.png') }}" alt="" class="rounded-top-3" style="width: auto; height: 160px; object-fit: cover;">
                                </div> 
                                <div class="card-body d-flex flex-column">
                                    <h1 class="fs-5 fw-bold">{{ $almacen->nombre }}</h1>
                                    <small class="fs-6 fw-medium text-truncate">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z" stroke="#53545C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        {{ $almacen->pais }} , {{ $almacen->estado }}, {{ $almacen->ciudad }}, {{ $almacen->codigo_p }}, {{ $almacen->colonia }}
                                    </small>
                                    @can('editar almacenes')
                                        <div class="d-flex justify-content-end mt-2 gap-1">
                                            <a class="p-1" href="#" data-bs-toggle="modal" data-bs-target="#editar-{{ $almacen->id }}">
                                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.9562 17.5358H18" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.15 3.66233C11.7964 2.88982 12.9583 2.77655 13.7469 3.40978C13.7905 3.44413 15.1912 4.53232 15.1912 4.53232C16.0575 5.05599 16.3266 6.16925 15.7912 7.01882C15.7627 7.06432 7.84329 16.9704 7.84329 16.9704C7.57981 17.2991 7.17986 17.4931 6.75242 17.4978L3.71961 17.5358L3.03628 14.6436C2.94055 14.2369 3.03628 13.8098 3.29975 13.4811L11.15 3.66233Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M9.68402 5.50073L14.2276 8.99" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </a>
                                            <a class="p-1" href="#" data-bs-toggle="modal" data-bs-target="#eliminar-{{ $almacen->id }}">
                                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.6041 8.39014C16.6041 8.39014 16.1516 14.0026 15.8891 16.3668C15.7641 17.496 15.0666 18.1576 13.9241 18.1785C11.7499 18.2176 9.57326 18.2201 7.39993 18.1743C6.30076 18.1518 5.61493 17.4818 5.49243 16.3726C5.22826 13.9876 4.77826 8.39014 4.77826 8.39014" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M17.7569 5.69963H3.62518" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M15.0339 5.69974C14.3797 5.69974 13.8164 5.23724 13.688 4.5964L13.4855 3.58307C13.3605 3.11557 12.9372 2.79224 12.4547 2.79224H8.92719C8.44469 2.79224 8.02136 3.11557 7.89636 3.58307L7.69386 4.5964C7.56552 5.23724 7.00219 5.69974 6.34802 5.69974" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </a>
                                            <!-- el modal aka formulario delete almacen -->
                                            <div class="modal fade" id="eliminar-{{ $almacen->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirme su accion</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="">Esta seguro de querer borrar el siguiente almacen: </p>
                                                                <div class="card-body d-flex flex-column p-0">
                                                                    <img src="{{ asset('img/almacen.png') }}" alt="" class="rounded-3">
                                                                </div> 
                                                                <p class="mt-4"> Nombre: <strong> {{ $almacen->nombre }} </strong></p>
                                                                <p class="m-0"> Ubicación: <strong> {{ $almacen->pais }} , {{ $almacen->estado }}, {{ $almacen->ciudad }}, {{ $almacen->codigo_p }}, {{ $almacen->colonia }} </strong></p>    
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                <form action="{{ route('almacenes.destroy', $almacen) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                        <button type="submit" class="btn btn-primary">Eliminar almacen</button>
                                                                </form>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- el modal aka formulario edit almacen -->
                                            <div class="modal fade" id="editar-{{ $almacen->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <!-- formulario -->
                                                        <form method="POST" action="{{ route('almacenes.update', $almacen) }}" enctype="multipart/form-data">
                                                            @csrf @method('PATCH')
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar informacion del almacen</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                    <!-- nombre almacen -->
                                                                    <div class="mb-3">
                                                                        <label for="nombre" class="form-label">Nombre del almacen</label>
                                                                        <input type="text" class="form-control bg-white" id="nombre" name="nombre" value="{{ $almacen->nombre }}" required>
                                                                    </div>
                                                                    <!-- pais y estado -->
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-6">
                                                                            <label for="pais" class="form-label">País</label>
                                                                            <select class="form-select bg-white" id="pais" name="pais" required>
                                                                                <option selected disabled>Selecciona un país</option>
                                                                                <option value="México" {{ $almacen->pais == 'México' ? 'selected' : '' }}>México</option>
                                                                                <option value="Estados Unidos" {{ $almacen->pais == 'Estados Unidos' ? 'selected' : '' }}>Estados Unidos</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="estado" class="form-label">Estado</label>
                                                                            <select class="form-select bg-white" id="estado" name="estado" required>
                                                                                <option selected disabled>Selecciona un estado</option>
                                                                                <option value="Tamaulipas" {{ $almacen->estado == 'Tamaulipas' ? 'selected' : '' }}>Tamaulipas</option>
                                                                                <option value="Nuevo Leon" {{ $almacen->estado == 'Nuevo Leon' ? 'selected' : '' }}>Nuevo Leon</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <!-- ciudad y CP -->
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-6">
                                                                            <label for="ciudad" class="form-label">Ciudad</label>
                                                                            <select class="form-select bg-white" id="ciudad" name="ciudad" required>
                                                                                <option selected disabled>Selecciona una ciudad</option>
                                                                                <option value="Ciudad Victoria" {{ $almacen->ciudad == 'Ciudad Victoria' ? 'selected' : '' }}>Ciudad Victoria</option>
                                                                                <option value="Tampico" {{ $almacen->ciudad == 'Tampico' ? 'selected' : '' }}>Tampico</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="codigo_p" class="form-label">Código Postal</label>
                                                                            <input type="number" class="form-control bg-white" id="codigo_p" name="codigo_p" value="{{ $almacen->codigo_p }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <!-- colonia / calles -->
                                                                    <div class="mb-3">
                                                                        <label for="colonia" class="form-label">Colonia y calle</label>
                                                                        <input type="text" class="form-control bg-white" id="colonia" name="colonia" value="{{ $almacen->colonia }}"required>
                                                                    </div>
                                                                    <!-- subir img -->
                                                                    <div class="mb-3">
                                                                        <label for="img" class="form-label">Subir imagen</label>
                                                                        <input type="file" class="form-control bg-white" id="img" name="img" accept="image/*">
                                                                    </div>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                                            </div>
                                                        </form>    
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    @endforeach        
                </div>
            </div>
        </div>
    </div>        
</div>