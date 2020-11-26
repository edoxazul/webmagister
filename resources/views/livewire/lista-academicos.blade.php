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
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                                Rut Academico
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
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                                LinkedIn
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
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
                                                        <button type="button"
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
                            <x-create-academico />
                            <x-delete-academico />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


</div>
