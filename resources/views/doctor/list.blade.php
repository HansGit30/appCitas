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
            <span>Nuevo Medico</span>
        </a>
    </div>
</div>

    <div class="h-[calc(100vh-170px)] overflow-y-auto pr-2 custom-scrollbar">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($doctor as $doc)
                <div class="bg-[#e8eaf6] border border-[#d2d7f1] rounded-[24px] p-5 flex flex-col justify-between min-h-[170px] shadow-sm relative group">
                    
                    <div class="flex justify-between items-start">
                        <div class="max-w-[170px]">
                            <h3 class="text-sm font-bold text-gray-800 leading-tight">
                                Dr(a). {{ $doc->nombre }} {{ $doc->apellido }}
                            </h3>
                            <p class="text-[11px] text-gray-500 mt-0.5">Lic: {{ $doc->licencia }}</p>
                        </div>
                        <span class="px-2.5 py-0.5 bg-white/80 text-indigo-700 text-[11px] font-bold rounded-full border border-indigo-200/50 shadow-xs">
                            {{ $doc->especialidad }}
                        </span>
                    </div>
        
                    <div class="my-2 space-y-0.5 text-[11px] text-gray-600">
                        <p class="truncate"><strong class="text-gray-700">Tel:</strong> {{ $doc->telefono }}</p>
                        <p class="truncate"><strong class="text-gray-700">Email:</strong> {{ $doc->email }}</p>
                    </div>
        
                    <div class="flex justify-between items-center mt-2 pt-2 border-t border-indigo-200/40">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 bg-white text-indigo-600 rounded-full flex items-center justify-center text-xs font-bold shadow-xs uppercase">
                                {{ substr($doc->nombre, 0, 1) }}{{ substr($doc->apellido, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-gray-800">Experiencia</p>
                                <p class="text-[9px] text-gray-500">{{ $doc->años_experiencia }} años</p>
                            </div>
                        </div>
        
                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('medico.edit', ['doctor' => $doc->id_medico]) }}" 
                               title="Editar" 
                               class="w-7 h-7 bg-white text-gray-600 hover:text-blue-600 rounded-full flex items-center justify-center shadow-sm transition-colors duration-200">
                                <i data-lucide="pencil" class="w-3.5 h-3.5"></i>
                            </a>
                            
                            <form method="POST" action="{{ route('medico.destroy', ['doctor' => $doc->id_medico]) }}" class="inline m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('¿Estás seguro de eliminar a este médico?')"
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



@endsection