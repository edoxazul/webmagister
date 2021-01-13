
        <x-jet-dialog-modal wire:model="modalConfirmAprobadoVisible">
            <x-slot name="title">
                Anteproyecto Aprobado
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 mt-2 sm:col-span-3">
                    <div class="flex">
                        <x-jet-label for="anio_aprobacion" value="Indique la Fecha de Aprobación" />
                        <label for="title" class="block px-2 text-sm font-medium text-gray-400"></label>
                    </div>
                    <x-jet-input id="anio_aprobacion" class="block w-full mt-1 text-black"
                        type="date" value="\Carbon\Carbon::now()" placeholder="2000/12/31"
                        wire:model.lazy="anio_aprobacion" />
                </div>
            </x-slot>


            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalConfirmAprobadoVisible')" wire:loading.attr="disabled">
                    Cancelar
                </x-jet-secondary-button>

                <button wire:click="aprobado" wire:loading.attr="disabled" class="inline-flex items-center justify-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600">
                    Confirmar
                </button>
            </x-slot>
        </x-jet-dialog-modal>
