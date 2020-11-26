{{-- Modal Form --}}
<x-jet-dialog-modal wire:model="modalFormVisible">
    <x-slot name="title">
        <div class="mx-auto text-center rounded-md">
            Agregar Noticia
        </div>
    </x-slot>

    <x-slot name="content">
        {{-- <div>
            <label class="block text-sm font-medium text-gray-700">
                Foto
            </label>
            <div class="flex items-center mt-2">
                <span class="inline-block w-12 h-12 overflow-hidden bg-gray-100 rounded-full">
                    <svg class="w-full h-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
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
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 mt-4 sm:col-span-3">
                <x-jet-label for="titulo_noticia" value="Título" />
                <x-jet-input id="titulo_noticia" class="block w-full mt-1" type="text"
                    wire:model.debounce.800ms="titulo_noticia" />
                @error('titulo_noticia') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-span-6 mt-4 sm:col-span-3">
                <x-jet-label for="autor_noticia" value="Autor (Opcional)" />
                <x-jet-input id="autor_noticia" class="block w-full mt-1" type="text"
                    wire:model.debounce.800ms="rut_academico" />
                @error('autor_noticia') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6 mt-4 sm:col-span-3">
                <x-jet-label for="enlace_noticia" value="Enlace Noticia (Opcional)" />
                <x-jet-input id="enlace_noticia" class="block w-full mt-1" type="text" wire:model.debounce.800ms="enlace_noticia" />
            </div>

            <div class="col-span-6 mt-4 sm:col-span-3">
                <label for="country" class="block text-sm font-medium text-gray-700">Estatus</label>
                <select id="country"
                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option>Visible</option>
                    <option>No visible</option>
                </select>
            </div>

        </div>

        <div>
            <div class="mt-4">
            <label for="about" class="block text-sm font-medium text-gray-700">
              Descripción Noticia
            </label>
            <div class="mt-4">
              <textarea id="about" rows="3" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Cuerpo de la noticia"></textarea>
            </div>
          </div>
        </div>

          <div>
            <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700">
              Cover photo
            </label>
            <div class="flex justify-center px-6 pt-5 pb-6 mt-2 border-2 border-gray-300 border-dashed rounded-md">
              <div class="space-y-1 text-center">
                <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                  <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p class="text-sm text-gray-600">
                  <button class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Upload a file
                  </button>
                  or drag and drop
                </p>
                <p class="text-xs text-gray-500">
                  PNG, JPG, GIF up to 10MB
                </p>
              </div>
            </div>
            </div>
          </div>

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
            {{ __('Cancelar') }}
        </x-jet-secondary-button>


        <button type="submit"
            class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25'"
            wire:click="create" wire:loading.attr="disabled">
            {{ __('Crear') }}
        </button>


    </x-slot>
</x-jet-dialog-modal>
