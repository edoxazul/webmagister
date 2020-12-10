
        <x-jet-dialog-modal wire:model="modalConfirmGraduadoVisible">
            <x-slot name="title">
                Alumno Graduado
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 mt-2 sm:col-span-3">
                    <div class="flex">
                        <x-jet-label for="anio_graduacion" value="Indique la Fecha de Graduacion" />
                        <label for="title" class="block px-2 text-sm font-medium text-gray-400"></label>
                    </div>
                    <x-jet-input id="anio_graduacion" class="block w-full mt-1 text-black"
                        type="date" value="\Carbon\Carbon::now()" placeholder="2000/12/31"
                        wire:model.lazy="anio_graduacion" />
                </div>
            </x-slot>


            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalConfirmGraduadoVisible')" wire:loading.attr="disabled">
                    Cancelar
                </x-jet-secondary-button>

                <button wire:click="graduado" wire:loading.attr="disabled" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                    Confirmar
                </button>
            </x-slot>
        </x-jet-dialog-modal>
