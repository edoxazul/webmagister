<div>
@foreach ($infomag as $infomag)
    <div class="flex w-full px-2 mx-auto bg-gray-300 rounded-md max-w-7xl sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-center w-full h-16">
            <h2 class="justify-center w-full text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Información General
            </h2>

        </div>
    </div>

    <div class="container px-4 mx-auto my-12 md:px-12">

            <p>
            </p>
            <p>
            </p>
            <h1 class="w-full">Propósito</h1>
                <p>
                <h3 style="text-align: justify;">
                    {{$infomag->proposito_magister}}
                </h3>

    </div>

    <div class="container px-4 mx-auto my-12 md:px-12">
            <h1 class="w-full">Objetivo</h1>
                <p>
                <h3 style="text-align: justify;">
                    {{$infomag->objetivo_magister}}</h3>
    </div>

    <div class="container px-4 mx-auto my-12 md:px-12">
                <h1 class="w-full">Descripción</h1>
                <p>
                <h3 style="text-align: justify;">
                    {{$infomag->descripcion_magister}}
                </h3>
    </div>

    <div class="container px-4 mx-auto my-12 md:px-12">
        <h1 class="w-full">Perfil de entrada del alumnno</h1>
        <p>
        <h3 style="text-align: justify;">
            {{$infomag->perfil_entrada_magister}}
        </h3>
</div>

<div class="container px-4 mx-auto my-12 md:px-12">
    <h1 class="w-full">Régimen</h1>
    <p>
    <h3 style="text-align: justify;">
        {{$infomag->regimen_magister}}
    </h3>
</div>

<div class="container px-4 mx-auto my-12 md:px-12">
    <h1 class="w-full">Contacto</h1>
    <p>
    <h3 style="text-align: justify;">
        {{$infomag->contacto_magister}}
    </h3>
</div>

    <div class="container px-4 mx-auto my-12 md:px-12">
        <h1 class="w-full">Costo magíster</h1>
        <p>
        <h3 style="text-align: justify;">
            {{$infomag->costo_magister}}
        </h3>
    </div>

    <div class="container px-4 mx-auto my-12 md:px-12">
        <h1 class="w-full">Métodos de pago</h1>
        <p>
        <h3 style="text-align: justify;">
            {{$infomag->metodos_pagos_magister}}
        </h3>
    </div>


    <div class="container px-4 mx-auto my-12 md:px-12">
        <h1 class="w-full">Beneficios y facilidades</h1>
        <p>
        <h3 style="text-align: justify;">
            {{$infomag->beneficios_magister}}
        </h3>
    </div>

    <div class="container px-4 mx-auto my-12 md:px-12">
        <h1 class="w-full">Aranceles</h1>
        <p>
        <h3 style="text-align: justify;">
            {{$infomag->arancel_magister}}
        </h3>
    </div>
@endforeach

</div>

