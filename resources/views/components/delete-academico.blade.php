        <!-- Delete User Confirmation Modal -->
<x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
    <x-slot name="title">
        Eliminar Academico
    </x-slot>

    <x-slot name="content">
        ¿Esta seguro que quiere eliminar al Academico?

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>

        <button wire:click="delete" wire:loading.attr="disabled" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
            Eliminar
        </button>
    </x-slot>
</x-jet-dialog-modal>

