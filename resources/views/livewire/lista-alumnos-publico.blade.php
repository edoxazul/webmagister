<div>

    <div class="container px-4 mx-auto my-12 md:px-12">


        <div class="flex flex-wrap -mx-1 lg:-mx-4">

            <!-- Article -->
            <!-- Column -->
            @if ($alumnos->count())

            <h1 class="w-full">Alumnos Regulares</h1>

                @foreach ($alumnos as $alumno)

                    @if ($alumno->estatus_alumno == 'Regular')

                        <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                            <article class="overflow-hidden rounded-lg shadow-lg">

                                <a href="#">
                                    <img alt="Placeholder" class="block w-full h-auto"
                                        src="https://picsum.photos/600/400/?random">
                                </a>

                                <header class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-lg">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $alumno->estatus_alumno }}
                                        </a>
                                    </h1>
                                    <p class="text-sm text-grey-darker">

                                    </p>
                                </header>

                                <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                                    <a class="flex items-center text-black no-underline hover:underline" href="#">
                                        <img alt="Placeholder" class="block rounded-full"
                                            src="https://picsum.photos/32/32/?random">
                                        <p class="ml-2 text-sm">
                                            {{ $alumno->nombre_alumno }}

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

                <h1 class="w-full">Alumnos Egresados</h1>

                @foreach ($alumnos as $alumno)


                    @if ($alumno->estatus_alumno == 'Egresado')

                        <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                            <article class="overflow-hidden rounded-lg shadow-lg">

                                <a href="#">
                                    <img alt="Placeholder" class="block w-full h-auto"
                                        src="https://picsum.photos/600/400/?random">
                                </a>

                                <header class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-lg">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $alumno->estatus_alumno }}
                                        </a>
                                    </h1>
                                    <p class="text-sm text-grey-darker">

                                    </p>
                                </header>

                                <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                                    <a class="flex items-center text-black no-underline hover:underline" href="#">
                                        <img alt="Placeholder" class="block rounded-full"
                                            src="https://picsum.photos/32/32/?random">
                                        <p class="ml-2 text-sm">
                                            {{ $alumno->nombre_alumno }}

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

                <h1 class="w-full">Alumnos en Retiro Voluntario</h1>

                @foreach ($alumnos as $alumno)


                    @if ($alumno->estatus_alumno == 'Retiro Voluntario')

                        <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                            <article class="overflow-hidden rounded-lg shadow-lg">

                                <a href="#">
                                    <img alt="Placeholder" class="block w-full h-auto"
                                        src="https://picsum.photos/600/400/?random">
                                </a>

                                <header class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-lg">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $alumno->estatus_alumno }}
                                        </a>
                                    </h1>
                                    <p class="text-sm text-grey-darker">

                                    </p>
                                </header>

                                <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                                    <a class="flex items-center text-black no-underline hover:underline" href="#">
                                        <img alt="Placeholder" class="block rounded-full"
                                            src="https://picsum.photos/32/32/?random">
                                        <p class="ml-2 text-sm">
                                            {{ $alumno->nombre_alumno }}

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

                <h1 class="w-full">Alumnos Eliminados</h1>

                @foreach ($alumnos as $alumno)


                    @if ($alumno->estatus_alumno == 'Eliminado')

                        <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                            <article class="overflow-hidden rounded-lg shadow-lg">

                                <a href="#">
                                    <img alt="Placeholder" class="block w-full h-auto"
                                        src="https://picsum.photos/600/400/?random">
                                </a>

                                <header class="flex items-center justify-between p-2 leading-tight md:p-4">
                                    <h1 class="text-lg">
                                        <a class="text-black no-underline hover:underline" href="#">
                                            {{ $alumno->estatus_alumno }}
                                        </a>
                                    </h1>
                                    <p class="text-sm text-grey-darker">

                                    </p>
                                </header>

                                <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                                    <a class="flex items-center text-black no-underline hover:underline" href="#">
                                        <img alt="Placeholder" class="block rounded-full"
                                            src="https://picsum.photos/32/32/?random">
                                        <p class="ml-2 text-sm">
                                            {{ $alumno->nombre_alumno }}

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
