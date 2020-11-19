<nav class="bg-gray-800">

    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <!-- Mobile menu button-->
            <button id="button" x-on:click="open=true" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
            <span  class="sr-only">Open main menu</span>
            <!-- Icon when menu is closed. -->
            <!--
                Heroicon name: menu

                Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path v-if="!isOpen"stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!-- Icon when menu is open. -->
            <!--
                Heroicon name: x

                Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path v-if="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            </button>
        </div>
        <div  class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex-shrink-0 flex items-center">
            <img class="block lg:hidden h-10 w-auto" src="https://www.ucn.cl/wp-content/uploads/2018/05/Escudo-UCN-Full-Color.png" alt="UCN">
            <img class="hidden lg:block h-10 w-auto" src="https://www.ucn.cl/wp-content/uploads/2018/05/Escudo-UCN-Full-Color.png" alt="UCN">
            </div>
            <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4">
                <a href="/" class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700">Inicio</a>
                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700">Cuerpo Academico</a>

            </div>
            </div>
        </div>
        <div class= "ml-3 relative">
            <div class="min-h-screen bg-gray-100 ">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a class="ml-4 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-700 hover:bg-gray-900" href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>

                    @if (Route::has('register'))
                        <a class="ml-4 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-700 hover:bg-gray-900" href="{{ route('register') }}" :active="request()->routeIs('register')">
                            Registrar Usuario
                        </a>
                    @endif


                    @else

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a class="ml-4 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-700 hover:bg-gray-900" href="{{ route('login') }}" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </a>

                    </div>

                @endif
                </div>
            @endif


            </div>


        </div>

        </div>






    </div>



    <div id="nav-content" class="hidden sm:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900">Inicio</a>
        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Cuerpo Academico</a>
        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Projects</a>
        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Calendar</a>
        </div>
    </div>

    <!--
        Mobile menu, toggle classes based on menu state.

        Menu open: "block", Menu closed: "hidden"
    -->

{{-- <!-- Responsive Navigation Menu -->
<div x-show="open" @click="open = ! open" :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
        <a href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </a>
    </div>


</div> --}}








</nav>

<script>
//Javascript to toggle the menu
document.getElementById('button').onclick = function(){
			document.getElementById("nav-content").classList.toggle("hidden");
		}
</script>
