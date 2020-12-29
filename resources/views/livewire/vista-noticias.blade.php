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

                </div>

            </div>
            </main>

            <div class="mt-2"> </div>

            <div class="w-full mx-auto md:w-2/3">
                {{-- <div class="mx-5 my-3 text-sm">
                <a href="" class="font-bold tracking-widest text-red-600 ">CORONAVIRUS</a>
                </div> --}}
                <div class="w-full px-5 text-4xl font-bold leading-none text-gray-800">
                    {{ $noticia->titulo_noticia }}
                </div>

                <div class="w-full px-5 pt-2 pb-5 text-gray-500">
                    {{ $noticia->autor_noticia }} |  {{date("d/m/Y", strtotime($noticia->created_at))}}
                </div>

                <div class="mx-20">
                <img src="https://static.politico.com/dims4/default/fcd6d6a/2147483647/resize/1920x/quality/90/?url=https%3A%2F%2Fstatic.politico.com%2F22%2F87%2F2259ffd444678054896b9fa32b4d%2Fgettyimages-1221513169.jpg">
                {{-- <img src="{{ $noticia->noticia_photo_path }}"> --}}
                </div>

                <div class="w-full mx-5 text-gray-600 text-normal">
                    <p class="py-3 border-b"></p>
                </div>

                {{-- <div class="w-full px-5 pt-3 italic font-thin text-gray-600">
                    By <strong class="text-gray-700">Quint Forgey</strong><br>
                    07/17/2020 09:57 AM EDT<br>
                    Updated: 07/17/2020 10:33 AM EDT
                </div> --}}

                <div class="w-full px-5 mx-auto" style="text-align: justify;">
                    <p class="my-5"> {!!  nl2br(e($noticia->descripcion_noticia)) !!} </p>
                </div>
            </div>

        </div>

        @stack('modals')

        @livewireScripts


    <x-footer/>

    </body>

    </html>
