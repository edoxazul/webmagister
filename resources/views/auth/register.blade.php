<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" placeholder="Ingrese el nombre" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="rut" value="{{ __('Rut') }}" />
                <x-jet-input id="rut" class="block w-full mt-1" type="rut" name="rut" :value="old('rut')" placeholder="Ej: 12345678-9" required autofocus autocomplete="rut" oninput="checkRut(this)"/>
            </div>


            {{-- <div class="mt-4">
                <x-jet-label for="rol" value="{{ __('Rol de Usuario') }}" />
                <x-jet-input id="rol" class="block w-full mt-1" type="rol" name="rol" :value="old('rol')" required />
            </div> --}}

            <div class="mt-4">
                <x-jet-label for="rol" value="{{ __('Rol de Usuario') }}" />

                {{-- <div class="col-md-4 col-form-label text-md-right">{{ Form::label('rol', 'Rol del usuario') }}</div> --}}
                    <div class="col-md-6">
                        <label class="block text-sm font-medium text-gray-700 col-md-6">
                            {{ Form::radio('rol', 'Administrador') }} Administrador
                        </label>
                        {{-- <label class="col-md-6">
                            {{ Form::radio('rol', 'Profesor') }} Profesor
                        </label>
                        <label class="col-md-6">
                            {{ Form::radio('rol', 'Secretaria') }} Secretaría
                        </label> --}}
                    </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="email" placeholder="Ej: correo@email.com" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    <script>
        function checkRut(rut) {
            // Despejar Puntos
            var valor = rut.value.replace('.', '');
            // Despejar Guión
            valor = valor.replace('-', '');
            // Aislar Cuerpo y Dígito Verificador
            cuerpo = valor.slice(0, -1);
            dv = valor.slice(-1).toUpperCase();
            // Formatear RUN
            rut.value = cuerpo + '-' + dv
            // Si no cumple con el mínimo ej. (n.nnn.nnn)
            if (cuerpo.length < 7) {
                rut.setCustomValidity("RUT Incompleto");
                return false;
            }
            // Calcular Dígito Verificador
            suma = 0;
            multiplo = 2;
            // Para cada dígito del Cuerpo
            for (i = 1; i <= cuerpo.length; i++) {
                // Obtener su Producto con el Múltiplo Correspondiente
                index = multiplo * valor.charAt(cuerpo.length - i);
                // Sumar al Contador General
                suma = suma + index;
                // Consolidar Múltiplo dentro del rango [2,7]
                if (multiplo < 7) {
                    multiplo = multiplo + 1;
                } else {
                    multiplo = 2;
                }
            }
            // Calcular Dígito Verificador en base al Módulo 11
            dvEsperado = 11 - (suma % 11);
            // Casos Especiales (0 y K)
            dv = (dv == 'K') ? 10 : dv;
            dv = (dv == 0) ? 11 : dv;
            // Validar que el Cuerpo coincide con su Dígito Verificador
            if (dvEsperado != dv) {
                rut.setCustomValidity("RUT Inválido");
                return false;
            }
            // Si todo sale bien, eliminar errores (decretar que es válido)
            rut.setCustomValidity('');
        }

    </script>
</x-guest-layout>
