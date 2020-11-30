<div>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Información General') }}
        </h2>
    </x-slot>

    <div class="mt-10 sm:mt-5">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="create" action="/create" method="POST" class="w-full">
                @csrf
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-6">
                                    <label for="proposito_magister"
                                        class="block font-medium text-gray-700 text-m">Propósito</label>
                                    <div class="mt-2">
                                        <textarea id="proposito_magister" name="proposito_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model.debounce.800ms="proposito_magister"
                                            placeholder="you@example.com"></textarea>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="objetivo_magister"
                                        class="block font-medium text-gray-700 text-m">Objetivo</label>
                                    <div class="mt-2">
                                        <textarea id="objetivo" name="objetivo" rows="3"
                                            class="block w-full px-3 py-2 mt-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model.debounce.800ms="objetivo_magister"
                                            placeholder="you@example.com"></textarea>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="descripcion_magister"
                                        class="block text-sm font-medium text-gray-700">Descripción</label>
                                    <div class="mt-2">
                                        <textarea id="descripcion_magister" name="descripcion_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model.debounce.800ms="descripcion_magister"
                                            placeholder="you@example.com"></textarea>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="perfil_entrada_magister"
                                        class="block text-sm font-medium text-gray-700">Perfil de entrada</label>
                                    <div class="mt-2">
                                        <textarea id="perfil_entrada_magister" name="perfil_entrada_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model.debounce.800ms="perfil_entrada_magister"
                                            placeholder="you@example.com"></textarea>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="regimen_magister" class="block text-sm font-medium text-gray-700">Régimen magíster</label>
                                    <select id="regimen_magister" name="regimen_magister" autocomplete="regimen_magister"
                                        class="block px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        wire:model.debounce.800ms="regimen_magister">
                                        <option>Diurno</option>
                                        <option>Vespertino</option>
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="contacto_magister"
                                        class="block text-sm font-medium text-gray-700">Contacto magíster</label>
                                    <div class="mt-2">
                                        <textarea id="contacto_magister" name="contacto_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model.debounce.800ms="contacto_magister"
                                            placeholder="you@example.com"></textarea>
                                    </div>
                                </div>

                               <div class="col-span-6 sm:col-span-6">
                                    <label for="costo_magister"
                                        class="block text-sm font-medium text-gray-700">Costo magíster</label>
                                    <div class="mt-2">
                                        <input id="costo_magister" name="costo_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model.debounce.800ms="costo_magister">
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="metodos_pagos_magister"
                                        class="block text-sm font-medium text-gray-700">Métodos de pago</label>
                                    <div class="mt-2">
                                        <textarea id="metodos_pagos_magister" name="metodos_pagos_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model.debounce.800ms="metodos_pagos_magister"
                                            placeholder="you@example.com"></textarea>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="beneficios_magister"
                                        class="block text-sm font-medium text-gray-700">Beneficios y facilidades</label>
                                    <div class="mt-2">
                                        <textarea id="beneficios_magister" name="beneficios_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model.debounce.800ms="beneficios_magister"
                                            placeholder="you@example.com"></textarea>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="arancel_magister"
                                        class="block text-sm font-medium text-gray-700">Arancel</label>
                                    <div class="mt-2">
                                        <textarea id="arancel_magister" name="arancel_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model.debounce.800ms="arancel_magister"
                                            placeholder="you@example.com"></textarea>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                <div class="px-4 py-3 text-right bg-white sm:px-6">
                                    <button type="submit"
                                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Guardar
                                    </button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

</div>
