<div>

    <div class="flex w-full px-2 mx-auto bg-gray-300 rounded-md max-w-7xl sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-center w-full h-16">
            <h2 class="justify-center w-full text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Cuerpo Académico
            </h2>

            <div class="flex flex-col mt-1 sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
            </div>
        </div>
        <div class="flex w-full p-5 md:w-1/3 md:text-left">
            <div class="absolute flex sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <span class="flex sm:block">
                    <div
                        class="inline-flex items-center justify-center px-4 py-2 ml-4 rounded-md shadow-sm lg:mt-0 lg:ml-4 form-input">
                        <select wire:model='estatus' class="text-sm text-gray-700 outline-none">
                            <option value="Claustro">Profesores Claustro</option>
                            <option value="Colaborador">Profesores Colaboradores</option>
                            <option value="Visitante">Profesores Visitantes</option>
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
            @if ($academicos->count())

            @if($estatus != 'Colaborador' && $estatus != 'Visitante')

                <h1 class="w-full mb-10 ">Profesores Claustro</h1>
            @endif

                @foreach ($academicos as $academico)

                    @if ($academico->estatus == 'Claustro')

                        <div
                            class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                            <article class="overflow-hidden rounded-lg shadow-lg">


                                <a class="cursor-pointer" wire:click="showModal({{ $academico->id }})" wire:loading.attr="disabled">
                                    <img alt="Placeholder" class="block w-full h-44"
                                        {{-- src="https://picsum.photos/600/500/?random"> --}}
                                        src="{{ $academico->profile_photo_path }}">
                                </a>

                                <header
                                    class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-lg">
                                        <a class="text-black no-underline hover:underline">
                                            {{ $academico->nombre_academico }}
                                        </a>
                                    </h1>
                                    <p class="text-sm text-grey-darker">
                                        {{ $academico->estatus }}
                                    </p>
                                </header>
                                <content class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-sm">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $academico->area_especializacion }}

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

                                            {{ $academico->correo }}

                                        </p>
                                        </a>
                                    <a href=" {{ $academico->linkedin }}" target="_blank">
                                        <img class="w-6 h-6"
                                            src="https://www.flaticon.es/svg/static/icons/svg/174/174857.svg" alt="">
                                    </a>
                                    </footer>
                                </article>

                            <!-- END Article -->


                        </div>
                        <!-- END Column -->
                    @endif
                @endforeach

            @if($estatus != 'Claustro' && $estatus != 'Visitante')


                <h1 class="w-full my-10">Profesores Colaboradores</h1>
            @endif

                @foreach ($academicos as $academico)


                    @if ($academico->estatus == 'Colaborador')

                        <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                            <article class="overflow-hidden rounded-lg shadow-lg">

                                <a class="cursor-pointer" wire:click="showModal({{ $academico->id }})" wire:loading.attr="disabled">

                                    <img alt="Placeholder" class="block object-cover w-full h-44"
                                        {{-- src="https://picsum.photos/600/400/?random"> --}}

                                    src="{{ $academico->profile_photo_path }}">

                                </a>

                                <header class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-lg">
                                        <a class="text-black no-underline hover:underline" wire:click="showModal({{ $academico->id }})" wire:loading.attr="disabled">
                                            {{ $academico->nombre_academico }}

                                        </a>
                                    </h1>
                                    <p class="text-sm text-grey-darker">
                                        {{ $academico->estatus }}

                                    </p>
                                </header>
                                <content class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-sm">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $academico->area_especializacion }}

                                        </a>
                                    </h1>
                                </content>
                                <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                                    <a class="flex items-center text-black no-underline hover:underline" href="#">
                                        <svg class="w-6 h-6" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <p class="ml-2 text-sm">
                                            {{ $academico->correo }}
                                        </p>
                                    </a>
                                    <a href=" {{ $academico->linkedin }}" target="_blank">
                                        <img class="w-6 h-6"
                                            src="https://www.flaticon.es/svg/static/icons/svg/174/174857.svg" alt="">
                                    </a>
                                </footer>
                            </article>

                            <!-- END Article -->

                        </div>
                        <!-- END Column -->
                    @endif
                @endforeach

            @if($estatus != 'Claustro' && $estatus != 'Colaborador')


                <h1 class="w-full my-10">Profesores Visitantes</h1>


            @endif

                @foreach ($academicos as $academico)


                    @if ($academico->estatus == 'Visitante')

                        <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                            <article class="overflow-hidden rounded-lg shadow-lg">

                                <a class="cursor-pointer" wire:click="showModal({{ $academico->id }})" wire:loading.attr="disabled">

                                    <img alt="Placeholder" class="block w-full h-44"
                                        {{-- src="https://picsum.photos/600/500/?random"> --}}
                                        src="{{ $academico->profile_photo_path }}">
                                </a>

                                <header class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-lg">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $academico->nombre_academico }}

                                        </a>
                                    </h1>
                                    <p class="text-sm text-grey-darker">
                                        {{ $academico->estatus }}
                                    </p>
                                </header>
                                <content class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-sm">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $academico->area_especializacion }}

                                        </a>
                                    </h1>
                                </content>

                                <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                                    <a class="flex items-center text-black no-underline hover:underline" href="#">
                                        <svg class="w-6 h-6" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <p class="ml-2 text-sm">
                                            {{ $academico->correo }}
                                        </p>
                                    </a>
                                    <a href=" {{ $academico->linkedin }}" target="_blank">
                                        <img class="w-6 h-6"
                                            src="https://www.flaticon.es/svg/static/icons/svg/174/174857.svg" alt="">
                                    </a>
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
                    {{-- Mostrar Académico --}}
                </x-slot>
                <x-slot name="content">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="overflow-hidden bg-gray-800 shadow sm:rounded-lg">
                        <div class="px-4 py-5 border border-gray-900 sm:px-6">
                        <h3 class="text-lg font-medium leading-6 text-white">
                            Información de Interés
                        </h3>
                        </div>
                        <div class="border-t border-gray-200">
                        <dl>
                            <div class="px-4 py-3 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Nombre:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$nombre_academico}}
                            </dd>
                            </div>
                            <div class="px-4 py-3 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Correo:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$correo}}
                            </dd>
                            </div>
                            <div class="px-4 py-3 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Grado Académico:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$grado_academico}}
                            </dd>
                            </div>
                            <div class="px-4 py-3 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                    Área de Especialización:
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{$area_especializacion}}
                            </dd>
                            </div>
                            @if ($proyecto)
                            <div class="px-4 py-3 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Proyecto/Trabajo Destacado:
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <a href="{{$academico->proyecto}}" target="_blank">
                                        {{$academico->proyecto}}
                                    </a>

                                </dd>
                                </div>
                            @endif
                            @if ($publicaciones)
                            <div class="px-4 py-3 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Publicaciones:
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <a href="{{$academico->publicaciones}}" target="_blank">
                                    {{$academico->publicaciones}}
                                    </a>
                                </dd>
                                </div>
                            @endif
                            @if ($trabajo_tesis_supervisado)
                            <div class="px-4 py-3 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Trabajo de anteproyectos supervisado:
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <a href="{{$academico->proyecto}}" target="_blank">
                                    {{$academico->trabajo_tesis_supervisado}}
                                    </a>
                                </dd>
                                </div>
                            @endif
                            @if ($linkedin)
                            <div class="px-4 py-3 bg-gray-100 border border-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Linkedin:
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <a href=" {{ $academico->linkedin }}" target="_blank">
                                        <img class="w-6 h-6"
                                            src="https://www.flaticon.es/svg/static/icons/svg/174/174857.svg" alt="">
                                    </a>

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




