<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Subir Archivos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-20">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                <div class="flex px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                                    <input wire:model='search' class="w-full mt-1 rounded-md shadow-sm form-input"
                                        type="text" placeholder="Buscar...">

                                    <div class="mt-1 ml-6 rounded-md shadow-sm form-input">
                                        <select wire:model='perPage' class="text-sm text-gray-500 outline-none">
                                            <option value="10"> 10 por página</option>
                                            <option value="15"> 15 por página</option>
                                        </select>
                                    </div>
                                    @if ($search !== '')
                                        <button wire:click="clear"
                                            class="block mt-1 ml-6 rounded-md shadow-sm form-input"> X </button>
                                    @endif
                                    {{-- Agregar Archivo
                                    --}}


                                    <span class="hidden sm:block">
                                        <button wire:click="createShowModal" {{--
                                            wire:click="crearNoticia()" --}} type="button"
                                            class="px-4 py-2 mt-1 ml-6 text-sm font-medium text-gray-700 bg-green-200 border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <!-- Heroicon name: add -->
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                        </button>
                                    </span>


                                </div>


                            </div>

                            @if ($archivos->count())
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-10 py-3 text-xs font-medium text-center text-gray-500 uppercase tracking bg-gray-50">
                                                Nombre Archivo
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                                Descripción Archivo
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                                Descargar Archivo
                                            </th>
                                            <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                                Fecha
                                            </th>
                                            <th scope="col"
                                                class="px-0 py-1 text-xs font-medium tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                                Opciones
                                            </th>
                                            <th scope="col" class="px-2 py-3 bg-gray-50">
                                                <span class="sr-only">Editar</span>
                                            </th>
                                        </tr>
                                    </thead>


                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($archivos as $archivo)
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-center whitespace-nowrap">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $archivo->nombre_archivo }}
                                                        </div>
                                                    </div>
                        </div>
                        </td>
                        <td class="px-6 py-4 font-medium text-center whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ $archivo->descripcion_archivo }}
                            </div>
                        </td>

                        <td class="px-20 py-4 font-medium text-center whitespace-nowrap">
                            <div class="text-gray-900 text-sm-center">
                                {{-- <a href=" {{ $archivo->enlace_archivo }} " target="_blank"> --}}
                                <a href=" {{ $archivo->enlace_archivo }}" download="{{ $archivo->enlace_archivo}}" >
                                    {{-- <a href="{{ asset('storage/'. $archivo->enlace_archivo) }}" download="{{$archivo->file_original_name}}"></a> --}}
                                    {{-- <img class="w-8 h-8 text-center"
                                        src="https://www.flaticon.es/svg/static/icons/svg/3921/3921436.svg" alt=""> --}}
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                </a>
                            </div>
                        </td>

                        <td class="px-6 py-4 font-medium text-center whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{date("d/m/Y", strtotime($archivo->created_at))}}
                            </div>
                        </td>

                        {{-- <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap ">
                            <span class="hidden sm:block">
                                <button wire:click="updateShowModal({{ $archivo->id }})" type="button"
                                    class="inline-flex items-center px-1 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </button>
                            </span>
                            <span class="hidden sm:block">

                                <button wire:click="deleteShowModal({{ $archivo->id }})" wire:loading.attr="disabled"
                                    class="inline-flex items-center justify-center w-full px-1 py-1 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </span>
                        </td> --}}
                        <td class="flex px-0 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <span class="hidden sm:block">
                                {{-- Editar --}}
                                <button
                                wire:click="updateShowModal({{ $archivo->id }})"
                                type="button"
                                class="inline-flex items-center px-1 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <!-- Heroicon name: pencil -->
                                    <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </button>
                            </span>
                            {{-- Eliminar --}}
                            <span class="hidden sm:block">
                                <button wire:click="deleteShowModal({{ $archivo->id }})" wire:loading.attr="disabled" class="inline-flex items-center justify-center w-full px-1 py-1 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </span>
                        </td>

                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">

                        </td>

                </tr>


                        @endforeach

                        <!-- More rows... -->
                        </tbody>
                        </table>
                        <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                            {{ $archivos->links() }}
                        </div>
                    @else
                        <div class="px-4 py-3 text-gray-500 bg-white border-t border-gray-200 sm:px-6">
                            No hay resultados para la busqueda "{{ $search }}" en la página {{ $page }} al
                            mostrar {{ $perPage }} archivos por página
                        </div>
                        @endif
                        {{--
                        {{-- Modal Form --}}
                        {{-- <x-jet-dialog-modal wire:model="modalFormVisible">
                            <x-slot name="title">
                                <div class="mx-auto text-center rounded-md">
                                    Subir un nuevo archivo
                                </div>
                            </x-slot> --}}

                            <x-jet-dialog-modal wire:model="modalFormVisible">
                                <x-slot name="title">
                                    <div class="mx-auto text-center rounded-md">
                                        @if ($modelId)
                                            Actualizar Archivo
                                        @else
                                            Subir Archivo
                                        @endif
                                    </div>
                                </x-slot>

                            <x-slot name="content">
                                {{-- <div>
                                    <label class="block text-sm font-medium text-gray-700">
                                        Foto
                                    </label>
                                    <div class="flex items-center mt-2">
                                        <span class="inline-block w-12 h-12 overflow-hidden bg-gray-100 rounded-full">
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
                                <div class="grid grid-cols-3 gap-2 center">
                                    <div class="col-span-4 mt-2 sm:col-span-3">
                                        <x-jet-label for="nombre_archivo" value="Nombre del archivo" />
                                        <x-jet-input id="nombre_archivo" class="block w-full mt-1" type="text"
                                            wire:model.debounce.800ms="nombre_archivo" />
                                        @error('nombre_archivo') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-4 mt-2 sm:col-span-3">
                                        <x-jet-label for="descripcion_archivo" value="Descripción del archivo" />
                                        <x-jet-input id="descripcion_archivo" class="block w-full mt-1" type="text"
                                            wire:model.debounce.800ms="descripcion_archivo" />
                                        @error('descripcion_archivo') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-span-4 mt-2 sm:col-span-3">
                                        <div
                                            x-data="{ isUploading: false, progress: 0 }"
                                            x-on:livewire-upload-start="isUploading = true"
                                            x-on:livewire-upload-finish="isUploading = false"
                                            x-on:livewire-upload-error="isUploading = false"
                                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                                        <x-jet-label for="enlace_archivo" value="Subir archivo" />
                                        <x-jet-input id="enlace_archivo" class="block w-full mt-1" type="file" accept=".doc,.docx,application/msword,
                                        application/vnd.openxmlformats-officedocument.wordprocessingml.document,
                                        .pdf,.txt,.xlsx,.xls,.pptx,.ppt"
                                            wire:model="files_admin" />
                                            <div x-show="isUploading">
                                                <progress max="100" x-bind:value="progress" ></progress>
                                                {{-- <div wire:loading wire:target="files_admin">Subiendo archivo...</div> --}}
                                            </div>
                                            {{-- <div wire:loading wire:target="files_admin">Subiendo archivo...</div> --}}
                                        @error('enlace_archivo') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                        </div>
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
                        <x-delete-archivo />
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>


</div>
