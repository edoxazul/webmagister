<div>
    <div class="flex w-full px-2 mx-auto bg-gray-300 rounded-md max-w-7xl sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-center w-full h-16">
            <h2 class="justify-center w-full text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                 Noticias Magíster
            </h2>
{{--
            <div class="flex flex-col mt-1 sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
            </div> --}}
        </div>
    </div>

    <div class="container px-4 mx-auto my-12 md:px-12">

            <div class="flex flex-wrap -mx-1 lg:-mx-4">

                @if ($noticias->count())

                    @foreach ($noticias as $noticia)

                        @if ($noticia->estatus == 'Visible')
                        <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
                            <article class="overflow-hidden rounded-lg shadow-lg">
                                <div class="flex flex-wrap -mx-4">
                                    <div class="mr-5 bg-white blogs">
                                            <img src="{{ $noticia->noticia_photo_path }}">
                                                <div class="p-10">
                                                        <h1 class="py-2 text-2xl font-bold text-blue-800">{{ $noticia->titulo_noticia }}</h1>
                                                        <p class="text-sm text-black bg-white">{{ $noticia->descripcion_noticia }}</p>
                                                        <a href="" wire:click='visualizar' class="inline-block px-3 px-6 py-2 mt-4 text-white bg-orange-500 rounded">Leer más</a>
                                                </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
    </div>
</div>
