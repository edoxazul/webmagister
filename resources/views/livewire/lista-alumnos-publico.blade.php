<div>

    <div class="flex w-full px-2 mx-auto bg-gray-300 rounded-md max-w-7xl sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-center w-full h-16">
            <h2 class="justify-center w-full text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Alumnos
            </h2>

            <div class="flex flex-col mt-1 sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
            </div>
        </div>
        <div class="flex w-full p-5 md:w-1/3 md:text-left">
            <div class="absolute flex sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <span class="flex sm:block">
                    <div
                        class="inline-flex items-center justify-center px-4 py-2 ml-4 rounded-md shadow-sm lg:mt-0 lg:ml-4 form-input">
                        <select wire:model='estado_alumno' class="text-sm text-gray-700 outline-none">
                            <option value="Regular">Alumnos Regulares</option>
                            <option value="Egresado">Alumnos Egresados</option>
                            <option value="Graduado">Alumnos Graduados</option>
                        </select>
                    </div>
                </span>

                <span class="flex ml-3 sm:block">
                    <button wire:click="clear" type="button"
                        class="inline-flex items-center justify-center px-4 py-2 ml-4 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <!-- Heroicon name: link -->
                        X
                    </button>
                </span>
            </div>
        </div>
    </div>

    <div class="container px-4 mx-auto my-12 md:px-12">


        <div class="flex flex-wrap -mx-1 lg:-mx-4">

            <!-- Article -->
            <!-- Column -->
            @if ($alumnos->count())

            @if($estado_alumno != 'Egresado' && $estado_alumno != 'Graduado')

            <h1 class="w-full">Alumnos Regulares</h1>
            @endif

                @foreach ($alumnos as $alumno)

                    @if ($alumno->estado_alumno == 'Regular')

                        <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                            <article class="overflow-hidden rounded-lg shadow-lg">



                                <a class="cursor-pointer" wire:click="showModal({{ $alumno->id }})" wire:loading.attr="disabled">

                                    <img alt="Placeholder" class="block w-full h-44"
                                        {{-- src="https://picsum.photos/600/400/?random"> --}}
                                        src="{{ $alumno->profile_photo_path }}">

                                </a>

                                <header class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-lg">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $alumno->nombre_alumno }}
                                        </a>
                                    </h1>
                                    <p class="text-sm text-grey-darker">

                                    </p>
                                </header>
                                <content class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-sm">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $alumno->estado_alumno }}

                                        </a>
                                    </h1>
                                </content>

                                <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                                    <a class="flex items-center text-black no-underline hover:underline">

                                        {{-- <img alt="Placeholder"
                                            class="block rounded-full" src="https://picsum.photos/32/32/?random"> --}}


                                        <svg class="w-6 h-6" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <p class="ml-2 text-sm">

                                            {{ $alumno->contacto_alumno }}

                                        </p>
                                        </a>
                                        @if($alumno->linkedin)
                                    <a href=" {{ $alumno->linkedin }}" target="_blank">
                                        <img class="w-6 h-6"
                                            src="https://www.flaticon.es/svg/static/icons/svg/174/174857.svg" alt="">
                                    </a>
                                    @endif
                                    </footer>
                            </article>

                            <!-- END Article -->

                        </div>
                        <!-- END Column -->
                    @endif
                @endforeach

            @if($estado_alumno != 'Regular' && $estado_alumno != 'Graduado')


                <h1 class="w-full">Alumnos Egresados</h1>
            @endif

                @foreach ($alumnos as $alumno)


                    @if ($alumno->estado_alumno == 'Egresado')

                        <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                            <article class="overflow-hidden rounded-lg shadow-lg">

                                <a class="cursor-pointer" wire:click="showModal({{ $alumno->id }})" wire:loading.attr="disabled">

                                    <img alt="Placeholder" class="block w-full h-44"
                                        {{-- src="https://picsum.photos/600/400/?random"> --}}
                                        src="{{ $alumno->profile_photo_path }}">

                                </a>

                                <header class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-lg">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $alumno->nombre_alumno }}
                                        </a>
                                    </h1>
                                    <p class="text-sm text-grey-darker">

                                    </p>
                                </header>
                                <content class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-sm">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $alumno->estado_alumno }}

                                        </a>
                                    </h1>
                                </content>

                                <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                                    <a class="flex items-center text-black no-underline hover:underline">

                                        {{-- <img alt="Placeholder"
                                            class="block rounded-full" src="https://picsum.photos/32/32/?random"> --}}


                                        <svg class="w-6 h-6" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <p class="ml-2 text-sm">

                                            {{ $alumno->contacto_alumno }}

                                        </p>
                                        </a>
                                        @if($alumno->linkedin)
                                        <a href=" {{ $alumno->linkedin }}" target="_blank">
                                            <img class="w-6 h-6"
                                                src="https://www.flaticon.es/svg/static/icons/svg/174/174857.svg" alt="">
                                        </a>
                                        @endif
                                    </footer>
                            </article>

                            <!-- END Article -->

                        </div>
                        <!-- END Column -->
                    @endif
                @endforeach
            @if($estado_alumno != 'Regular' && $estado_alumno != 'Egresado')


                <h1 class="w-full">Alumnos Graduados</h1>
            @endif

                @foreach ($alumnos as $alumno)


                    @if ($alumno->estado_alumno == 'Graduado')

                        <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                            <article class="overflow-hidden rounded-lg shadow-lg">

                                <a class="cursor-pointer" wire:click="showModal({{ $alumno->id }})" wire:loading.attr="disabled">

                                    <img alt="Placeholder" class="block w-full h-44"
                                        {{-- src="https://picsum.photos/600/400/?random"> --}}
                                        src="{{ $alumno->profile_photo_path }}">

                                </a>

                                <header class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-lg">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $alumno->nombre_alumno }}
                                        </a>
                                    </h1>
                                    <p class="text-sm text-grey-darker">

                                    </p>
                                </header>
                                <content class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-sm">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $alumno->estado_alumno }}

                                        </a>
                                    </h1>
                                </content>

                                <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                                    <a class="flex items-center text-black no-underline hover:underline">

                                        {{-- <img alt="Placeholder"
                                            class="block rounded-full" src="https://picsum.photos/32/32/?random"> --}}


                                        <svg class="w-6 h-6" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <p class="ml-2 text-sm">

                                            {{ $alumno->contacto_alumno }}

                                        </p>
                                        </a>
                                        @if($alumno->linkedin)
                                        <a href=" {{ $alumno->linkedin }}" target="_blank">
                                            <img class="w-6 h-6"
                                                src="https://www.flaticon.es/svg/static/icons/svg/174/174857.svg" alt="">
                                        </a>
                                        @endif
                                    </footer>
                            </article>

                            <!-- END Article -->

                        </div>
                        <!-- END Column -->
                    @endif
                @endforeach

            @endif
        </div>

            <x-jet-dialog-modal wire:model="modalMostrarVisible">
                <x-slot name="title">
                    {{-- Detalle del Alumno --}}
                </x-slot>
                <x-slot name="content">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="overflow-hidden bg-gray-800 shadow sm:rounded-lg">
                        <div class="px-4 py-5 border border-gray-200 sm:px-6">
                        <h3 class="text-lg font-medium leading-6 text-white">
                            Información de Interés
                        </h3>
                        </div>
                        <div class="border-t border-gray-200">
                        <dl>
                            <div class="px-4 py-5 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Nombre:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$nombre_alumno}}
                            </dd>
                            </div>
                            <div class="px-4 py-5 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Correo:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$contacto_alumno}}
                            </dd>
                            </div>
                            <div class="px-4 py-5 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Carrera/Título:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$carrera_alumno}}
                            </dd>
                            </div>
                            {{-- <div class="px-4 py-5 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Estado:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$estado_alumno}}
                            </dd>
                            </div> --}}
                            <div class="px-4 py-5 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Fecha de ingreso
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{date("d/m/Y", strtotime($anio_ingreso))}}
                            </dd>
                            </div>
                            @if ($estado_alumno!= 'Regular' && $estado_alumno !='Egresado')
                            <div class="px-4 py-5 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Fecha de Graduación
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{date("d/m/Y", strtotime($anio_graduacion))}}
                                </dd>
                                </div>
                            @endif
                            @if ($trabajo_anteproyecto)
                            <div class="px-4 py-5 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Proyecto de Tesis:
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <a href="{{$trabajo_anteproyecto}}" target="_blank">

                                    {{$trabajo_anteproyecto}}

                                    </a>

                                </dd>
                                </div>
                            @endif
                            @if ($linkedin)
                            <div class="px-4 py-5 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Linkedin:
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <a href=" {{ $linkedin }}" target="_blank">
                                        <img class="w-6 h-6"
                                            src="https://www.flaticon.es/svg/static/icons/svg/174/174857.svg" alt="">
                                    </a>
                                </dd>
                                </div>
                            @endif
                            @if ($web)
                            <div class="px-4 py-5 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Página Web
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <a href=" {{ $web }}" target="_blank">{{$web}}</a>
                                </dd>
                                </div>
                            @endif
                        </dl>
                        </div>
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="show()" wire:loading.attr="disabled">
                        Volver
                    </x-jet-secondary-button>
                </x-slot>
            </x-jet-dialog-modal>

    </div>
</div>
