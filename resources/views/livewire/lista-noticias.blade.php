{{-- <head>
    <link rel="stylesheet" type="text/css" href="trix.css">
    <script type="text/javascript" src="trix.js"></script>
  </head> --}}
<div>

    <x-slot name="header">
        {{-- @livewireStyles --}}
        {{-- <link rel="stylesheet" type="text/css" href="trix.css"> --}}
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.2.3/dist/trix.css"> --}}
        {{-- <link rel="stylesheet" href="/css/main.css?1607134092767489000"> --}}
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous"> --}}
        {{-- @livewireScripts --}}
        {{-- <script src="https://unpkg.com/moment"></script>
        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
        <script src="https://unpkg.com/trix@1.2.3/dist/trix.js"></script>
        <script src="js/attachments.js"></script>
        <script type="text/javascript" src="trix.js"></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous"></script> --}}
        {{-- <script src="/js/attachments.js?1607134092767489000"></script> --}}
        {{-- <script type="text/javascript" src="trix.js"></script> --}}
        {{-- <script>
          Trix.config.attachments.preview.caption = { name: false, size: false }
        </script> --}}



        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Noticias') }}
        </h2>
        {{-- @trixassets --}}
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-5">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                <div class="flex px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                                    <input wire:model='search' class="w-full mt-1 rounded-md shadow-sm form-input"
                                        type="text" placeholder="Buscar...">

                                    <div class="mt-1 ml-6 rounded-md shadow-sm form-input">
                                        <select wire:model='perPage' class="text-sm text-gray-500 outline-none">
                                            <option value="10"> 10 por página</option>
                                            <option value="15"> 15 por página</option>
                                        </select>
                                    </div>
                                    @if ($search !== '')
                                        <button wire:click="clear"
                                            class="block mt-1 ml-6 rounded-md shadow-sm form-input"> X </button>
                                    @endif
                                    {{-- Agregar Noticia--}}


                                    <span class="hidden sm:block">
                                        <button wire:click="createShowModal" {{--
                                            wire:click="crearNoticia()" --}} type="button"
                                            class="px-4 py-2 mt-1 ml-6 text-sm font-medium text-gray-700 bg-green-200 border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <!-- Heroicon name: add -->
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                        </button>
                                    </span>


                                </div>


                            </div>

                            @if ($noticias->count())
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-10 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                                Foto Noticia
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                                Titular Noticia
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                                Cuerpo Noticia
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                                Autor Noticia
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                                Fecha Publicación
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                                Estado Noticia
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                                Opciones
                                            <th scope="col" class="px-2 py-3 bg-gray-50">
                                                <span class="sr-only">Editar</span>
                                            </th>
                                            {{-- <th scope="col" class="px-2 py-3 bg-gray-50">
                                                <span class="sr-only">Eliminar</span>
                                            </th>
                                            </th> --}}
                                        </tr>
                                    </thead>


                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($noticias as $noticia)
                                            <tr>
                                                <td class="px-10 py-10 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div x-data={} class="flex-shrink-0 w-30 h-30">
                                                            <div class="bg-gray-400 ">
                                                                <a {{--
                                                                    @click="$dispatch('img-modal', {imgModalSrc: {{ $noticia->noticia_photo_path }}'})"
                                                                    --}}
                                                                    class="cursor-pointer">
                                                                    <img class="w-20 h-20" alt="Placeholder"
                                                                        class="w-full object-fit"
                                                                        src="{{ $noticia->noticia_photo_path }}">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $noticia->titular_noticia }}
                                                        </div>
                                                    </div>
                        </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{-- <div class="text-sm text-gray-900">
                                {{ Str::limit($noticia->cuerpo_noticia,200)}}
                            </div> --}}
                            <center>
                            <div class="trix-content"> {!! Str::limit($noticia->cuerpo_noticia,200) !!}</div>
                            <center>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ $noticia->autor_noticia }}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{date("d/m/Y", strtotime($noticia->created_at))}}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                @if ($noticia->estado_noticia == 'Visible')
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                @else
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                                @endif
                            </div>
                        </td>

                        {{-- Visualizar --}}

                    <td class="flex px-2 text-sm font-medium text-right py-15 whitespace-nowrap">
                            <span class="hidden sm:block">
                                {{-- Editar--}}
                                <button wire:click="updateShowModal({{ $noticia->id }})" type="button"
                                    class="inline-flex items-center px-1 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-1 sm:w-auto sm:text-sm">
                                    <!-- Heroicon name: pencil -->
                                    <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </button>
                            </span>

                            {{-- Editar Trix--}}

                            {{-- <span class="hidden sm:block">
                                <button
                                wire:click="updateTrixEditorShowModal({{ $noticia->id }})"
                                type="button"
                                class="inline-flex items-center px-1 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <!-- Heroicon name: pencil -->
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </button>
                            </span> --}}

                            {{-- Eliminar--}}
                            <span class="hidden sm:block">
                                <button wire:click="deleteShowModal({{ $noticia->id }})" wire:loading.attr="disabled"
                                    class="inline-flex items-center justify-center w-full px-1 py-1 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-1 sm:w-auto sm:text-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            {{-- Eliminar
                            --}}
                            {{-- <span class="hidden sm:block">

                                <button wire:click="deleteShowModal({{ $academico->id }})"
                                    wire:loading.attr="disabled"
                                    class="inline-flex items-center justify-center w-full px-1 py-1 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button> --}}
                            {{-- </span> --}}
                        </td>
                    </tr>


                        @endforeach

                        <!-- More rows... -->
                        </tbody>
                        </table>
                        <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                            {{ $noticias->links() }}
                        </div>
                    @else
                        <div class="px-4 py-3 text-gray-500 bg-white border-t border-gray-200 sm:px-6">
                            No hay resultados para la busqueda "{{ $search }}" en la página {{ $page }} al
                            mostrar {{ $perPage }} noticias por página
                        </div>
                        @endif
                        {{-- Modal Form --}}
                        {{-- <x-jet-dialog-modal wire:model="modalFormVisible">
                            <x-slot name="title">
                                <div class="mx-auto text-center rounded-md">
                                    Agregar Noticia
                                </div>
                            </x-slot> --}}

                            <x-jet-dialog-modal wire:model="modalFormVisible">
                                <x-slot name="title">
                                    <div class="mx-auto text-center rounded-md">
                                        @if ($modelId)
                                            Actualizar Noticia
                                        @else
                                            Agregar Noticia
                                        @endif
                                    </div>
                                </x-slot>

                            <x-slot name="content">

                                <div class="grid grid-cols-6 gap-3">
                                    <div class="col-span-6 mt-2 sm:col-span-3">
                                        <div class="flex">
                                            <x-jet-label for="titular_noticia" value="Titular Noticia" />
                                            <label for="title" class="px-2 text-red-700">*</label>
                                        </div>
                                        <x-jet-input id="titular_noticia" class="block w-full mt-1" type="text"
                                            wire:model.lazy="titular_noticia" />
                                        @error('titular_noticia') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-6 mt-2 sm:col-span-3">
                                        <div class="flex">
                                            <x-jet-label for="autor_noticia" value="Autor (Opcional)" />
                                            {{-- <label for="title" class="px-2 text-red-700">*</label> --}}
                                        </div>
                                        <x-jet-input id="autor_noticia" class="block w-full mt-1" type="text"
                                            wire:model.lazy="autor_noticia" />
                                        {{-- @error('autor_noticia') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror --}}
                                    </div>

                                {{-- Caption de la foto principal --}}

                                <div class="col-span-6 mt-2 sm:col-span-3">
                                    <div class="flex">
                                        <x-jet-label for="caption_foto_noticia" value="Descripción foto principal" />
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <x-jet-input id="caption_foto_noticia" class="block w-full mt-1" type="text"
                                        wire:model.lazy="caption_foto_noticia" />
                                    @error('caption_foto_noticia') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                </div>

                                    {{-- Estado noticia --}}

                                    <div class="col-span-6 mt-2 sm:col-span-3">
                                        <div class="flex">
                                            <x-jet-label for="estado_noticia" value="Estado Noticia" />
                                            <label for="title" class="px-2 text-red-700">*</label>
                                        </div>
                                        <select id="estado_noticia" type="text" wire:model.lazy="estado_noticia"
                                            class="block w-full px-3 py-2 text-gray-700 border rounded-md shadow-sm outline-none">
                                            {{-- <option class="font-black text-gray-700" value="">Elige una opción</option> --}}
                                            <option class="text-gray-700" value="Visible">Visible</option>
                                            <option class="text-gray-700" value="No visible">No Visible</option>
                                        </select>
                                        @error('estado_noticia') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span>@enderror
                                    </div>


                                 {{-- Foto principal --}}

                                 <div class="col-span-4 mt-2 sm:col-span-6">
                                     <div
                                     x-data="{ isUploading: false, progress: 0 }"
                                     x-on:livewire-upload-start="isUploading = true"
                                     x-on:livewire-upload-finish="isUploading = false"
                                     x-on:livewire-upload-error="isUploading = false"
                                     x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    {{-- <label class="block text-sm font-medium text-gray-700">
                                        Foto Portada
                                    </label> --}}
                                    <div class="flex">
                                        <x-jet-label for="noticia_photo_path" value="Foto Portada" />
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <div class="flex items-center mt-2">
                                        <span class="inline-block w-12 h-12 overflow-hidden bg-gray-100 squared-full">
                                            @if($fotos_noticia)
                                            <img class="w-full h-full" src="{{$fotos_noticia->temporaryUrl() }}">
                                                @else
                                                @if($noticia_photo_path)
                                                    <img class="w-full h-full" src="{{$noticia_photo_path }}">
                                                    @else
                                                    <svg class="w-full h-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                    </svg>
                                                @endif
                                            @endif
                                        </span>
                                        <input type="file" wire:model="fotos_noticia" class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{-- <div x-show="isUploading">
                                            <progress max="100" x-bind:value="progress" ></progress>
                                        </div>
                                        @error('noticia_photo_path') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror --}}
                                    </div>
                                    <div x-show="isUploading">
                                        <progress max="100" x-bind:value="progress" ></progress>
                                    </div>
                                    @error('noticia_photo_path') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                </div>

                                <div>

                                    <div class="mt-4">
                                        <div class="flex">
                                            <x-jet-label for="cuerpo_noticia" value="Cuerpo Noticia" />
                                            <label for="title" class="px-2 text-red-700">*</label>
                                        </div>
                                        <div class="mt-4">
                                            {{-- <textarea id="cuerpo_noticia" name="cuerpo_noticia" rows="3"
                                            class="block w-full px-3 py-2 mt-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model="cuerpo_noticia"
                                            placeholder="Cuerpo de la noticia."></textarea> --}}

                                            {{-- Lo de abajo es el código del trix. Por ahora está documentado pero supuestamente funciona --}}

                                            <!-- top-most div don't attach livewire-->
                                            {{-- <div class="">
                                                <div class="mb-4" wire:ignore wire:key="uniqueKey">
                                                    <input id="cuerpo_noticia" type="hidden" name="cuerpo_noticia">
                                                    <trix-editor wire:model.lazy="cuerpo_noticia" input="cuerpo_noticia" placeholder= "Escriba aquí su noticia" @trix-attachment-add="console.log($event.attachment)"></trix-editor> --}}
                                                    {{-- <trix-editor input="cuerpo_noticia" placeholder= "Escriba aquí su noticia"></trix-editor> --}}
                                                    {{-- @error('cuerpo_noticia') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror --}}

                                                    {{-- <script>
                                                        var cuerpo = document.getElementById("cuerpo_noticia")
                                                        addEventListener("trix-change", function(event) {
                                                            console.log(cuerpo.getAttribute('value'));
                                                            @this.set('cuerpo_noticia', cuerpo.getAttribute('value'))
                                                        })
                                                    </script> --}}
                                                {{-- </div>
                                            </div> --}}
                                        {{-- @error('cuerpo_noticia') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror --}}

                                        <div class="">

                                            <div class="mt-1 bg-white">

                                                <div class="body-content" wire:ignore wire:key="uniqueKey">
                                                    <input id="cuerpo_noticia" type="hidden" name="cuerpo_noticia">

                                                    <trix-editor class="trix-content" x-ref='trix'
                                                    {{-- x-on:trix-change="$dispatch('input', event.target.value)" --}}
                                                    input="cuerpo_noticia" wire:model.debounce.9999999999999ms='cuerpo_noticia' @trix-attachment-add></trix-editor>

                                                </div>
                                                <script>
                                                        var cuerpo = document.getElementById("cuerpo")
                                                        addEventListener("trix-change", function(event) {
                                                            console.log(cuerpo.getAttribute('value'));
                                                            @this.set('cuerpo_noticia', cuerpo.getAttribute('value'))
                                                        })
                                                </script>
                                            </div>
                                        </div>
                                        @error('cuerpo_noticia') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span>@enderror




                                    </div>
                                </div>
                                </div>

                            </x-slot>

                            <x-slot name="footer">
                                <x-jet-secondary-button wire:click="$toggle('modalFormVisible')"
                                    wire:loading.attr="disabled">
                                    {{ __('Cancelar') }}
                                </x-jet-secondary-button>

                                @if ($modelId)
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25'"
                                        wire:click="update" wire:loading.attr="disabled">
                                        {{ __('Actualizar') }}
                                    </button>
                                @else

                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25'"
                                        wire:click="create" wire:loading.attr="disabled">
                                        {{ __('Crear') }}
                                    </button>
                                @endif

                            </x-slot>
                        </x-jet-dialog-modal>

                        {{-- Actualizar Noticia --}}

                    <x-jet-dialog-modal wire:model="modalTrixEditorFormVisible">
                        <div class="grid grid-cols-6 gap-3">
                            <div class="col-span-6 mt-2 sm:col-span-3">
                                <x-slot name="title">
                                    <div class="mx-auto text-center rounded-md">
                                        Actualizar Cuerpo Noticia
                                    </div>
                                </x-slot>
                            <x-slot name="content">
                                <div class="grid grid-cols-1 gap-1">
                                    <div class="mt-4">
                                        <div class="flex">
                                            <x-jet-label for="cuerpo_noticia" value="Cuerpo Noticia" />
                                            <label for="title" class="px-2 text-red-700">*</label>
                                        </div>
                                        <div class="mt-4">
                                            {{-- Lo de abajo es el código del trix. Por ahora está documentado pero supuestamente funciona --}}
                                            {{-- <div class="mb-4"  wire:ignore wire:key="uniqueKey">
                                                <input wire:model.debounce.365ms="cuerpo_noticia" id="cuerpo_noticia" type="hidden" name="cuerpo_noticia"  >
                                                <trix-editor input="cuerpo_noticia" @trix-attachment-add="console.log($event.attachment)"> {!! $cuerpo_noticia!!}</trix-editor>
                                                @error('cuerpo_noticia') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror

                                                <script>
                                                    var cuerpo = document.getElementById("cuerpo_noticia")
                                                    addEventListener("trix-change", function(event) {
                                                        console.log(cuerpo.getAttribute('value'));
                                                        @this.set('cuerpo_noticia', cuerpo.getAttribute('value'))
                                                    })
                                                </script>
                                            </div> --}}
                                            {{-- <x-input.rich-text wire:model.lazy="cuerpo_noticia" id="cuerpo_noticia" :initial-value="$cuerpo_noticia"/> --}}

                                            {{-- <div class="">
                                                <input id="cuerpo_noticia" type="hidden" name="cuerpo_noticia" wire:model.defer="cuerpo_noticia">
                                                <div class="editor" wire:ignore>
                                                    <trix-editor
                                                        input="cuerpo_noticia"
                                                        class="w-full h-64 overflow-x-scroll formatted-content"
                                                        x-data
                                                        x-on:trix-change="$dispatch('input', event.target.value)"
                                                        wire:model.defer="cuerpo_noticia"
                                                        wire:key="cuerpo_noticia"
                                                    ></trix-editor>
                                                </div>
                                                <x-jet-input-error for="cuerpo_noticia" class="mt-2"/>
                                            </div> --}}
                                            {{-- <div class="">

                                                <div class="mt-1 bg-white">
                                                    <div class="body-content" wire:ignore>
                                                        <input id="cuerpo_noticia" type="hidden" name="cuerpo_noticia">
                                            <trix-editor
                                            class="trix-content"
                                            x-data
                                            x-on:trix-change="$dispatch('cuerpo_noticia', event.target.value)"
                                            wire:model.debounce.100000ms='cuerpo_noticia'
                                            wire:key="cuerpo_noticia"></trix-editor>

                                                    </div>
                                                </div>
                                            </div>
                                            @error('cuerpo_noticia') <span class="error">{{ $message }}</span>@enderror --}}



                                        </div>
                                    </div>
                                </div>
                            </x-slot>
                            </div>
                        </div>

                            <x-slot name="footer">
                                <x-jet-secondary-button wire:click="$toggle('modalTrixEditorFormVisible')"
                                    wire:loading.attr="disabled">
                                    {{ __('Cancelar') }}
                                </x-jet-secondary-button>
                                <button type="submit"
                                        class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25'"
                                        wire:click="updateTrixEditor" wire:loading.attr="disabled">
                                        {{ __('Actualizar') }}
                                </button>
                            </x-slot>
                        </x-jet-dialog-modal>
                        {{-- aquí termina --}}
                        <x-delete-noticia />
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



{{-- Scripts para utilizar archivos adjuntos en el editor Trix --}}
<script>
    function uploadTrixImage(attachment){
        @this.upload(
            'newFiles',
            attachment.file,

            function(uploadedUrl){
                const eventName = 'myapp:trix-upload-completed:${btoa(uploadedUrl)}';
                const listener = function (event){
                    attachment.setAttributes(event.detail);
                    window.removeEventListener(eventName, listener);
                };

                window.addEventListener(eventName, listener);

                @this.call('completeUpload',uploadedUrl, eventName);
            }
        );

        function (event) {
            attachment.setUploadProgress(event.detail.progress);
        }
    }
</script>
