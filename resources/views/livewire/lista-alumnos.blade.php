<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alumnos') }}
        </h2>
    </x-slot>

    {{-- <x-lightbox/> --}}



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <div class="flex bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                        <input
                        wire:model='search'
                        class="form-input shadow-sm mt-1 rounded-md w-full"
                        type="text"
                        placeholder="Buscar...">

                        <div class="form-input shadow-sm mt-1 ml-6 rounded-md">
                            <select wire:model='perPage' class="outline-none text-gray-500 text-sm">
                            <option value="5"> 5 por página</option>
                            <option value="10"> 10 por página</option>
                            <option value="15"> 15 por página</option>
                            </select>
                        </div>
                        @if($search !== '')
                        <button wire:click="clear" class="form-input shadow-sm mt-1 ml-6 rounded-md block"> X </button>
                        @endif
                        {{-- Agregar Alumno --}}


                        <span class="hidden sm:block">
                            <button
                            {{-- wire:click="crearAlumno()" --}}
                            type="button"
                            class="px-4 py-2 border mt-1 ml-6 border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-green-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre Alumno
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Rut Alumno
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Carrera
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Año Ingreso
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            LinkedIn
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                {{$alumno->nombre_pregrado_alumno}}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{$alumno->anio_ingreso}}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">

                            <div class="text-sm text-gray-900">
                                {{$alumno->estatus_alumno}}
                            </div>

                        </td>


                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                <a href=" {{$alumno->linkedin}}">
                                <img class="h-6 w-6" src="https://www.flaticon.es/svg/static/icons/svg/174/174857.svg" alt="">
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <span class="hidden sm:block">
                                {{-- Editar --}}
                                <button type="button" class="inline-flex items-center px-1 py-1 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <!-- Heroicon name: pencil -->
                                    <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </button>
                            </span>
                            {{-- <a href="#" class="text-indigo-600 hover:text-indigo-900">Editar</a> --}}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            {{-- Eliminar --}}
                            <span class="hidden sm:block">

                                    <button wire:click="deleteShowModal({{ $alumno->id }})" wire:loading.attr="disabled" class="w-full inline-flex justify-center items-center px-1 py-1 rounded-md border border-transparent shadow-sm  bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
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
                    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    {{$alumnos->links()}}
                    </div>
                    @else
                    <div class="bg-white px-4 py-3 border-t text-gray-500 border-gray-200 sm:px-6">
                        No hay resultados para la busqueda "{{$search}}" en la página {{$page}} al mostrar {{$perPage}} alumnos por página
                    </div>
                    @endif

                    <x-delete-alumno/>


                </div>
                </div>
            </div>
            </div>

            </div>
        </div>
    </div>
</div>
