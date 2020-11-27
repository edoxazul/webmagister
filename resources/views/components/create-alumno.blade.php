<x-jet-dialog-modal wire:model="modalFormVisible">
    <x-slot name="title">
        <div class="rounded-md text-center mx-auto">
        Agregar Alumno
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="mt-4">
            <x-jet-label for="nombre_alumno" value="Nombre del Alumno" />
            <x-jet-input id="nombre_alumno" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="alumno_alumno" />
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <x-jet-label for="rut_alumno" value="Rut del Alumno" />
            <x-jet-input id="rut_alumno" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="rut_alumno" />
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <x-jet-label for="anio_ingreso" value="Fecha de Ingreso" />
            <x-jet-input id="anio_ingreso" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="anio_ingreso" />
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <x-jet-label for="contacto_alumno" value="Correo" />
            <x-jet-input id="contacto_alumno" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="contacto_alumno" />
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <x-jet-label for="proyecto" value="Proyecto" />
            <x-jet-input id="proyecto" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="proyecto" />
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
