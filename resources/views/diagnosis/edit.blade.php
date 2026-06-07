@extends('layouts.panel')

@section('content')
    <div class="h-[calc(100vh-140px)] flex flex-col justify-center items-center px-4">

        <div class="w-full max-w-2xl bg-white border border-slate-100 rounded-[32px] p-8 shadow-xl shadow-slate-100/70 relative">

            <div class="mb-6">
                <a href="{{ route('diagnostico') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-400 hover:text-blue-600 transition-colors duration-200 group">
                    <div class="w-6 h-6 rounded-full bg-slate-50 group-hover:bg-blue-50 flex items-center justify-center transition-colors">
                        <i data-lucide="arrow-left" class="w-3 h-3"></i>
                    </div>
                    <span>Volver al listado</span>
                </a>
            </div>

            <div class="mb-8 text-center">
                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Editar Diagnóstico #{{ $diagnosis->id_diagnostico }}</h2>
            </div>

            <form action="{{ route('diagnostico.update', $diagnosis->id_diagnostico) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-4">

                    <div class="flex flex-col gap-1.5">
                        <label for="paciente_id" class="text-xs font-bold text-slate-700 ml-1">Paciente</label>
                        <select id="paciente_id" name="paciente_id" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                            @foreach ($patient as $pat)
                                <option value="{{ $pat->id_paciente }}" {{ $diagnosis->paciente_id == $pat->id_paciente ? 'selected' : '' }}>
                                    {{ $pat->nombre }} {{ $pat->apellido }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="medico_id" class="text-xs font-bold text-slate-700 ml-1">Médico</label>
                        <select id="medico_id" name="medico_id" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                            @foreach ($doctor as $medico)
                                <option value="{{ $medico->id_medico }}" {{ $diagnosis->medico_id == $medico->id_medico ? 'selected' : '' }}>
                                    {{ $medico->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="fecha" class="text-xs font-bold text-slate-700 ml-1">Fecha y Hora</label>
                        <input type="datetime-local" id="fecha" name="fecha" value="{{ date('Y-m-d\TH:i', strtotime($diagnosis->fecha)) }}" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="gravedad" class="text-xs font-bold text-slate-700 ml-1">Gravedad</label>
                        <select id="gravedad" name="gravedad" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                            @foreach(['Leve', 'Moderada', 'Grave'] as $nivel)
                                <option value="{{ $nivel }}" {{ $diagnosis->gravedad == $nivel ? 'selected' : '' }}>{{ $nivel }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="tipo_diagnostico" class="text-xs font-bold text-slate-700 ml-1">Tipo de Diagnóstico</label>
                        <input type="text" id="tipo_diagnostico" name="tipo_diagnostico" value="{{ $diagnosis->tipo_diagnostico }}" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="descripcion" class="text-xs font-bold text-slate-700 ml-1">Descripción del Diagnóstico</label>
                        <textarea id="descripcion" name="descripcion" rows="2" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">{{ $diagnosis->descripcion }}</textarea>
                    </div>

                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="recomendaciones" class="text-xs font-bold text-slate-700 ml-1">Recomendaciones</label>
                        <textarea id="recomendaciones" name="recomendaciones" rows="2" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">{{ $diagnosis->recomendaciones }}</textarea>
                    </div>

                </div>

                <div class="flex justify-end items-center gap-3 pt-4 border-t border-slate-100 mt-6">
                    <a href="{{ route('diagnostico') }}" class="px-5 py-2.5 text-xs font-bold text-slate-500 hover:text-slate-700 transition-colors rounded-full">Cancelar</a>
                    <button type="submit" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-6 py-2.5 rounded-full shadow-md shadow-blue-500/10 transition-all">
                        <i data-lucide="check" class="w-3.5 h-3.5"></i>
                        <span>Actualizar Diagnóstico</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection