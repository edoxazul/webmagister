<div>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Academicos') }}
        </h2>
    </x-slot>

    {{--
    <x-lightbox /> --}}



    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
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
                                            <option value="5"> 5 por página</option>
                                            <option value="10"> 10 por página</option>
                                            <option value="15"> 15 por página</option>
                                        </select>
                                    </div>
                                    @if ($search !== '')
                                        <button wire:click="clear"
                                            class="block mt-1 ml-6 rounded-md shadow-sm form-input"> X </button>
                                    @endif
                                    {{-- Agregar Academico
                                    --}}


                                    <span class="hidden sm:block">
                                        <button wire:click="createShowModal" {{--
                                            wire:click="crearAcademico()" --}} type="button"
                                            class="px-4 py-2 mt-1 ml-6 text-sm font-medium text-gray-700 bg-green-200 border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <!-- Heroicon name: add -->
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                                </path>
                                            </svg>
                                        </button>
                                    </span>


                                </div>


                            </div>

                            @if ($academicos->count())
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                                Nombre Academico
                                            </th>
                                            <th scope="col"
                                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                                Rut Academico
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                                Grado Academico
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                                Proyecto
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                                Publicación
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                                Tipo de profesor
                                            </th>
                                            <th scope="col"
                                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                                LinkedIn
                                            </th>
                                            <th scope="col"
                                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                                Opciones
                                            <th scope="col" class="px-2 py-3 bg-gray-50">
                                                <span class="sr-only">Editar</span>
                                            </th>
                                            <th scope="col" class="px-2 py-3 bg-gray-50">
                                                <span class="sr-only">Eliminar</span>
                                            </th>
                                            </th>
                                        </tr>
                                    </thead>


                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($academicos as $academico)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div x-data={} class="flex-shrink-0 w-10 h-10">
                                                            <div class="bg-gray-400 ">
                                                                <a {{--
                                                                    @click="$dispatch('img-modal', {imgModalSrc: {{ $academico->profile_photo_path }}'})"
                                                                    --}}
                                                                    class="cursor-pointer">
                                                                    <img class="w-10 h-10 rounded-full"
                                                                        alt="Placeholder" class="w-full object-fit"
                                                                        src="{{ $academico->profile_photo_path }}">
                                                                </a>
                                                            </div>
                                                            {{-- <img
                                                                class="w-10 h-10 rounded-full"
                                                                src="{{ $academico->profile_photo_path }}" alt="">
                                                            --}}


                                                            {{-- <img
                                                                class="w-10 h-10 rounded-full"
                                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60"
                                                                alt=""> --}}
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $academico->nombre_academico }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                {{ $academico->correo }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $academico->rut_academico }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $academico->grado_academico }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $academico->proyecto }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $academico->publicaciones }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $academico->estatus }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        <a href=" {{ $academico->linkedin }}">
                                                            <img class="w-6 h-6"
                                                                src="https://www.flaticon.es/svg/static/icons/svg/174/174857.svg"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                    <span class="hidden sm:block">
                                                        {{-- Editar
                                                        --}}
                                                        <button wire:click="updateShowModal({{ $academico->id }})"
                                                            type="button"
                                                            class="inline-flex items-center px-1 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                            <!-- Heroicon name: pencil -->
                                                            <svg class="w-6 h-6 text-gray-500"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                fill="currentColor" aria-hidden="true">
                                                                <path
                                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                            </svg>
                                                        </button>
                                                    </span>
                                                    {{-- <a href="#"
                                                        class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                                    --}}
                                                </td>

                                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                    {{-- Eliminar
                                                    --}}
                                                    <span class="hidden sm:block">

                                                        <button wire:click="deleteShowModal({{ $academico->id }})"
                                                            wire:loading.attr="disabled"
                                                            class="inline-flex items-center justify-center w-full px-1 py-1 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                </path>
                                                            </svg>
                                                        </button>



                                                    </span>
                                                </td>
                                            </tr>


                                        @endforeach

                                        <!-- More rows... -->
                                    </tbody>
                                </table>
                                <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                                    {{ $academicos->links() }}
                                </div>
                            @else
                                <div class="px-4 py-3 text-gray-500 bg-white border-t border-gray-200 sm:px-6">
                                    No hay resultados para la busqueda "{{ $search }}" en la página {{ $page }} al
                                    mostrar {{ $perPage }} academicos por página
                                </div>
                            @endif


                            {{-- Modal Form --}}
                            <x-jet-dialog-modal wire:model="modalFormVisible">
                                <x-slot name="title">
                                    <div class="mx-auto text-center rounded-md">
                                        @if ($modelId)
                                            Actualizar Academico
                                        @else
                                            Agregar Academico
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
                                        <div class="col-span-6 mt-2 sm:col-span-3">
                                            <div class="flex">
                                                <x-jet-label for="nombre_academico" value="Nombre" />
                                                <label for="title" class="px-2 text-red-700">*</label>
                                            </div>
                                            <x-jet-input id="nombre_academico" class="block w-full mt-1" type="text"
                                                placeholder="Nombre del academico" wire:model="nombre_academico" />
                                            @error('nombre_academico') <span
                                                class="error">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-span-6 mt-2 sm:col-span-3 form-group">
                                            <div class="flex">
                                                <x-jet-label for="rut_academico" value="Rut" />
                                                <label for="title" class="px-2 text-red-700">*</label>
                                            </div>
                                            <x-jet-input id="rut_academico" class="block w-full mt-1" type="text"
                                                placeholder="12.345.678-9" wire:model="rut_academico" />
                                            @error('rut_academico') <span class="error">{{ $message }}</span> @enderror

                                        </div>

                                        <div class="col-span-6 mt-2 sm:col-span-3">
                                            <div class="flex">
                                                <x-jet-label for="fecha_nacimiento" value="Fecha de Nacimiento" />
                                                <label for="title" class="px-2 text-red-700">*</label>
                                            </div>
                                            <x-jet-input id="fecha_nacimiento" class="block w-full mt-1 text-black" type="date" value="\Carbon\Carbon::now()"
                                                placeholder="2000/12/31" wire:model="fecha_nacimiento" />
                                                {{-- {{ Form::date('fecha_nacimiento', \Carbon\Carbon::now(), [''],null,['class' => 'wire:model="fecha_nacimiento"'])}} --}}

                                            @error('fecha_nacimiento') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 mt-2 sm:col-span-3">
                                            <div class="flex">
                                                <x-jet-label for="grado_academico" value="Grado Academico" />
                                                <label for="title" class="px-2 text-red-700">*</label>
                                            </div>
                                            <x-jet-input id="grado_academico" class="block w-full mt-1" type="text"
                                                placeholder="Ej: Magister,Doctorado" wire:model="grado_academico" />
                                            @error('grado_academico') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 mt-2 sm:col-span-3">
                                            <div class="flex">
                                                <x-jet-label for="correo" value="Correo" />
                                                <label for="title" class="px-2 text-red-700">*</label>
                                            </div>
                                            <x-jet-input id="correo" class="block w-full mt-1" type="text"
                                                placeholder="Ej: user@email.com" wire:model="correo" />
                                            @error('correo') <span class="error">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-span-6 mt-2 sm:col-span-3">
                                            <div class="flex">
                                                <x-jet-label for="proyecto" value="Proyecto" />
                                                <label for="title"
                                                    class="block px-2 text-sm font-medium text-gray-400">(Opcional)</label>
                                            </div>
                                            <x-jet-input id="proyecto" class="block w-full mt-1" type="text"
                                                placeholder="Enlace al proyecto" wire:model="proyecto" />
                                            @error('proyecto') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-span-6 mt-2 sm:col-span-3">
                                            <div class="flex">
                                                <x-jet-label for="publicaciones" value="Publicaciones" />
                                                <label for="title"
                                                    class="block px-2 text-sm font-medium text-gray-400">(Opcional)</label>
                                            </div>
                                            <x-jet-input id="publicaciones" class="block w-full mt-1" type="text"
                                                placeholder="Publicación" wire:model="publicaciones" />
                                            @error('publicaciones') <span class="error">{{ $message }}</span> @enderror


                                        </div>
                                        <div class="col-span-6 mt-2 sm:col-span-3">
                                            <div class="flex">
                                                <x-jet-label for="linkedin" value="LinkedIn" />
                                                <label for="title"
                                                    class="block px-2 text-sm font-medium text-gray-400">(Opcional)</label>
                                            </div>
                                            <x-jet-input id="linkedin" class="block w-full mt-1" type="text"
                                                placeholder="LinkedIn" wire:model="linkedin" />
                                            @error('linkedin') <span class="error">{{ $message }}</span> @enderror

                                        </div>
                                        <div class="col-span-6 mt-2 sm:col-span-3">
                                            <div class="flex">
                                                <label for="estatus" value="estatus"
                                                    class="block text-sm font-medium text-gray-700">Estatus</label>
                                                <label for="title" class="px-2 text-red-700">*</label>
                                            </div>
                                            <x-jet-input id="estatus" class="block w-full mt-1" type="text"
                                                placeholder="Ej: Claustro,Colaborador,Visitante" wire:model="estatus" />
                                            @error('estatus') <span class="error">{{ $message }}</span> @enderror


                                            {{-- <select id="estatus" type="text"
                                                wire:model="estatus"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option type="text" id="estatus" value="Claustro">Claustro</option>
                                                <option type="text" id="estatus" value="Visitante">Visitante</option>
                                                <option type="text" id="estatus" value="Colaborador">Colaborador
                                                </option>
                                            </select> --}}
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




                            {{--
                            <x-create-academico /> --}}
                            <x-delete-academico />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


</div>
