<!-- Delete User Confirmation Modal -->
<x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
    <x-slot name="title">
        Eliminar Académico
    </x-slot>

    <x-slot name="content">
        ¿Esta seguro que quiere eliminar al Académico?

    </x-slot>

    <x-slot name="content">
        <div class="col-span-6 mt-2 sm:col-span-3">
            <div class="flex">
                <x-jet-label for="razon_eliminacion" value="¿Por qué se esta eliminando a este académico?" />
                <label for="title"
                    class="block px-2 text-sm font-medium text-gray-400"></label>
            </div>
            <x-jet-input id="razon_eliminacion" class="block w-full mt-1" type="text"
                placeholder="" wire:model.lazy="razon_eliminacion" />
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>

        <button wire:click="eliminado" wire:loading.attr="disabled"
            class="inline-flex items-center justify-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600">
            Eliminar
        </button>
    </x-slot>
</x-jet-dialog-modal>
