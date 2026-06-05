@extends('layouts.panel')

@section('content')

    <div class="min-h-[calc(100vh-140px)] py-8 flex flex-col justify-center items-center px-4">
        
        <div class="w-full max-w-2xl bg-white border border-slate-100 rounded-[32px] p-8 shadow-xl shadow-slate-100/70 relative">
            
            {{-- Botón Volver --}}
            <div class="mb-6">
                <a href="{{ route('cita') }}" 
                   class="inline-flex items-center gap-2 text-xs font-bold text-slate-400 hover:text-blue-600 transition-colors duration-200 group">
                    <div class="w-6 h-6 rounded-full bg-slate-50 group-hover:bg-blue-50 flex items-center justify-center transition-colors">
                        <i data-lucide="arrow-left" class="w-3 h-3"></i>
                    </div>
                    <span>Volver al listado</span>
                </a>
            </div>

            {{-- Encabezado --}}
            <div class="mb-8 text-center">
                <div class="inline-flex p-3 bg-blue-50 text-blue-600 rounded-2xl mb-3">
                    <i data-lucide="calendar-plus" class="w-6 h-6"></i>
                </div>
                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Agendar Nueva Cita</h2>
                <p class="text-xs text-slate-400 mt-1">Configure los detalles de la consulta médica para el paciente.</p>
            </div>

            {{-- Formulario --}}
            <form action="{{ route('cita.store') }}" method="POST" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-4">
                    
                    {{-- Fecha y Hora --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="fecha" class="text-xs font-bold text-slate-700 ml-1">Fecha y Hora</label>
                        <input type="datetime-local" id="fecha" name="fecha" required
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    {{-- Sala / Consultorio --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="sala" class="text-xs font-bold text-slate-700 ml-1">Sala / Consultorio</label>
                        <input type="text" id="sala" name="sala" required placeholder="Ej: Consultorio 101"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    {{-- Paciente --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="paciente_id" class="text-xs font-bold text-slate-700 ml-1">Paciente</label>
                        <div class="relative">
                            <select id="paciente_id" name="paciente_id" required
                                    class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 appearance-none cursor-pointer">
                                <option value="" disabled selected>Seleccione un paciente</option>
                                @foreach($patient as $paciente)
                                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-slate-400">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Médico --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="medico_id" class="text-xs font-bold text-slate-700 ml-1">Médico Especialista</label>
                        <div class="relative">
                            <select id="medico_id" name="medico_id" required
                                    class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 appearance-none cursor-pointer">
                                <option value="" disabled selected>Seleccione un médico</option>
                                @foreach($doctor as $medico)
                                    <option value="{{ $medico->id }}">Dr(a). {{ $medico->nombre }} {{ $medico->apellido }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-slate-400">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Estado de la Cita --}}
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="estado" class="text-xs font-bold text-slate-700 ml-1">Estado Inicial</label>
                        <div class="relative">
                            <select id="estado" name="estado" required
                                    class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 appearance-none cursor-pointer">
                                <option value="Pendiente" selected>Pendiente</option>
                                <option value="Confirmada">Confirmada</option>
                                <option value="Completada">Completada</option>
                                <option value="Cancelada">Cancelada</option>
                            </select>
                            <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-slate-400">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Motivo de la Cita --}}
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="motivo" class="text-xs font-bold text-slate-700 ml-1">Motivo de la Cita</label>
                        <input type="text" id="motivo" name="motivo" required placeholder="Ej: Control anual de presión / Fiebre persistente"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    {{-- Observaciones adicionales --}}
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="observaciones" class="text-xs font-bold text-slate-700 ml-1">Observaciones</label>
                        <textarea id="observaciones" name="observaciones" rows="3" placeholder="Ej: Paciente requiere traer exámenes previos..."
                                  class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 resize-none"></textarea>
                    </div>

                </div>

                {{-- Acciones del Formulario --}}
                <div class="flex justify-end items-center gap-3 pt-4 border-t border-slate-100 mt-6">
                    <a href="{{ route('cita') }}" 
                       class="px-5 py-2.5 text-xs font-bold text-slate-500 hover:text-slate-700 transition-colors rounded-full">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-6 py-2.5 rounded-full shadow-md shadow-blue-500/10 transition-all duration-200 ease-in-out transform hover:scale-[1.02]">
                        <i data-lucide="check" class="w-3.5 h-3.5"></i>
                        <span>Agendar Cita</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection