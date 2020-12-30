{{-- <head>
    <link rel="stylesheet" type="text/css" href="trix.css">
    <script type="text/javascript" src="trix.js"></script>
  </head> --}}
<div>

    <x-slot name="header">
        <link rel="stylesheet" type="text/css" href="trix.css">
        <script type="text/javascript" src="trix.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Noticias') }}
        </h2>
        @trixassets
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
                                                Descripción Noticia
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
                                                            {{-- <img
                                                                class="w-10 h-10 rounded-full"
                                                                src="{{ $academico->profile_photo_path }}" alt="">
                                                            --}}


                                                            {{-- <img
                                                                class="w-10 h-10 rounded-full"
                                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60"
                                                                alt=""> --}}
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
                            <div class="text-sm text-gray-900">
                                {{ Str::limit($noticia->cuerpo_noticia,200)}}
                            </div>
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

                        {{-- <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ $noticia->estado_noticia }}
                            </div>
                        </td> --}}

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
                    {{-- class="px-2 py-4 text-sm font-medium text-right whitespace-nowrap"> --}}
                            {{-- <span class="hidden sm:block">
                                <button wire:click="viewShowModal({{ $noticia->id }})" type="button"
                                    class="inline-flex items-center px-1 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <!-- Heroicon name: pencil -->
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </button>
                            </span> --}}

                        {{-- <td class="px-2 py-4 text-sm font-medium text-right whitespace-nowrap"> --}}
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
                            {{-- <a href="#"
                                class="text-indigo-600 hover:text-indigo-900">Editar</a>
                            --}}
                        {{-- </td> --}}

                        {{-- <td class="px-2 py-4 text-sm font-medium text-right whitespace-nowrap"> --}}
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
                        {{-- </td> --}}
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
                                {{-- <div>
                                    <label class="block text-sm font-medium text-gray-700">
                                        Foto
                                    </label>
                                    <div class="flex items-center mt-2">
                                        <span class="inline-block w-12 h-12 overflow-hidden bg-gray-100 rounded-full">
                                            <svg class="w-full h-full text-gray-300" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                        </span>
                                        <button type="button"
                                            class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Cambiar
                                        </button>
                                    </div>
                                </div> --}}
                                <div class="grid grid-cols-6 gap-3">
                                    <div class="col-span-6 mt-2 sm:col-span-3">
                                        <div class="flex">
                                            <x-jet-label for="titular_noticia" value="Titular Noticia" />
                                            <label for="title" class="px-2 text-red-700">*</label>
                                        </div>
                                        <x-jet-input id="titular_noticia" class="block w-full mt-1" type="text"
                                            wire:model.debounce.800ms="titular_noticia" />
                                        @error('titular_noticia') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-6 mt-2 sm:col-span-3">
                                        <div class="flex">
                                            <x-jet-label for="autor_noticia" value="Autor (Opcional)" />
                                            {{-- <label for="title" class="px-2 text-red-700">*</label> --}}
                                        </div>
                                        <x-jet-input id="autor_noticia" class="block w-full mt-1" type="text"
                                            wire:model.debounce.800ms="autor_noticia" />
                                        {{-- @error('autor_noticia') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror --}}
                                    </div>

                                    {{-- <div class="col-span-6 mt-2 sm:col-span-3">
                                        <x-jet-label for="enlace_noticia" value="Enlace Noticia (Opcional)" />
                                        <x-jet-input id="enlace_noticia" class="block w-full mt-1" type="text"
                                            wire:model.debounce.800ms="enlace_noticia" />
                                    </div> --}}

                                {{-- Caption de la foto principal --}}

                                <div class="col-span-6 mt-2 sm:col-span-3">
                                    <div class="flex">
                                        <x-jet-label for="caption_foto_noticia" value="Descripción foto principal" />
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <x-jet-input id="caption_foto_noticia" class="block w-full mt-1" type="text"
                                        wire:model.debounce.800ms="caption_foto_noticia" />
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
                                            <option class="text-gray-700" value="Seleccionar Opción">Seleccionar opción</option>
                                            <option class="text-gray-700" value="Visible">Visible</option>
                                            <option class="text-gray-700" value="No Visible">No Visible</option>
                                        </select>
                                        @error('estado_noticia') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span>@enderror
                                    </div>

                                    {{-- <div class="col-span-6 mt-2 sm:col-span-3">
                                        <label for="country"
                                            class="block text-sm font-medium text-gray-700">Estado Noticia</label>
                                        <select id="country"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option>Seleccionar opción</option>
                                            <option>Visible</option>
                                            <option>No visible</option>
                                        </select>
                                        @error('estatus') <span class="error">{{ $message }}</span> @enderror
                                    </div> --}}

                                 {{-- Foto principal --}}

                                <div class="col-span-4 mt-2 sm:col-span-3">
                                    <div
                                        x-data="{ isUploading: false, progress: 0 }"
                                        x-on:livewire-upload-start="isUploading = true"
                                        x-on:livewire-upload-finish="isUploading = false"
                                        x-on:livewire-upload-error="isUploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                                        <div class="flex">
                                            <x-jet-label for="noticia_photo_path" value="Subir foto de portada"  />
                                            <label for="title" class="px-2 text-red-700">*</label>
                                        </div>
                                    <x-jet-input id="noticia_photo_path" class="block w-full mt-1" type="file"
                                        wire:model="fotos_noticia" />
                                        <div x-show="isUploading">
                                            <progress max="100" x-bind:value="progress" ></progress>
                                        </div>
                                        @error('noticia_photo_path') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                </div>

                                <div>

                                    <div class="mt-4">
                                        <label for="about" class="block text-sm font-medium text-gray-700">
                                            Cuerpo Noticia
                                        </label>
                                        <div class="mt-4">
                                            <textarea id="cuerpo_noticia" name="cuerpo_noticia" rows="3"
                                            class="block w-full px-3 py-2 mt-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model="cuerpo_noticia"
                                            placeholder="Cuerpo de la noticia."></textarea>
                                            @error('cuerpo_noticia') <span class="error">{{ $message }}</span> @enderror

                                            {{-- @trix(\App\Models\Noticias::class,'descripcion_noticia') --}}

                                            {{-- <textarea class="form-control" id="cuerpo_noticia" name="cuerpo_noticia"></textarea> --}}
{{--
                                            <x-jet-label for= "ckcontent" value = "" />
                                                <div wire:ignore wire:key="Myid">
                                                    <div  id ="ckcontent" class="block w-full mt-1">

                                                    </div>
                                                </div>

                                                <textarea id= "descripcion_notcia" class="hidden">

                                                </textarea> --}}

                                        {{-- <div wire:ignore>
                                            <input id="descripcion_noticia" name="descripcion_noticia" type="hidden" value="">
                                            <trix-editor input="descripcion_noticia" class="wysiwyg-content" wire:key="uniqueKey"></trix-editor>
                                        </div> --}}


                                            {{-- <div wire:ignore>
                                                <trix-editor
                                                    class="formatted-content"
                                                    x-data
                                                    x-on:trix-change="$dispatch('input', event.target.value)"
                                                    wire:model.debounce.1000ms="descripcion_noticia"
                                                    wire:key="uniqueKey"
                                                ></trix-editor>
                                            </div> --}}

                                            {{-- <textarea id="about" rows="3"
                                                class="block w-full mt-1 border-blue-900 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                placeholder="Cuerpo de la noticia"></textarea> --}}

                                                {{-- Esto estaba sin comentarios antes  --}}
{{--
                                                <div x-data="{ trix: @entangle('descripcion_noticia').defer }">
                                                    <input id="descripcion_noticia" name="descripcion_noticia" type="hidden" />
                                                     <div wire:ignore>
                                                         <trix-editor x-model="trix" input="descripcion_noticia" wire:key="uniqueKey">
                                                         </trix-editor>
                                                     </div>
                                                    @error('descripcion_noticia') <span class="error">{{ $message }}</span> @enderror
                                                </div> --}}

                                              {{-- Esto estaba sin comentarios antes. Aquí termina  --}}

                                                {{-- @push('scripts')
                                                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
                                                @endpush --}}
                                        </div>
                                        @error('cuerpo_noticia') <span class="error">{{ $message }}</span> @enderror
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
                        <x-delete-noticia />
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
{{-- <script>
    var descripcion_noticia = document.getElementById("descripcion_noticia")
    addEventListener("trix-change", function(event) {
        console.log(about.getAttribute('value'));
        @this.set('descripcion_noticia', about.getAttribute('value'))
    })
</script>

<script>
    ClassicEditor
        .create( document.querySelector( '#descripcion_noticia' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'descripcion_noticia' );
</script> --}}

</div>
