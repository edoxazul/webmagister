{{-- Modal Form --}}
<x-jet-dialog-modal wire:model="modalFormVisible">
    <x-slot name="title">
        <div class="mx-auto text-center rounded-md">
            Agregar Academico
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
                <x-jet-label for="nombre_academico" value="Nombre" />
                <x-jet-input id="nombre_academico" class="block w-full mt-1" type="text"
                    wire:model.debounce.800ms="nombre_academico" />
                @error('nombre_academico') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-span-6 mt-4 sm:col-span-3">
                <x-jet-label for="rut_academico" value="Rut" />
                <x-jet-input id="rut_academico" class="block w-full mt-1" type="text"
                    wire:model.debounce.800ms="rut_academico" />
                @error('rut_academico') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6 mt-4 sm:col-span-3">
                <x-jet-label for="fecha_nacimiento" value="Fecha de Nacimiento" />
                <x-jet-input id="fecha_nacimiento" class="block w-full mt-1" type="text"
                    wire:model.debounce.800ms="fecha_nacimiento" />
                @error('fecha_nacimiento') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-span-6 mt-4 sm:col-span-3">
                <x-jet-label for="correo" value="Correo" />
                <x-jet-input id="correo" class="block w-full mt-1" type="text" wire:model.debounce.800ms="correo" />
                @error('correo') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6 mt-4 sm:col-span-3">
                <x-jet-label for="proyecto" value="Proyecto" />
                <x-jet-input id="proyecto" class="block w-full mt-1" type="text" wire:model.debounce.800ms="proyecto" />
                @error('proyecto') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-span-6 mt-4 sm:col-span-3">
                <x-jet-label for="publicaciones" value="Publicaciones" />
                <x-jet-input id="publicaciones" class="block w-full mt-1" type="text"
                    wire:model.debounce.800ms="publicaciones" />

            </div>
            <div class="col-span-6 mt-4 sm:col-span-3">
                <x-jet-label for="linkedin" value="LinkedIn" />
                <x-jet-input id="linkedin" class="block w-full mt-1" type="text" wire:model.debounce.800ms="linkedin" />

            </div>
            <div class="col-span-6 mt-4 sm:col-span-3">
                <label for="country" class="block text-sm font-medium text-gray-700">Estatus</label>
                <select id="country"
                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option>Claustro</option>
                    <option>Visitante</option>
                    <option>Colaborador</option>
                </select>
            </div>

        </div>

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
            {{ __('Cancelar') }}
        </x-jet-secondary-button>

        @if($modelId)
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
