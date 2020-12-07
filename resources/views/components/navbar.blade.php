<nav class="bg-gray-900">

    <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button id="button" x-on:click="open=true"
                    class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed. -->
                    <!--
                        Heroicon name: menu

                        Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path v-if="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open. -->
                    <!--
                        Heroicon name: x

                        Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path v-if="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
                <div class="flex items-center flex-shrink-0">
                    {{-- <img class="block w-auto h-10 lg:hidden"
                        src="https://www.ucn.cl/wp-content/uploads/2018/05/Escudo-UCN-Full-Color.png" alt="UCN">
                    --}}
                    {{-- <img class="hidden w-auto h-10 lg:block"
                        src="https://www.ucn.cl/wp-content/uploads/2018/05/Escudo-UCN-Full-Color.png" alt="UCN">
                    --}}
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="/"
                            class="px-3 py-2 text-sm font-medium text-white rounded-md hover:text-white hover:bg-gray-700">Inicio</a>
                        <a href="{{ route('infomagisterpublico') }}"
                            class="px-3 py-2 text-sm font-medium text-white rounded-md hover:text-white hover:bg-gray-700">Información
                            General</a>
                        <a href="{{ route('listaacademicospublico') }}"
                            class="px-3 py-2 text-sm font-medium text-white rounded-md hover:text-white hover:bg-gray-700">Cuerpo
                            Academico</a>
                        <a href="{{ route('listaalumnospublico') }}"
                            class="px-3 py-2 text-sm font-medium text-white rounded-md hover:text-white hover:bg-gray-700">Alumnos</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                <div class="absolute flex sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                @if (Route::has('login'))
                    @auth
                    {{-- <div class="hidden px-1 bg-gray-900 sm:flex sm:-my-px sm:ml-10 "> --}}
                        <a class="items-center justify-center px-4 py-2 ml-4 text-base font-medium text-white bg-gray-700 border border-transparent rounded-md shadow-sm whitespace-nowrap hover:bg-gray-900"
                            href="{{ url('/dashboard') }}">Dashboard</a>

                            @if (Route::has('register'))
                        <a class="inline-flex items-center justify-center px-4 py-2 ml-4 text-base font-medium text-white bg-gray-700 border border-transparent rounded-md shadow-sm whitespace-nowrap hover:bg-gray-900"
                            href="{{ route('register') }}" :active="request()->routeIs('register')">
                            Registrar Usuario
                        </a>
                        @endif
                    @else
                    <div class="hidden space-x-4 bg-gray-900 sm:flex sm:-my-px sm:ml-10 ">
                        <a class="inline-flex items-center justify-center px-4 py-2 ml-4 text-base font-medium text-white bg-gray-700 border border-transparent rounded-md shadow-sm whitespace-nowrap hover:bg-gray-900"
                            href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </a>
                    </div>

                    @endif
                    {{-- </div> --}}

                </div>
                @endif
            </div>
        </div>
    </div>

    <!--
        Mobile menu, toggle classes based on menu state.

        Menu open: "block", Menu closed: "hidden"
    -->
    <!-- Responsive Navigation Menu -->

    <div id="nav-content" class="hidden sm:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="#"
                class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:text-white hover:bg-gray-700">Inicio</a>
            <a href="{{ route('infomagisterpublico') }}"
                class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:text-white hover:bg-gray-700">Información
                General</a>
            <a href="{{ route('listaacademicospublico') }}"
                class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:text-white hover:bg-gray-700">Cuerpo Academico</a>
            <a href="{{ route('listaalumnospublico') }}"
                class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:text-white hover:bg-gray-700">Alumnos</a>
            @auth
                <a class="block px-3 py-2 text-base font-medium text-white bg-gray-900 rounded-md"
                    href="{{ url('/dashboard') }}">
                    Dashboard
                </a>
            @endauth
            @auth
                <a class="block px-3 py-2 text-base font-medium text-white bg-gray-900 rounded-md"
                    href="{{ route('register') }}">
                    Registrar Usuario
                </a>
            @endauth
            @guest
                <a class="block px-3 py-2 text-base font-medium text-white bg-gray-900 rounded-md"
                    href="{{ route('login') }}" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </a>
            @endguest
        </div>
    </div>
</nav>

<script>
    //Javascript to toggle the menu
    document.getElementById('button').onclick = function() {
        document.getElementById("nav-content").classList.toggle("hidden");
    }

</script>
