<x-jet-dialog-modal wire:model="modalCursoConfirmDeleteVisible">
    <x-slot name="title">
        Eliminar Curso
    </x-slot>

    <x-slot name="content">
        ¿Esta seguro que quiere eliminar el curso?

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalCursoConfirmDeleteVisible')" wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>

        <button wire:click="deleteCurso" wire:loading.attr="disabled"
            class="inline-flex items-center justify-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600">
            Eliminar
        </button>
    </x-slot>
</x-jet-dialog-modal>
