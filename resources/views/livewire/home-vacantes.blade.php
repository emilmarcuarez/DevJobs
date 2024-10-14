<div>
   <div class="py-12 px-7">
    <div class="max-w-7xl mx-auto">
        <h3 class="font-extrabold lg:text-3xl text-xl text-gray-700 dark:text-gray-200 mb-12">Nuestras vacantes disponibles</h3>
        <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
            @forelse ($vacantes as $vacante)
                <div class="md:flex md:justify-between md:items-center md:gap-3 py-5">
                    <div class="md:flex-1 pb-3 md:pb-0">
                        <a href="{{ route('vacantes.show', $vacante->id) }}" class="lg:text-2xl text-sm font-extrabold text-gray-600 ">
                            {{ $vacante->titulo }}
                        </a>
                        <p class="text-base text-gray-600">
                            {{ $vacante->empresa }}
                        </p>
                        <p class="font-bold text-xs text-gray-600 mb-1">
                          Ultimo dia para postularse:
                          <span class="font-normal">
                            {{ $vacante->ultimo_dia->format('d/m/Y') }}
                          </span>  
                        </p>
                    </div>

                    <div>
                        <a href="{{ route('vacantes.show', $vacante->id) }}" class="bg-indigo-500 p-3 text-sm uppercase font-bold text-white rounded-lg block text-center"
                        >
                            Ver Vacante
                        </a>
                    </div>
                </div>

            @empty
                <p class="p-3 text-center text-sm text-gray-600">No hay vacantes aun</p>
            @endforelse
        </div>
    </div>
   </div>
</div>
