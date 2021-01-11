<div>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Información General') }}
        </h2>
    </x-slot>
    <div class="mt-10 sm:mt-5">
        <div class="mt-5 md:mt-0 md:col-span-2">
            {{-- <form wire:submit.prevent="submitForm" class="w-full"> --}}
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                {{-- @foreach ($infomag as $infomag) --}}
                                <div class="col-span-6 sm:col-span-6">
                                    {{-- <div class="col-span-2 sm:col-span-6">
                                    <h2> Para cargar información guardada presionar el botón Cargar Información </h2>
                                        <button type="submit"
                                        class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25'"
                                        wire:click="visualizar({{$infomag->id}})" wire:loading.attr="disabled">
                                        {{ __('Visualizar') }}
                                        </button>
                                    </div> --}}
                                    <div class="flex">
                                    <label for="proposito_magister" class="block font-medium text-gray-700 text-m">Propósito</label>
                                    <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <div class="mt-2">
                                        <textarea id="proposito_magister" name="proposito_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            placeholder="Propósito del magíster."
                                            wire:model="proposito_magister"
                                            ></textarea>
                                                {{-- {{$infomag->proposito_magister}} --}}
                                            @error('proposito_magister') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="mt-2">
                                    </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <div class="flex">
                                        <label for="objetivo_magister"
                                        class="block font-medium text-gray-700 text-m">Objetivo</label>
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <div class="mt-2">
                                        <textarea id="objetivo" name="objetivo" rows="3"
                                            class="block w-full px-3 py-2 mt-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model="objetivo_magister"
                                            placeholder="Objetivo del magíster."></textarea>
                                            @error('objetivo_magister') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror

                                    </div>

                                    <div class="mt-2">
                                    </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <div class="flex">
                                        <label for="descripcion_magister"
                                            class="block font-medium text-gray-700 text-m">Descripción</label>
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <div class="mt-2">
                                        <textarea id="descripcion_magister" name="descripcion_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model="descripcion_magister"
                                            placeholder="Descripción del magíster"></textarea>
                                            @error('descripcion_magister') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror

                                    </div>

                                </div>

                                <div class="mt-2">
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <div class="flex">
                                        <label for="perfil_entrada_magister"
                                            class="block font-medium text-gray-700 text-m">Perfil de entrada</label>
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <div class="mt-2">
                                        <textarea id="perfil_entrada_magister" name="perfil_entrada_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model="perfil_entrada_magister"
                                            placeholder="Perfil de entrada del alumno para el magíster."></textarea>
                                            @error('perfil_entrada_magister') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror

                                    </div>

                                    <div class="mt-2">
                                    </div>

                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <div class="flex">
                                        <label for="regimen_magister"
                                        class="block font-medium text-gray-700 text-m">Regimen magíster</label>
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <div class="mt-2">
                                        <select id="regimen_magister" type="text" wire:model="regimen_magister"
                                        class="block w-full px-3 py-2 text-gray-700 border rounded-md shadow-sm outline-none">
                                        <option class="text-gray-700" value="Diurno">Diurno</option>
                                        <option class="text-gray-700" value="Vespertino">Vespertino</option>
                                    </select>
                                    @error('regimen_magister') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                        {{-- <input id="regimen_magister" name="regimen_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model="regimen_magister"
                                            placeholder="Régimen del magíster: Diurno o Vespertino."></textarea>
                                            @error('regimen_magister') <span class="error">{{ $message }}</span> @enderror --}}
                                    </div>
                                </div>

                                <div class="mt-2">
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <div class="flex">
                                        <label for="contacto_magister"
                                        class="block font-medium text-gray-700 text-m">Información de contacto</label>
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <div class="mt-2">
                                        <textarea id="contacto_magister" name="contacto_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model="contacto_magister"
                                            placeholder="Información de contacto del magíster"></textarea>
                                            @error('contacto_magister') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                    </div>

                                </div>

                                <div class="mt-2">
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                <div class="flex">
                                    <label for="costo_magister"
                                    class="block font-medium text-gray-700 text-m">Costo magíster</label>
                                    <label for="title" class="px-2 text-red-700">*</label>
                                </div>
                                    <div class="mt-2">
                                        <textarea id="costo_magister" name="costo_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model="costo_magister"
                                            placeholder="Información referente a los costos del magíster"></textarea>
                                            @error('costo_magister') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                    </div>

                               </div>

                               <div class="mt-2">
                                 </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <div class="flex">
                                        <label for="metodos_pagos_magister"
                                        class="block font-medium text-gray-700 text-m">Métodos de pago</label>
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <div class="mt-2">
                                        <textarea id="metodos_pagos_magister" name="metodos_pagos_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model="metodos_pagos_magister"
                                            placeholder="Información referente a los métodos de pagos"></textarea>
                                            @error('metodos_pagos_magister') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                    </div>

                                </div>

                                <div class="mt-2">
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <div class="flex">
                                        <label for="beneficios_magister"
                                        class="block font-medium text-gray-700 text-m">Beneficios y facilidades</label>
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <div class="mt-2">
                                        <textarea id="beneficios_magister" name="beneficios_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model="beneficios_magister"
                                            placeholder="Información referente a los beneficios y facilidades de pago"></textarea>
                                            @error('beneficios_magister') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                    </div>

                                </div>
                                <div class="mt-2">
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <div class="flex">
                                        <label for="arancel_magister"
                                        class="block font-medium text-gray-700 text-m">Arancel</label>
                                        <label for="title" class="px-2 text-red-700">*</label>
                                    </div>
                                    <div class="mt-2">
                                        <textarea id="arancel_magister" name="arancel_magister" rows="3"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            wire:model="arancel_magister"
                                            placeholder="Información referente a los aranceles"></textarea>
                                            @error('arancel_magister') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                    </div>

                                </div>

                                <div class="mt-2">
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <div class="flex">
                                        <label for="reglamento_magister"
                                        class="block font-medium text-gray-700 text-m">Reglamento del magíster</label>
                                        {{-- <label for="title" class="px-2 text-red-700">*</label> --}}
                                    </div>
                                    <div class="mt-2">
                                        <div
                                        x-data="{ isUploading: false, progress: 0 }"
                                        x-on:livewire-upload-start="isUploading = true"
                                        x-on:livewire-upload-finish="isUploading = false"
                                        x-on:livewire-upload-error="isUploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                                        <input type="file" wire:model="file" class="px-3 py-2 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <div x-show="isUploading">
                                                <progress max="100" x-bind:value="progress" ></progress>
                                            </div>
                                            @error('file') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                        </div>
                                        {{-- <input type="file" wire:model="file" class="px-3 py-2 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        @error('file') <span class="error">{{ $message }}</span> @enderror --}}
                                    </div>
                                </div>

                                <div class="mt-2">
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <div class="flex">
                                        <label for="programa_magister"
                                        class="block font-medium text-gray-700 text-m">Programa del magíster</label>
                                        {{-- <label for="title" class="px-2 text-red-700">*</label> --}}
                                    </div>
                                    <div class="mt-2">
                                        <div
                                        x-data="{ isUploading: false, progress: 0 }"
                                        x-on:livewire-upload-start="isUploading = true"
                                        x-on:livewire-upload-finish="isUploading = false"
                                        x-on:livewire-upload-error="isUploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                                        <input type="file" wire:model="file2" class="px-3 py-2 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <div x-show="isUploading">
                                                <progress max="100" x-bind:value="progress" ></progress>
                                            </div>
                                            @error('file2') <span class="px-2 text-red-700 bg-red-200 rounded-full error">{{ $message }}</span> @enderror
                                        </div>
                                        {{-- <input type="file" wire:model="file2" class="px-3 py-2 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            @error('file2') <span class="error">{{ $message }}</span> @enderror --}}
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <div class="px-4 py-3 text-right bg-white sm:px-6">
                                        {{-- <button wire:click="submitForm" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Guardar
                                        </button> --}}
                                        {{-- <button type="submit"
                                        class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25'"
                                        wire:click="submitForm" wire:loading.attr="disabled">
                                        {{ __('Crear') }}
                                    </button> --}}
                                {{-- botón de actualizar --}}
                                        <button type="submit"
                                        class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25'"
                                        onclick="confirm('¿Está seguro que desea realizar estos cambios?') || event.stopImmediatePropagation()" wire:click="update" wire:loading.attr="disabled">
                                        {{ __('Actualizar') }}
                                    </button>
                                    @if (session()->has('message'))
                                    <div class="inline-flex items-center px-4 py-2 pl-4 font-semibold text-blue-900 bg-blue-300 border border-blue-600 rounded">
                                        {{ session('message') }}
                                    </div>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- @endforeach --}}
                    </div>
                </div>
            {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
