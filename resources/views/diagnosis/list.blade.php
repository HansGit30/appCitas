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
        <a href="{{ route('paciente.create') }}" 
           class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2 rounded-full shadow-sm transition-all duration-200 ease-in-out transform hover:scale-[1.02]">
            <i data-lucide="user-plus" class="w-3.5 h-3.5"></i>
            <span>Nuevo Diagnostico</span>
        </a>
    </div>
</div>

    <div class="h-[calc(100vh-170px)] overflow-y-auto pr-2 custom-scrollbar">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($diagnosis as $diag)
                <div class="bg-[#f3e5f5] border border-[#e1bee7] rounded-[24px] p-5 flex flex-col justify-between min-h-[170px] shadow-sm relative group">
                    
                    <div class="flex flex-col justify-between flex-grow">
                        <div>
                            <div class="flex justify-between items-start mb-1">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-purple-700 bg-white/80 px-2 py-0.5 rounded-full border border-purple-200/50">
                                    Diagnóstico
                                </span>
                                <p class="text-[11px] text-gray-500">ID: #{{ $diag->id_diagnostico }}</p>
                            </div>
                            <p class="text-sm font-semibold text-gray-800 leading-snug mt-2 line-clamp-3" title="{{ $diag->descripcion }}">
                                {{ $diag->descripcion }}
                            </p>
                        </div>
                    </div>
        
                    <div class="flex justify-between items-center mt-4 pt-2 border-t border-purple-200/40">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 bg-white text-purple-600 rounded-full flex items-center justify-center shadow-xs">
                                <i data-lucide="activity" class="w-3.5 h-3.5"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-gray-800">
                                    {{ \Carbon\Carbon::parse($diag->fecha)->format('d/m/Y') }}
                                </p>
                                <p class="text-[9px] text-gray-500">
                                    {{ \Carbon\Carbon::parse($diag->fecha)->format('h:i A') }}
                                </p>
                            </div>
                        </div>
        
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('diagnostico.edit', ['diagnosis' => $diag->id_diagnostico]) }}" 
                               title="Editar" 
                               class="w-7 h-7 bg-white text-gray-600 hover:text-blue-600 rounded-full flex items-center justify-center shadow-sm transition-colors duration-200">
                                <i data-lucide="pencil" class="w-3.5 h-3.5"></i>
                            </a>
                            
                            <form method="POST" action="{{ route('diagnostico.destroy', ['diagnosis' => $diag->id_diagnostico]) }}" class="inline m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('¿Estás seguro de eliminar este diagnóstico?')"
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