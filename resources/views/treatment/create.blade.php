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
                    <i data-lucide="clipboard-plus" class="w-6 h-6"></i>
                </div>
                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Registrar Nuevo Tratamiento</h2>
                <p class="text-xs text-slate-400 mt-1">Asigne el tratamiento correspondiente al diagnóstico médico.</p>
            </div>

            <form action="{{ route('tratamiento.store') }}" method="POST" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-4">
                    
                    {{-- Nombre del Tratamiento --}}
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="nombre" class="text-xs font-bold text-slate-700 ml-1">Nombre del Tratamiento</label>
                        <input type="text" id="nombre" name="nombre" required placeholder="Ej: Plan Antihipertensivo Inicial"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    {{-- Diagnóstico (Foreign Key) --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="diagnostico_id" class="text-xs font-bold text-slate-700 ml-1">Diagnóstico Asociado</label>
                        <select id="diagnostico_id" name="diagnostico_id" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                            <option value="" disabled selected>Seleccione el diagnóstico</option>
                            @foreach ($diagnosis as $diag)
                                <option value="{{ $diag->id_diagnostico }}">{{ $diag->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Médico (Foreign Key) --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="medico_id" class="text-xs font-bold text-slate-700 ml-1">Médico Responsable</label>
                        <select id="medico_id" name="medico_id" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                            <option value="" disabled selected>Seleccione el médico</option>
                            @foreach ($doctor as $medico)
                                <option value="{{ $medico->id_medico }}">{{ $medico->nombre }} {{ $medico->apellido }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Duración y Frecuencia --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="duracion" class="text-xs font-bold text-slate-700 ml-1">Duración</label>
                        <input type="text" id="duracion" name="duracion" required placeholder="Ej: 30 días"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="frecuencia_administracion" class="text-xs font-bold text-slate-700 ml-1">Frecuencia</label>
                        <input type="text" id="frecuencia_administracion" name="frecuencia_administracion" required placeholder="Ej: Cada 24 horas"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    {{-- Descripción --}}
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="descripcion" class="text-xs font-bold text-slate-700 ml-1">Descripción del Tratamiento</label>
                        <textarea id="descripcion" name="descripcion" rows="2" required placeholder="Detalles del esquema farmacológico..." 
                                  class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all"></textarea>
                    </div>

                    {{-- Estado --}}
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="estado" class="text-xs font-bold text-slate-700 ml-1">Estado</label>
                        <select id="estado" name="estado" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                            <option value="En progreso">En progreso</option>
                            <option value="Completado">Completado</option>
                            <option value="Suspendido">Suspendido</option>
                        </select>
                    </div>

                </div>

                <div class="flex justify-end items-center gap-3 pt-4 border-t border-slate-100 mt-6">
                    <a href="{{ route('tratamiento') }}" 
                       class="px-5 py-2.5 text-xs font-bold text-slate-500 hover:text-slate-700 transition-colors rounded-full">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-6 py-2.5 rounded-full shadow-md shadow-blue-500/10 transition-all">
                        <i data-lucide="check" class="w-3.5 h-3.5"></i>
                        <span>Guardar Tratamiento</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection