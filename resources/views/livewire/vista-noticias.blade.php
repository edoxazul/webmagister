{{-- @livewire('vista-noticias', ['id' => $id]) --}}
{{-- <livewire:vista-noticias id="$noticia"> --}}

    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles


        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    </head>

    <body class="font-sans antialiased">
        <x-header />

        <x-navbar />

        <div class="min-h-screen bg-gray-100">

            <main>
            <div class="flex w-full px-2 mx-auto bg-gray-300 rounded-md max-w-7xl sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-center w-full h-16">
                    <h2
                        class="justify-center w-full text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                        Noticias Magíster
                    </h2>
                    {{-- {{ dd($this->modelId) }} --}}




                </div>


            </div>

            <div class="flex w-full px-2 py-2 mx-auto bg-gray-300 rounded-md max-w-7xl sm:px-6 lg:px-8">
            Título: {{ $noticia->titulo_noticia }}

            </div>
            <div class="flex w-full px-2 py-5 mx-auto bg-gray-300 rounded-md max-w-7xl sm:px-6 lg:px-8">
                Cuerpo: {{ $noticia->descripcion_noticia }}

            </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    <x-footer/>

    </body>

    </html>
