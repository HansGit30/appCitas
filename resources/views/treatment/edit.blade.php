@extends('layouts.panel')

@section('content')

    <div class="h-[calc(100vh-140px)] flex flex-col justify-center items-center px-4">
        
        <div class="w-full max-w-2xl bg-white border border-slate-100 rounded-[32px] p-8 shadow-xl shadow-slate-100/70 relative">
            
            <div class="mb-6">
                <a href="{{ route('tratamiento') }}" 
                   class="inline-flex items-center gap-2 text-xs font-bold text-slate-400 hover:text-blue-600 transition-colors duration-200 group">
                    <div class="w-6 h-6 rounded-full bg-slate-50 group-hover:bg-blue-50 flex items-center justify-center transition-colors">
                        <i data-lucide="arrow-left" class="w-3 h-3"></i>
                    </div>
                    <span>Volver al listado</span>
                </a>
            </div>

            <div class="mb-8 text-center">
                <div class="inline-flex p-3 bg-blue-50 text-blue-600 rounded-2xl mb-3">
                    <i data-lucide="edit-3" class="w-6 h-6"></i>
                </div>
                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Editar Tratamiento</h2>
                <p class="text-xs text-slate-400 mt-1">Modifique los datos del tratamiento seleccionado.</p>
            </div>

            {{-- 1. Ruta dirigida al método update con el ID y método PUT --}}
            <form action="{{ route('tratamiento.update', $treatment->id_tratamiento) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-4">
                    
                    {{-- Nombre --}}
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="nombre" class="text-xs font-bold text-slate-700 ml-1">Nombre del Tratamiento</label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $treatment->nombre) }}" required
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    {{-- Diagnóstico --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="diagnostico_id" class="text-xs font-bold text-slate-700 ml-1">Diagnóstico</label>
                        <select id="diagnostico_id" name="diagnostico_id" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                            @foreach ($diagnosis as $diag)
                                <option value="{{ $diag->id_diagnostico }}" {{ $treatment->diagnostico_id == $diag->id_diagnostico ? 'selected' : '' }}>
                                    {{ $diag->descripcion }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Médico --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="medico_id" class="text-xs font-bold text-slate-700 ml-1">Médico Responsable</label>
                        <select id="medico_id" name="medico_id" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                            @foreach ($doctor as $medico)
                                <option value="{{ $medico->id_medico }}" {{ $treatment->medico_id == $medico->id_medico ? 'selected' : '' }}>
                                    {{ $medico->nombre }} {{ $medico->apellido }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Duración --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="duracion" class="text-xs font-bold text-slate-700 ml-1">Duración</label>
                        <input type="text" id="duracion" name="duracion" value="{{ old('duracion', $treatment->duracion) }}" required
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    {{-- Frecuencia --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="frecuencia_administracion" class="text-xs font-bold text-slate-700 ml-1">Frecuencia</label>
                        <input type="text" id="frecuencia_administracion" name="frecuencia_administracion" value="{{ old('frecuencia_administracion', $treatment->frecuencia_administracion) }}" required
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    {{-- Descripción --}}
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="descripcion" class="text-xs font-bold text-slate-700 ml-1">Descripción</label>
                        <textarea id="descripcion" name="descripcion" rows="2" required 
                                  class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">{{ old('descripcion', $treatment->descripcion) }}</textarea>
                    </div>

                    {{-- Estado --}}
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="estado" class="text-xs font-bold text-slate-700 ml-1">Estado</label>
                        <select id="estado" name="estado" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                            <option value="En progreso" {{ $treatment->estado == 'En progreso' ? 'selected' : '' }}>En progreso</option>
                            <option value="Completado" {{ $treatment->estado == 'Completado' ? 'selected' : '' }}>Completado</option>
                            <option value="Suspendido" {{ $treatment->estado == 'Suspendido' ? 'selected' : '' }}>Suspendido</option>
                        </select>
                    </div>

                </div>

                <div class="flex justify-end items-center gap-3 pt-4 border-t border-slate-100 mt-6">
                    <a href="{{ route('tratamiento') }}" class="px-5 py-2.5 text-xs font-bold text-slate-500 hover:text-slate-700 transition-colors rounded-full">Cancelar</a>
                    <button type="submit" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-6 py-2.5 rounded-full shadow-md shadow-blue-500/10 transition-all">
                        <i data-lucide="save" class="w-3.5 h-3.5"></i>
                        <span>Actualizar Tratamiento</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection