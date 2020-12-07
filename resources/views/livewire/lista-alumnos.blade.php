<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Alumnos') }}
        </h2>
    </x-slot>

    {{-- <x-lightbox/> --}}



    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                    <div class="flex px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                        <input
                        wire:model='search'
                        class="w-full mt-1 rounded-md shadow-sm form-input"
                        type="text"
                        placeholder="Buscar...">

                        <div class="mt-1 ml-6 rounded-md shadow-sm form-input">
                            <select wire:model='perPage' class="text-sm text-gray-500 outline-none">
                            <option value="5"> 5 por página</option>
                            <option value="10"> 10 por página</option>
                            <option value="15"> 15 por página</option>
                            </select>
                        </div>
                        @if($search !== '')
                        <button wire:click="clear" class="block mt-1 ml-6 rounded-md shadow-sm form-input"> X </button>
                        @endif
                        {{-- Agregar Alumno --}}


                        <span class="hidden sm:block">
                            <button wire:click="createShowModal"
                            {{-- wire:click="crearAlumno()" --}}
                            type="button"
                            class="px-4 py-2 mt-1 ml-6 text-sm font-medium text-gray-700 bg-green-200 border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <!-- Heroicon name: add -->
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                    </path>
                                </svg>
                            </button>
                        </span>


                    </div>


                </div>

                    @if ($alumnos->count())
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Nombre Alumno
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Rut Alumno
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Carrera/Titulo
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Año Ingreso
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            LinkedIn
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Opciones
                        <th scope="col" class="px-6 py-3 bg-gray-50">
                            <span class="sr-only">Editar</span>
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50">
                            <span class="sr-only">Eliminar</span>
                        </th>
                        </th>
                        </tr>
                    </thead>


                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($alumnos as $alumno)
                        <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">

                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                {{$alumno->nombre_alumno}}
                                </div>
                                <div class="text-sm text-gray-500">
                                {{$alumno->contacto_alumno}}
                                </div>
                            </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{$alumno->rut_alumno}}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{$alumno->carrera_alumno}}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{date("d/m/Y", strtotime($alumno->anio_ingreso))}}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">

                            <div class="text-sm text-gray-900">
                                {{$alumno->estado_alumno}}
                            </div>

                        </td>


                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                <a href=" {{$alumno->linkedin}}">
                                <img class="w-6 h-6" src="https://www.flaticon.es/svg/static/icons/svg/174/174857.svg" alt="">
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <span class="hidden sm:block">
                                {{-- Editar --}}
                                <button
                                wire:click="updateShowModal({{ $alumno->id }})"
                                type="button"
                                class="inline-flex items-center px-1 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <!-- Heroicon name: pencil -->
                                    <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </button>
                            </span>
                            {{-- <a href="#" class="text-indigo-600 hover:text-indigo-900">Editar</a> --}}
                        </td>
                        @if ($alumno->estado_alumno!='Eliminado')
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                {{-- Eliminar --}}
                                <span class="hidden sm:block">
                                    <button wire:click="deleteShowModal({{ $alumno->id }})" wire:loading.attr="disabled" class="inline-flex items-center justify-center w-full px-1 py-1 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </span>
                            </td>
                        @endif

                        </tr>


                        @endforeach

                        <!-- More rows... -->
                    </tbody>
                    </table>
                    <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                    {{$alumnos->links()}}
                    </div>
                    @else
                    <div class="px-4 py-3 text-gray-500 bg-white border-t border-gray-200 sm:px-6">
                        No hay resultados para la busqueda "{{$search}}" en la página {{$page}} al mostrar {{$perPage}} alumnos por página
                    </div>
                    @endif

                    {{-- Modal Form --}}
                    <x-jet-dialog-modal wire:model="modalFormVisible">
                        <x-slot name="title">
                            <div class="mx-auto text-center rounded-md">
                                @if($modelId)
                                    Actualizar Alumno
                                @else
                                    Agregar Alumno
                                @endif
                            </div>
                        </x-slot>

                        <x-slot name="content">
                            {{-- <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Foto
                                </label>
                                <div class="flex items-center mt-2">
                                    <span
                                        class="inline-block w-12 h-12 overflow-hidden bg-gray-100 rounded-full">
                                        <svg class="w-full h-full text-gray-300" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </span>
                                    <button type="button"
                                        class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Cambiar
                                    </button>
                                </div>
                            </div> --}}
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 mt-4 sm:col-span-3">
                                    <div class="flex">
                                        <x-jet-label for="nombre_alumno" value="Nombre" />
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <x-jet-input id="nombre_alumno" class="block w-full mt-1" type="text"
                                        placeholder="Nombre del alumno"
                                        wire:model.debounce.800ms="nombre_alumno" />
                                    @error('nombre_alumno') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-6 mt-2 sm:col-span-3 form-group">
                                    <div class="flex">
                                        <x-jet-label for="rut_alumno" value="Rut" />
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <x-jet-input class="block w-full mt-1 text-black" wire:model="rut_alumno" placeholder="12345678-9" id="rut" oninput="checkRut(this)" required="" name="rut_alumno" type="text"/>
                                    @error('rut_alumno') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror

                                </div>

                                <div class="col-span-6 mt-4 sm:col-span-3">
                                    <div class="flex">
                                        <x-jet-label for="carrera_alumno" value="Carrera/Titulo" />
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <x-jet-input id="carrera_alumno" class="block w-full mt-1" type="text"
                                        placeholder="Ej: Carrera o Titulo del alumno"
                                        wire:model.debounce.800ms="carrera_alumno" />
                                    @error('carrera_alumno') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-6 mt-4 sm:col-span-3">
                                    <div class="flex">
                                        <x-jet-label for="trabajo_tesis" value="Tesis" />
                                    </div>
                                    <x-jet-input id="trabajo_tesis" class="block w-full mt-1" type="text"
                                        placeholder="Tesis del alumno"
                                        wire:model.debounce.800ms="trabajo_tesis" />
                                </div>

                                <div class="col-span-6 mt-4 sm:col-span-3">
                                    <div class="flex">
                                        <x-jet-label for="contacto_alumno" value="Correo" />
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <x-jet-input id="contacto_alumno" class="block w-full mt-1" type="text"
                                        placeholder="Ej: user@email.com"
                                        wire:model.debounce.800ms="contacto_alumno" />
                                    @error('contacto_alumno') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-6 mt-2 sm:col-span-3">
                                    <div class="flex">
                                        <x-jet-label for="anio_ingreso" value="Año de Ingreso" />
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <x-jet-input id="anio_ingreso" class="block w-full mt-1 text-black"
                                        type="date" value="\Carbon\Carbon::now()" placeholder="2000/12/31"
                                        wire:model="anio_ingreso" />
                                    @error('anio_ingreso') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-6 mt-4 sm:col-span-3">
                                    <x-jet-label for="linkedin" value="LinkedIn (opcional)" />
                                    <x-jet-input id="linkedin" class="block w-full mt-1" type="text"
                                        placeholder="LinkedIn"
                                        wire:model.debounce.800ms="linkedin" />

                                </div>
                                <div class="col-span-6 mt-2 sm:col-span-3">
                                    <div class="flex">
                                        <label for="estado_alumno" value="estado_alumno"
                                            class="block text-sm font-medium text-gray-700">Estado</label>
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <select id="estado_alumno" type="text" wire:model="estado_alumno"
                                        class="block w-full px-3 py-2 text-gray-700 border rounded-md shadow-sm outline-none">
                                        <option class="text-gray-700" value="Regular">Regular</option>
                                        <option class="text-gray-700" value="Graduado">Graduado</option>
                                        <option class="text-gray-700" value="Egresado">Egresado</option>
                                        <option class="text-gray-700" value="Eliminado">Eliminado</option>
                                        <option class="text-gray-700" value="Retiro Voluntario">Retiro Voluntario</option>
                                    </select>
                                    @error('estado_alumno') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                </div>


                            </div>

                        </x-slot>

                        <x-slot name="footer">
                            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')"
                                wire:loading.attr="disabled">
                                {{ __('Cancelar') }}
                            </x-jet-secondary-button>

                            @if ($modelId)
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25'"
                                    wire:click="update" wire:loading.attr="disabled">
                                    {{ __('Actualizar') }}
                                </button>
                            @else

                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25'"
                                    wire:click="create" wire:loading.attr="disabled">
                                    {{ __('Crear') }}
                                </button>
                            @endif


                        </x-slot>
                    </x-jet-dialog-modal>

                    <x-delete-alumno/>


                </div>
                </div>
            </div>
            </div>

            </div>
        </div>
    </div>
</div>

<script>
    function checkRut(rut) {
        // Despejar Puntos
        var valor = rut.value.replace('.', '');
        // Despejar Guión
        valor = valor.replace('-', '');
        // Aislar Cuerpo y Dígito Verificador
        cuerpo = valor.slice(0, -1);
        dv = valor.slice(-1).toUpperCase();
        // Formatear RUN
        rut.value = cuerpo + '-' + dv
        // Si no cumple con el mínimo ej. (n.nnn.nnn)
        if (cuerpo.length < 7) {
            rut.setCustomValidity("RUT Incompleto");
            return false;
        }
        // Calcular Dígito Verificador
        suma = 0;
        multiplo = 2;
        // Para cada dígito del Cuerpo
        for (i = 1; i <= cuerpo.length; i++) {
            // Obtener su Producto con el Múltiplo Correspondiente
            index = multiplo * valor.charAt(cuerpo.length - i);
            // Sumar al Contador General
            suma = suma + index;
            // Consolidar Múltiplo dentro del rango [2,7]
            if (multiplo < 7) {
                multiplo = multiplo + 1;
            } else {
                multiplo = 2;
            }
        }
        // Calcular Dígito Verificador en base al Módulo 11
        dvEsperado = 11 - (suma % 11);
        // Casos Especiales (0 y K)
        dv = (dv == 'K') ? 10 : dv;
        dv = (dv == 0) ? 11 : dv;
        // Validar que el Cuerpo coincide con su Dígito Verificador
        if (dvEsperado != dv) {
            rut.setCustomValidity("RUT Inválido");
            return false;
        }
        // Si todo sale bien, eliminar errores (decretar que es válido)
        rut.setCustomValidity('');
    }

</script>
