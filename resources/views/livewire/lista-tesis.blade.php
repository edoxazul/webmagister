<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Anteproyectos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-2">
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </button>
                        </span>


                    </div>


                </div>

                    @if ($tesis->count())
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Titulo Anteproyecto
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Autor
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Tutor
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Anteproyecto
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Resumen Tesis
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Opciones
                        </th>
                        <th scope="col" class="px-2 py-3 bg-gray-50">
                            <span class="sr-only">Editar</span>
                        </th>
                        {{-- <th scope="col" class="px-6 py-3 bg-gray-50">
                            <span class="sr-only">Eliminar</span>
                        </th> --}}
                        {{-- </th> --}}
                        </tr>
                    </thead>


                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($tesis as $anteproyecto)
                        <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{$anteproyecto->titulo}}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{$anteproyecto->autor}}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{$anteproyecto->tutor}}
                            </div>
                        </td>
                        <td class="py-4 font-medium text-center px-15 whitespace-nowrap">
                            <div class="text-gray-900 text-sm-center">
                                {{-- <a href=" {{ $archivo->enlace_archivo }} " target="_blank"> --}}
                                <a href=" {{ $anteproyecto->anteproyecto_path }}" download="{{ $anteproyecto->anteproyecto_path}}" >
                                    {{-- <a href="{{ asset('storage/'. $archivo->enlace_archivo) }}" download="{{$archivo->file_original_name}}"></a> --}}
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                        <td class="py-4 font-medium text-center px-15 whitespace-nowrap">
                            <div class="text-gray-900 text-sm-center">
                                {{-- <a href=" {{ $archivo->enlace_archivo }} " target="_blank"> --}}
                                <a href=" {{ $anteproyecto->resumentesis_path }}" download="{{ $anteproyecto->resumentesis_path}}" >
                                    {{-- <a href="{{ asset('storage/'. $archivo->enlace_archivo) }}" download="{{$archivo->file_original_name}}"></a> --}}
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{$anteproyecto->estatus}}
                            </div>
                        </td>
                        <td class="flex px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <span class="hidden sm:block">
                                {{-- Editar --}}
                                <button
                                wire:click="updateShowModal({{ $anteproyecto->id }})"
                                type="button"
                                class="inline-flex items-center px-1 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <!-- Heroicon name: pencil -->
                                    <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </button>
                            </span>
                            @if ($anteproyecto->estatus!='Eliminado')
                            {{-- Eliminar --}}
                            <span class="hidden sm:block">
                                <button wire:click="deleteShowModal({{ $anteproyecto->id }})" wire:loading.attr="disabled" class="inline-flex items-center justify-center w-full px-1 py-1 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">

                        </td>

                        </tr>


                        @endforeach

                        <!-- More rows... -->
                    </tbody>
                    </table>
                    <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                    {{$tesis->links()}}
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
                                @if ($modelId)
                                    Actualizar Anteproyecto
                                @else
                                    Agregar Anteproyecto
                                @endif
                            </div>
                        </x-slot>

                        <x-slot name="content">
                            <div class="grid grid-cols-6 gap-6 center">
                                <div class="col-span-4 mt-2 sm:col-span-3">
                                    <x-jet-label for="titulo" value="Titulo Anteproyecto" />
                                    <x-jet-input id="titulo" class="block w-full mt-1" type="text"
                                        wire:model.lazy="titulo" />
                                    @error('titulo') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-4 mt-2 sm:col-span-3">
                                    <x-jet-label for="autor" value="Autor" />
                                    <x-jet-input id="autor" class="block w-full mt-1" type="text"
                                        wire:model.lazy="autor" />
                                    @error('autor') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-4 mt-2 sm:col-span-3">
                                    <x-jet-label for="tutor" value="Autor" />
                                    <x-jet-input id="tutor" class="block w-full mt-1" type="text"
                                        wire:model.lazy="tutor" />
                                    @error('tutor') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-6 mt-2 sm:col-span-3">
                                    <div class="flex">
                                        <x-jet-label for="estatus" value="Estado del Anteproyecto" />
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <select id="estatus" type="text" wire:model="estatus"
                                        class="block w-full px-3 py-2 text-gray-700 border rounded-md shadow-sm outline-none">
                                        <option class="font-black text-gray-700" value="">Elige una opción</option>
                                        <option class="text-gray-700" value="Aprobado">Aprobado</option>
                                        <option class="text-gray-700" value="En Formulacion">En Formulación</option>
                                        <option class="text-gray-700" value="Rechazado">Rechazado</option>
                                        <option class="text-gray-700" value="Eliminado">Eliminado</option>
                                    </select>
                                    @error('estatus') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span>@enderror
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
                                    {{ __('Subir') }}
                                </button>
                            @endif

                        </x-slot>
                    </x-jet-dialog-modal>


                    <x-delete-anteproyecto />

                </div>
                </div>
            </div>
            </div>

            </div>
        </div>










</div>
