<div>
    <div class="flex w-full px-2 mx-auto bg-gray-300 rounded-md max-w-7xl sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-center w-full h-16">
            <h2 class="justify-center w-full text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Noticias Magíster
            </h2>
        </div>
    </div>

    <div class="container px-4 mx-auto my-12 md:px-12">
            <div class="flex flex-wrap -mx-1 lg:-mx-4">
                @if ($noticias->count())
                    @foreach ($noticias as $noticia)
                        @if ($noticia->estado_noticia == 'Visible')
                            <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                                <article class="overflow-hidden rounded-lg shadow-lg">
                                    <div class="flex flex-wrap -mx-4">
                                        <div class="mr-5 bg-white blogs">
                                            <a class="" wire:click="showModal({{ $noticia->id }})" wire:loading.attr="disabled">
                                                <img src="{{ $noticia->noticia_photo_path }}" class="block object-cover w-full h-44" >
                                                    <div class="p-10">
                                                            <p class="text-sm text-gray-500 bg-white"> {{ $noticia->autor_noticia }} |  {{date("d/m/Y", strtotime($noticia->created_at))}}</p>
                                                            <h1 class="py-2 text-2xl font-bold text-blue-800">{{ $noticia->titular_noticia }}</h1>
                                                            <p class="text-sm text-black bg-white">{{ Str::limit($noticia->cuerpo_noticia,200)}}</p>
                                                            {{-- @livewire('vista-noticias', ['noticia' => $noticia], key($user->id)) --}}
                                                            <a href="{{ route('ver-noticia', ['id'=>$noticia->id])}}" target="_blank" class="inline-block px-3 px-6 py-2 mt-4 text-white bg-orange-500 rounded">Leer más</a>
                                                    </div>
                                            </a>
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
