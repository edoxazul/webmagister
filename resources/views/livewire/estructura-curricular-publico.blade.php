<div>
    <div class="flex w-full px-2 mx-auto bg-gray-300 rounded-md max-w-7xl sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-center w-full h-16">
            <h2 class="justify-center w-full text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Estructura Curricular
            </h2>
        </div>
    </div>
    @if ($curriculars->count())
        @foreach ($curriculars as $curricular)
            <div class="max-w-xl px-0 py-8 m-auto">
                <div class="bg-white shadow-2xl" >
                    <div>
                        <img src={{$curricular->malla}}>
                    </div>
                    <div class="px-4 py-2 mt-2 bg-white">
                        <h2 class="text-2xl font-bold text-gray-800">Líneas de Profundización</h2>
                            <p class="px-2 my-3 mr-1 text-xs text-gray-700 sm:text-sm">
                                {!!  nl2br(e($curricular->profundizacion)) !!}
                            </p>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="container px-4 mx-auto my-12 md:px-12">
            @if ($cursos->count())

                <div class="flex flex-col mt-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Nombre del Curso
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Descripción del Curso
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Caracter del Curso
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Descargar Programa
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($cursos as $curso)


                                    <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $curso->nombre_curso }} </div>
                                            </div>
                                        </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $curso->descripcion_curso }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $curso->caracter }}</div>
                                        </td>
                                        <td class="px-20 py-4 font-medium text-center whitespace-nowrap">
                                            <div class="text-gray-900 text-sm-center">
                                                <a href=" {{ $curso->enlace_curso }}" download="{{ $curso->archivo_curso}}" >
                                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
    </div>
    @else
        <div class="text-center font-bold text-2xl text-gray-800">
            <p>
                No existe Estructura Corricular
            </p>
        </div>
    @endif


</div>
