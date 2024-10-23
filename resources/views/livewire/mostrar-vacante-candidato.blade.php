<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    
            @forelse ($vacantes as $vacante)
                <div class="p-6 text-gray-900 border-b dark:border-black  dark:text-gray-100 md:flex md:justify-between md:items-center">
                    <div class="space-y-5">
                        <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                            {{ $vacante->titulo}}
                        </a>
                        <p class="text-sm text-gray-600">{{ $vacante->empresa }}</p>
                        <p class="text-sm text-gray-500">Ultimo dia: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                    </div>
    
                    <div class="flex md:flex-row flex-col items-stretch gap-3 mt-5 md:mt-9">
                       
                            @foreach($vacante->candidatos as $candidato)
                            <p class="bg-slate-500 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Estado de la candidatura: 
                                @if($candidato->estado != '2' )
                                <p class="text-gray-800 dark:text-gray-200 font-bold pl-1 block">Enviada</p>
                            @else
                                <p class="text-gray-800 dark:text-gray-200 font-bold pl-1 block">Ya ha sido aceptado</p>
                            @endif
                            </p>
                            @endforeach
                    </div>
                </div>    
       
                {{-- si el forelse esta vacio muestra eso ($vacantes) --}}
            @empty
                <p class="p-3 text-center text-sm text-gray-600">No se ha postulado a vacantes aun</p>
    
            @endforelse
    </div>
    
   
    </div>
    