<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Estructura Curricular') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-2">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    @if ($curriculars->count())
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Malla
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Profundizacion
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
                        @foreach ($curriculars as $curricular)
                        <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    <img src="{{$curricular->malla}}" alt="">
                                </div>
                            </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{$curricular->profundizacion}}
                            </div>
                        </td>
                        <td class="flex px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <span class="hidden sm:block">
                                {{-- Editar --}}
                                <button
                                wire:click="updateCurricularShowModal({{ $curricular->id }})"
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
                                <button wire:click="deleteCurricularShowModal({{ $curricular->id }})" wire:loading.attr="disabled" class="inline-flex items-center justify-center w-full px-1 py-1 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
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
                    @else
                    <div class="px-4 py-3 text-gray-500 bg-white border-t border-gray-200 sm:px-6">
                        No existe estructura curricular.
                        <span class="hidden sm:block">
                            <button wire:click="createCurricularShowModal"
                            type="button"
                            class="px-4 py-2 mt-1 ml-6 text-sm font-medium text-gray-700 bg-green-200 border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                    </path>
                                </svg>
                            </button>
                        </span>
                    </div>
                    @endif
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                    <div class="flex px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                        <input wire:model='search' class="w-full mt-1 rounded-md shadow-sm form-input" type="text" placeholder="Buscar...">
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
                        <span class="hidden sm:block">
                            <button wire:click="createCursoShowModal"
                            type="button"
                            class="px-4 py-2 mt-1 ml-6 text-sm font-medium text-gray-700 bg-green-200 border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                    </path>
                                </svg>
                            </button>
                        </span>




                    </div>


                </div>

                    @if ($cursos->count())
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Nombre curso
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Descripción Curso
                        </th>
                        <th scope="col" class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                            Descargar Archivo
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
                        @foreach ($cursos as $curso)
                        <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                {{$curso->nombre_curso}}
                                </div>
                            </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{$curso->descripcion_curso}}
                            </div>
                        </td>
                        <td class="px-20 py-4 font-medium text-center whitespace-nowrap">
                            <div class="text-gray-900 text-sm-center">
                                <a href=" {{ $curso->enlace_curso }}" download="{{ $curso->enlace_curso}}" >
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                        <td class="flex px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <span class="hidden sm:block">
                                {{-- Editar --}}
                                <button
                                wire:click="updateCursoShowModal({{ $curso->id }})"
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
                                <button wire:click="deleteCursoShowModal({{ $curso->id }})" wire:loading.attr="disabled" class="inline-flex items-center justify-center w-full px-1 py-1 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
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
                    {{$cursos->links()}}
                    </div>
                    @else
                    <div class="px-4 py-3 text-gray-500 bg-white border-t border-gray-200 sm:px-6">
                        No hay resultados para la busqueda "{{$search}}" en la página {{$page}} al mostrar {{$perPage}} cursos por página
                    </div>
                    @endif

                    <x-jet-dialog-modal wire:model="modalCursoFormVisible">
                        <x-slot name="title">
                            <div class="mx-auto text-center rounded-md">
                                @if ($modelId)
                                    Actualizar Curso
                                @else
                                    Agregar Curso
                                @endif
                            </div>
                        </x-slot>
                        <x-slot name="content">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 mt-2 sm:col-span-3">
                                    <div class="flex">
                                        <x-jet-label for="nombre_curso" value="Nombre del Curso" />
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <x-jet-input id="nombre_curso" class="block w-full mt-1" type="text"
                                        placeholder="Nombre del Curso" wire:model.lazy="nombre_curso" />
                                    @error('nombre_curso') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span>@enderror
                                </div>
                                <div>
                                    <div class="mt-4">
                                        <label for="about" class="block text-sm font-medium text-gray-700">
                                            Descripcion del Curso
                                        </label>
                                        <label for="title" class="px-2 text-red-700">*</label>

                                            <textarea id="descripcion_curso" name="descripcion_curso" rows="3"
                                            class="block w-full px-3 py-2 mt-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model="descripcion_curso"
                                            placeholder="Descripcion"></textarea>
                                            @error('descripcion_curso') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                <div class="col-span-4 mt-2 sm:col-span-3">
                                    <div
                                        x-data="{ isUploading: false, progress: 0 }"
                                        x-on:livewire-upload-start="isUploading = true"
                                        x-on:livewire-upload-finish="isUploading = false"
                                        x-on:livewire-upload-error="isUploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <x-jet-label for="enlace_curso" value="Subir archivo" />
                                    <x-jet-input id="enlace_curso" class="block w-full mt-1" type="file" accept=".pdf"
                                            wire:model="files_admin" />
                                            <div x-show="isUploading">
                                                <progress max="100" x-bind:value="progress" ></progress>
                                            </div>
                                    @error('enlace_curso') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </x-slot>

                        <x-slot name="footer">
                            <x-jet-secondary-button wire:click="$toggle('modalCursoFormVisible')"
                                wire:loading.attr="disabled">
                                {{ __('Cancelar') }}
                            </x-jet-secondary-button>

                            @if ($modelId)
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25'"
                                    wire:click="updateCurso" wire:loading.attr="disabled">
                                    {{ __('Actualizar') }}
                                </button>
                            @else

                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25'"
                                    wire:click="createCurso" wire:loading.attr="disabled">
                                    {{ __('Crear') }}
                                </button>
                            @endif


                        </x-slot>
                    </x-jet-dialog-modal>

                    <x-jet-dialog-modal wire:model="modalCurricularFormVisible">
                        <x-slot name="title">
                            <div class="mx-auto text-center rounded-md">
                                @if ($modelId)
                                    Actualizar Estructura Curricular
                                @else
                                    Agregar Estructura Curricular
                                @endif
                            </div>
                        </x-slot>
                        <x-slot name="content">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Malla Curricular
                                </label>
                                <div class="flex items-center mt-2">
                                    <span class="inline-block w-12 h-12 overflow-hidden bg-gray-100 rounded-full">
                                        @if($photo)
                                        <img class="w-full h-full" src="{{$photo->temporaryUrl() }}">
                                            @else
                                            @if($malla)
                                                <img class="w-full h-full" src="{{$malla }}">
                                                @else
                                                <svg class="w-full h-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            @endif
                                        @endif
                                    </span>
                                    <input type="file" wire:model="photo" class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    @error('malla') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div>
                                    <div class="mt-4">
                                        <label for="about" class="block text-sm font-medium text-gray-700">
                                            Profundizacion
                                        </label>
                                        <label for="title" class="px-2 text-red-700">*</label>
                                            <textarea id="profundizacion" name="profundizacion" rows="3"
                                            class="block w-full px-3 py-2 mt-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model="profundizacion"
                                            placeholder="Profundizacion"></textarea>
                                            @error('profundizacion') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </x-slot>

                        <x-slot name="footer">
                            <x-jet-secondary-button wire:click="$toggle('modalCurricularFormVisible')"
                                wire:loading.attr="disabled">
                                {{ __('Cancelar') }}
                            </x-jet-secondary-button>

                            @if ($modelId)
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25'"
                                    wire:click="updateCurricular" wire:loading.attr="disabled">
                                    {{ __('Actualizar') }}
                                </button>
                            @else

                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25'"
                                    wire:click="createCurricular" wire:loading.attr="disabled">
                                    {{ __('Crear') }}
                                </button>
                            @endif


                        </x-slot>
                    </x-jet-dialog-modal>

                    <x-delete-curso/>

                    <x-delete-curricular/>

                </div>
                </div>
            </div>
            </div>

            </div>
        </div>
    </div>
</div>