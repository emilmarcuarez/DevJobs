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
                    <a 
                    href="{{ route('candidatos.index', $vacante) }}"
                    class="bg-slate-500 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                 
                    {{ $vacante->candidatos->count() }}
                    Candidatos
                    </a>

                    <a 
                    href="{{ route('vacantes.edit', $vacante->id) }}"
                    class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Editar
                    </a>

                    <button 
                    type="button"
                    wire:click="$dispatch('mostrarAlerta',{vacante2:{{ $vacante->id }}})"
                    class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Eliminar 
                    </button>
                </div>
            </div>    
   
            {{-- si el forelse esta vacio muestra eso ($vacantes) --}}
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>

        @endforelse
</div>

<div class="flex mt-10">
    {{ $vacantes->links() }}
</div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('mostrarAlerta', vacanteId=> {
        Swal.fire({
             title: "¿Eliminar vacante?",
             text: "Una vacante eliminada no se puede recuperar",
             icon: "warning",
             showCancelButton: true,
             confirmButtonColor: "#3085d6",
             cancelButtonColor: "#d33",
             confirmButtonText: "Si, eliminar",
             cancelButtonText: "Cancelar"  // Corregido: `CancelButtonText` a `cancelButtonText`
         }).then((result) => {
             if (result.isConfirmed) {

                // eliminar la vacante desde el servidor
                Livewire.dispatch('eliminarVacante',  {vacante2: vacanteId })


                 Swal.fire({
                     title: "Eliminado!",
                     text: "La vacante ha sido eliminada.",
                     icon: "success"
               });
         }
         })
    })
    </script>
@endpush

