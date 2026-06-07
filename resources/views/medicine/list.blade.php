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
        <a href="{{ route('medicamento.create') }}" 
           class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2 rounded-full shadow-sm transition-all duration-200 ease-in-out transform hover:scale-[1.02]">
            <i data-lucide="user-plus" class="w-3.5 h-3.5"></i>
            <span>Nuevo Medicamento</span>
        </a>
    </div>
</div>
    <div class="h-[calc(100vh-170px)] overflow-y-auto pr-2 custom-scrollbar">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($medicine as $medi)
                <div class="bg-[#e3f2fd] border border-[#bbdefb] rounded-[24px] p-5 flex flex-col justify-between min-h-[190px] shadow-sm relative group">
                    
                    <div class="flex justify-between items-start gap-2">
                        <div class="max-w-[180px]">
                            <h3 class="text-sm font-bold text-gray-800 leading-tight truncate" title="{{ $medi->nombre }}">
                                {{ $medi->nombre }}
                            </h3>
                            <p class="text-[11px] text-blue-700 font-medium mt-0.5" title="{{ $medi->proveedor }}">
                                Prov: {{ $medi->proveedor }}
                            </p>
                        </div>
                        
                        <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-white/80 text-blue-800 border border-blue-200/60 shadow-xs whitespace-nowrap">
                            ID: #{{ $medi->id_medicamento }}
                        </span>
                    </div>
        
                    <div class="my-2.5 space-y-0.5 text-[11px] text-gray-600">
                        <p><strong class="text-gray-700">Dosis:</strong> {{ $medi->dosis }}</p>
                        <p><strong class="text-gray-700">Frecuencia:</strong> {{ $medi->frecuencia }}</p>
                        <p><strong class="text-gray-700">Duración:</strong> {{ $medi->duracion }}</p>
                        <p class="truncate text-gray-500 italic mt-1" title="{{ $medi->efectos_secundarios }}">
                            <strong class="text-gray-700 not-italic">Efectos:</strong> {{ $medi->efectos_secundarios ?? 'Ninguno reportado' }}
                        </p>
                    </div>
        
                    <div class="flex justify-between items-center mt-2 pt-2 border-t border-blue-200/40">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 bg-white text-blue-600 rounded-full flex items-center justify-center shadow-xs">
                                <i data-lucide="pill" class="w-3.5 h-3.5"></i>
                            </div>
                            <span class="text-[10px] font-bold text-gray-400">Farmacia</span>
                        </div>
        
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('medicamento.edit', ['medicine' => $medi->id_medicamento]) }}" 
                               title="Editar" 
                               class="w-7 h-7 bg-white text-gray-600 hover:text-blue-600 rounded-full flex items-center justify-center shadow-sm transition-colors duration-200">
                                <i data-lucide="pencil" class="w-3.5 h-3.5"></i>
                            </a>
                            
                            <form method="POST" action="{{ route('medicamento.destroy', ['medicine' => $medi->id_medicamento]) }}" class="inline m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('¿Estás seguro de eliminar este medicamento?')"
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