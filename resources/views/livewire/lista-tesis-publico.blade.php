<div>


    <div class="flex w-full px-2 mx-auto bg-gray-300 rounded-md max-w-7xl sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-center w-full h-16">
            <h2 class="justify-center w-full text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Anteproyectos
            </h2>
            {{-- Busqueda  --}}
            <input
            wire:model='search'
            class="w-full mt-1 rounded-md shadow-sm form-input"
            type="text"
            placeholder="Buscar...">

            @if($search !== '')
            <button wire:click="clear" class="block mt-1 ml-6 rounded-md shadow-sm form-input"> X </button>
            @endif
        </div>



    </div>

    <div class="container px-4 mx-auto my-12 md:px-12">
            @if ($tesis->count())

                <div class="flex flex-col mt-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Titulo Anteproyecto
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Autor
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Tutor
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Estado
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Año de Aprobación
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Anteproyecto
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Resumen Tesis
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($tesis as $anteproyecto)
                                    @if ($anteproyecto->estatus != 'Rechazado' && $anteproyecto->estatus != 'Eliminado')
                                    <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $anteproyecto->titulo }} </div>
                                            </div>
                                        </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $anteproyecto->autor }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $anteproyecto->tutor }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $anteproyecto->estatus }}</div>
                                        </td>
                                        <td class="px-8 py-4 whitespace-nowrap">
                                        <span class="text-sm text-gray-900">
                                            @if ($anteproyecto->estatus=='Aprobado')
                                            {{date("Y", strtotime($anteproyecto->anio_aprobacion))}}
                                            @endif</span>
                                        </td>
                                        <td class="py-4 px-15 whitespace-nowrap">
                                            <div class="text-gray-900 text-sm-center">
                                                {{-- <a href=" {{ $archivo->enlace_archivo }} " target="_blank"> --}}
                                                <a href=" {{ $anteproyecto->anteproyecto_path }}" download="{{ $anteproyecto->archivo_anteproyecto }}" >
                                                    {{-- <a href="{{ asset('storage/'. $archivo->enlace_archivo) }}" download="{{$archivo->file_original_name}}"></a> --}}
                                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="py-4 px-15 whitespace-nowrap">
                                            <div class="text-gray-900 text-sm-center">
                                                {{-- <a href=" {{ $archivo->enlace_archivo }} " target="_blank"> --}}
                                                <a href=" {{ $anteproyecto->resumentesis_path }}" download="{{ $anteproyecto->archivo_resumentesis }}" >
                                                    {{-- <a href="{{ asset('storage/'. $archivo->enlace_archivo) }}" download="{{$archivo->file_original_name}}"></a> --}}
                                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>

</div>
