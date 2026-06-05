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
        <a href="{{ route('cita.create') }}" 
           class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2 rounded-full shadow-sm transition-all duration-200 ease-in-out transform hover:scale-[1.02]">
            <i data-lucide="user-plus" class="w-3.5 h-3.5"></i>
            <span>Nueva Cita</span>
        </a>
    </div>
</div>

    <div class="h-[calc(100vh-170px)] overflow-y-auto pr-2 custom-scrollbar">
        
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($appointment as $appo)
            <div class="bg-[#e8f5e9] border border-[#c8e6c9] rounded-[24px] p-5 flex flex-col justify-between min-h-[180px] shadow-sm relative group">
                
                <div class="flex justify-between items-start gap-2">
                    <div class="max-w-[170px]">
                        <h3 class="text-sm font-bold text-gray-800 martial-truncate leading-tight" title="{{ $appo->motivo }}">
                            {{ $appo->motivo }}
                        </h3>
                        <p class="text-[11px] text-gray-500 mt-0.5">Sala: {{ $appo->sala }}</p>
                    </div>
                    
                    @php
                        $statusClasses = match(strtolower($appo->estado)) {
                            'confirmada' => 'bg-green-100 text-green-700 border-green-200',
                            'pendiente'  => 'bg-amber-100 text-amber-700 border-amber-200',
                            'cancelada'  => 'bg-red-100 text-red-700 border-red-200',
                            default      => 'bg-gray-100 text-gray-700 border-gray-200'
                        };
                    @endphp
                    <span class="px-2 py-0.5 text-[10px] font-bold rounded-full border shadow-xs whitespace-nowrap {{ $statusClasses }}">
                        {{ ucfirst($appo->estado) }}
                    </span>
                </div>
    
                <div class="my-2 space-y-0.5 text-[11px] text-gray-600">
                    <p><strong class="text-gray-700">Paciente ID:</strong> #{{ $appo->paciente_id }}</p>
                    <p><strong class="text-gray-700">Médico ID:</strong> #{{ $appo->medico_id }}</p>
                    <p class="truncate" title="{{ $appo->observaciones }}">
                        <strong class="text-gray-700">Obs:</strong> {{ $appo->observaciones ?? 'Sin observaciones' }}
                    </p>
                </div>
    
                <div class="flex justify-between items-center mt-2 pt-2 border-t border-green-200/40">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 bg-white text-green-600 rounded-full flex items-center justify-center shadow-xs">
                            <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-800">
                                {{ \Carbon\Carbon::parse($appo->fecha)->format('d/m/Y') }}
                            </p>
                            <p class="text-[9px] text-gray-500">
                                {{ \Carbon\Carbon::parse($appo->fecha)->format('h:i A') }}
                            </p>
                        </div>
                    </div>
    
                    <div class="flex items-center gap-1.5">
                        <a href="{{ route('cita.edit', ['appointment' => $appo->id_cita]) }}" 
                           title="Editar" 
                           class="w-7 h-7 bg-white text-gray-600 hover:text-blue-600 rounded-full flex items-center justify-center shadow-sm transition-colors duration-200">
                            <i data-lucide="pencil" class="w-3.5 h-3.5"></i>
                        </a>
                        
                        <form method="POST" action="{{ route('cita.destroy', ['appointment' => $appo->id_cita]) }}" class="inline m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('¿Estás seguro de cancelar/eliminar esta cita?')"
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