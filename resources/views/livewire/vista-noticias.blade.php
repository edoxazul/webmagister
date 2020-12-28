<div class="flex w-full px-2 mx-auto bg-gray-300 rounded-md max-w-7xl sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-center w-full h-16">
        <h2 class="justify-center w-full text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
             Noticias Magíster
        </h2>
        @livewire('VistaNoticias', ['id' => $id])
        Título: {{ $noticia->titulo_noticia }}
        Cuerpo: {{ $noticia->descripcion_noticia }}
    </div>


</div>
