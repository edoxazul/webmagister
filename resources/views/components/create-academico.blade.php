{{-- Modal Form --}}
<x-jet-dialog-modal wire:model="modalFormVisible">
    <x-slot name="title">
        <div class="mx-auto text-center rounded-md">
            Agregar Academico
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="mt-4">
            <x-jet-label for="nombre_academico" value="Nombre" />
            <x-jet-input id="nombre_academico" class="block w-full mt-1" type="text"
                wire:model.debounce.800ms="nombre_academico" />
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <x-jet-label for="rut_academico" value="Rut" />
            <x-jet-input id="rut_academico" class="block w-full mt-1" type="text"
                wire:model.debounce.800ms="rut_academico" />
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <x-jet-label for="fecha_nacimiento" value="Fecha de Nacimiento" />
            <x-jet-input id="fecha_nacimiento" class="block w-full mt-1" type="text"
                wire:model.debounce.800ms="fecha_nacimiento" />
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <x-jet-label for="correo" value="Correo" />
            <x-jet-input id="correo" class="block w-full mt-1" type="text" wire:model.debounce.800ms="correo" />
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <x-jet-label for="proyecto" value="Proyecto" />
            <x-jet-input id="proyecto" class="block w-full mt-1" type="text" wire:model.debounce.800ms="proyecto" />
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <x-jet-label for="title" value="{{ __('Content') }}" />
            <div class="rounded-md shadow-sm">
                <div class="mt-1 bg-white">
                    Hola
                </div>
            </div>
            @error('content') <span class="error">{{ $message }}</span> @enderror
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
            {{ __('Nevermind') }}
        </x-jet-secondary-button>


        <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
            {{ __('Create') }}
            </x-jet-danger-button>


    </x-slot>
</x-jet-dialog-modal>
