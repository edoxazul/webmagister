<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Academicos') }}
        </h2>
    </x-slot>

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
                    </div>






                </div>

                    @if ($academicos->count())
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre Academico
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Rut Academico
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Proyecto
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Publicación
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tipo de profesor
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            LinkedIn
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Opciones
                        <th scope="col" class="px-6 py-3 bg-gray-50">
                            <span class="sr-only">Editar</span>
                        </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($academicos as $academico)
                        <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                {{$academico->nombre_academico}}
                                </div>
                                <div class="text-sm text-gray-500">
                                {{$academico->correo}}
                                </div>
                            </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{$academico->rut_academico}}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{$academico->proyecto}}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{$academico->publicaciones}}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{$academico->estatus}}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                <a href=" {{$academico->linkedin}}">
                                <img class="h-6 w-6" src="https://www.flaticon.es/svg/static/icons/svg/174/174857.svg" alt="">
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                        </td>
                        </tr>
                        @endforeach

                        <!-- More rows... -->
                    </tbody>
                    </table>
                    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    {{$academicos->links()}}
                    </div>
                    @else
                    <div class="bg-white px-4 py-3 border-t text-gray-500 border-gray-200 sm:px-6">
                        No hay resultados para la busqueda "{{$search}}" en la página {{$page}} al mostrar {{$perPage}} academicos por página
                    </div>
                    @endif
                </div>
                </div>
            </div>
            </div>

            </div>
        </div>
    </div>


</div>
