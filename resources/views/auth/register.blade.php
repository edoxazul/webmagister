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
                <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="rut" value="{{ __('Rut') }}" />
                <x-jet-input id="rut" class="block w-full mt-1" type="rut" name="rut" :value="old('rut')" required />
            </div>


            {{-- <div class="mt-4">
                <x-jet-label for="rol" value="{{ __('Rol de Usuario') }}" />
                <x-jet-input id="rol" class="block w-full mt-1" type="rol" name="rol" :value="old('rol')" required />
            </div> --}}

            <div class="mt-4">
                <x-jet-label for="rol" value="{{ __('Rol de Usuario') }}" />

                {{-- <div class="col-md-4 col-form-label text-md-right">{{ Form::label('rol', 'Rol del usuario') }}</div> --}}
                    <div class="col-md-6">
                        <label class="col-md-6">
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
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
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
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
