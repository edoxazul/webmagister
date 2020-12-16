        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
            <x-slot name="title">
                Eliminar Alumno
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 mt-2 sm:col-span-3">
                    <div class="flex">
                        <x-jet-label for="razon_eliminacion" value="¿Por qué se ha eliminado a este alumno?" />
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

                <button wire:click="eliminado" wire:loading.attr="disabled" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                    Eliminar
                </button>
            </x-slot>
        </x-jet-dialog-modal>

