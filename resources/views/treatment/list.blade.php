@extends('layouts.panel')

@section('content')

@if (session('success'))
<div
    style="background-color: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 4px;">
    {{ session('success') }}
</div>
@endif

<!-- Cabecera del Panel con Botón de Creación -->
<div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-bold text-gray-800">Panel de Control / Citas Médicas</h1>
    
    <div class="flex items-center gap-4">
        
        <!-- Botón Crear Nuevo Paciente -->
        <a href="{{ route('tratamiento.create') }}" 
           class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2 rounded-full shadow-sm transition-all duration-200 ease-in-out transform hover:scale-[1.02]">
            <i data-lucide="user-plus" class="w-3.5 h-3.5"></i>
            <span>Nuevo Tratamiento</span>
        </a>
    </div>
</div>

    <div class="h-[calc(100vh-170px)] overflow-y-auto pr-2 custom-scrollbar">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($treatment as $treat)
                <div class="bg-[#e8f5e9] border border-[#c8e6c9] rounded-[24px] p-5 flex flex-col justify-between min-h-[190px] shadow-sm relative group">
                    
                    <div class="flex flex-col justify-between flex-grow">
                        <div>
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full border shadow-xs
                                    {{ $treat->estado === 'Completado' 
                                        ? 'text-green-700 bg-white border-green-200' 
                                        : 'text-amber-700 bg-white border-amber-200' }}">
                                    {{ $treat->estado }}
                                </span>
                                <p class="text-[11px] text-gray-500">ID: #{{ $treat->id_tratamiento }}</p>
                            </div>

                            <h3 class="text-sm font-bold text-gray-800 leading-tight truncate" title="{{ $treat->nombre }}">
                                {{ $treat->nombre }}
                            </h3>

                            <p class="text-xs text-gray-600 mt-1.5 line-clamp-2" title="{{ $treat->descripcion }}">
                                {{ $treat->descripcion }}
                            </p>
                        </div>

                        <div class="mt-3 space-y-0.5 text-[11px] text-gray-500 border-t border-green-200/30 pt-2">
                            <p><strong class="text-gray-700">Duración:</strong> {{ $treat->duracion }}</p>
                            <p class="truncate" title="{{ $treat->frecuencia_administration }}">
                                <strong class="text-gray-700">Frecuencia:</strong> {{ $treat->frecuencia_administration }}
                            </p>
                            <div class="flex gap-3 text-[10px] text-gray-400 font-medium mt-1">
                                <span>Diag. ID: #{{ $treat->diagnostico_id }}</span>
                                <span>Méd. ID: #{{ $treat->medico_id }}</span>
                            </div>
                        </div>
                    </div>
        
                    <div class="flex justify-between items-center mt-4 pt-2 border-t border-green-200/40">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 bg-white text-green-600 rounded-full flex items-center justify-center shadow-xs">
                                <i data-lucide="clipboard-list" class="w-3.5 h-3.5"></i>
                            </div>
                            <span class="text-[10px] font-bold text-gray-400">Plan Médico</span>
                        </div>
        
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('tratamiento.edit', ['treatment' => $treat->id_tratamiento]) }}" 
                               title="Editar" 
                               class="w-7 h-7 bg-white text-gray-600 hover:text-blue-600 rounded-full flex items-center justify-center shadow-sm transition-colors duration-200">
                                <i data-lucide="pencil" class="w-3.5 h-3.5"></i>
                            </a>
                            
                            <form method="POST" action="{{ route('tratamiento.destroy', ['treatment' => $treat->id_tratamiento]) }}" class="inline m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('¿Estás seguro de eliminar este tratamiento?')"
                                        title="Eliminar" 
                                        class="w-7 h-7 bg-white text-gray-600 hover:text-red-500 hover:bg-red-50 rounded-full flex items-center justify-center shadow-sm transition-colors duration-200">
                                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                </button>
                            </form>
                        </div>
                    </div>
        
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #cbd5e1;
            border-radius: 20px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background-color: #94a3b8;
        }
    </style>

@endsection