<div>

    <div class="container px-4 mx-auto my-12 md:px-12">


        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            <div class="mt-1 ml-6 rounded-md shadow-sm form-input">
                <select wire:model='estatus' class="text-sm text-gray-700 outline-none">
                    <option value="Claustro">Claustro</option>
                    <option value="Colaborador">Colaborador</option>
                    <option value="Visitante">Visitante</option>
                </select>
            </div>
            <button wire:click="clear" class="block mt-1 ml-3 rounded-md shadow-sm form-input"> X </button>

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
                                        src="https://picsum.photos/600/400/?random">
                                </a>

                                <header class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-lg">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $academico->estatus }}
                                        </a>
                                    </h1>
                                    <p class="text-sm text-grey-darker">
                                        14/4/19
                                    </p>
                                </header>

                                <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                                    <a class="flex items-center text-black no-underline hover:underline" href="#">
                                        <img alt="Placeholder" class="block rounded-full"
                                            src="https://picsum.photos/32/32/?random">
                                        <p class="ml-2 text-sm">
                                            {{ $academico->nombre_academico }}

                                        </p>
                                    </a>
                                    <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                        <span class="hidden">Like</span>
                                        <i class="fa fa-heart"></i>
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
                                    <img alt="Placeholder" class="block w-full h-auto"
                                        src="https://picsum.photos/600/400/?random">
                                </a>

                                <header class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-lg">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $academico->estatus }}
                                        </a>
                                    </h1>
                                    <p class="text-sm text-grey-darker">
                                        14/4/19
                                    </p>
                                </header>

                                <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                                    <a class="flex items-center text-black no-underline hover:underline" href="#">
                                        <img alt="Placeholder" class="block rounded-full"
                                            src="https://picsum.photos/32/32/?random">
                                        <p class="ml-2 text-sm">
                                            {{ $academico->nombre_academico }}

                                        </p>
                                    </a>
                                    <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                        <span class="hidden">Like</span>
                                        <i class="fa fa-heart"></i>
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
                                        src="https://picsum.photos/600/400/?random">
                                </a>

                                <header class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-lg">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $academico->estatus }}
                                        </a>
                                    </h1>
                                    <p class="text-sm text-grey-darker">
                                        14/4/19
                                    </p>
                                </header>

                                <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                                    <a class="flex items-center text-black no-underline hover:underline" href="#">
                                        <img alt="Placeholder" class="block rounded-full"
                                            src="https://picsum.photos/32/32/?random">
                                        <p class="ml-2 text-sm">
                                            {{ $academico->nombre_academico }}

                                        </p>
                                    </a>
                                    <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                        <span class="hidden">Like</span>
                                        <i class="fa fa-heart"></i>
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
