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
                            <option value="Claustro">Claustro</option>
                            <option value="Colaborador">Colaborador</option>
                            <option value="Visitante">Visitante</option>
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

                <h1 class="w-full">Profesores Claustro</h1>

                @foreach ($academicos as $academico)

                    @if ($academico->estatus == 'Claustro')

                        <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                            <article class="overflow-hidden rounded-lg shadow-lg">

                                <a href="#">
                                    <img alt="Placeholder" class="block w-full h-auto"
                                        src="https://picsum.photos/600/500/?random">
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

                                <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                                    <a class="flex items-center text-black no-underline hover:underline" href="#">
                                        {{-- <img alt="Placeholder" class="block rounded-full"
                                            src="https://picsum.photos/32/32/?random"> --}}

                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                        <p class="ml-2 text-sm">

                                            {{ $academico->correo }}

                                        </p>
                                    </a>
                                    <a href=" {{ $academico->linkedin }}">
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

                <h1 class="w-full">Profesores Colaboradores</h1>

                @foreach ($academicos as $academico)


                    @if ($academico->estatus == 'Colaborador')

                        <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                            <article class="overflow-hidden rounded-lg shadow-lg">

                                <a href="#">
                                    <img alt="Placeholder" class="block object-cover w-full h-auto"
                                        {{-- src="https://picsum.photos/600/400/?random"> --}}
                                        src="{{$academico->profile_photo_path }}">

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

                                <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                                    <a class="flex items-center text-black no-underline hover:underline" href="#">
                                        <img alt="Placeholder" class="block rounded-full"
                                            src="https://picsum.photos/32/32/?random">
                                        <p class="ml-2 text-sm">
                                            {{ $academico->correo }}
                                        </p>
                                    </a>
                                    <a href=" {{ $academico->linkedin }}">
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

                <h1 class="w-full">Profesores Visitantes</h1>

                @foreach ($academicos as $academico)


                    @if ($academico->estatus == 'Visitante')

                        <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                            <article class="overflow-hidden rounded-lg shadow-lg">

                                <a href="#">
                                    <img alt="Placeholder" class="block w-full h-auto"
                                        src="https://picsum.photos/600/500/?random">
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

                                <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                                    <a class="flex items-center text-black no-underline hover:underline" href="#">
                                        <img alt="Placeholder" class="block rounded-full"
                                            src="https://picsum.photos/32/32/?random">
                                        <p class="ml-2 text-sm">
                                            {{ $academico->correo }}
                                        </p>
                                    </a>
                                    <a href=" {{ $academico->linkedin }}">
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
    </div>


</div>
