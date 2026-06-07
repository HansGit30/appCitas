@extends('layouts.panel')

@section('content')
    <div class="h-[calc(100vh-140px)] flex flex-col justify-center items-center px-4">

        <div class="w-full max-w-2xl bg-white border border-slate-100 rounded-[32px] p-8 shadow-xl shadow-slate-100/70 relative">

            <div class="mb-6">
                <a href="{{ route('cita') }}"
                    class="inline-flex items-center gap-2 text-xs font-bold text-slate-400 hover:text-blue-600 transition-colors duration-200 group">
                    <div class="w-6 h-6 rounded-full bg-slate-50 group-hover:bg-blue-50 flex items-center justify-center transition-colors">
                        <i data-lucide="arrow-left" class="w-3 h-3"></i>
                    </div>
                    <span>Volver al listado</span>
                </a>
            </div>

            <div class="mb-8 text-center">
                <div class="inline-flex p-3 bg-blue-50 text-blue-600 rounded-2xl mb-3">
                    <i data-lucide="calendar-plus" class="w-6 h-6"></i>
                </div>
                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Registrar Nueva Cita</h2>
            </div>

            <form action="{{ route('cita.store') }}" method="POST" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-4">

                    <div class="flex flex-col gap-1.5">
                        <label for="id_paciente" class="text-xs font-bold text-slate-700 ml-1">Paciente</label>
                        <select id="id_paciente" name="id_paciente" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                            <option value="" disabled selected>Seleccione un paciente</option>
                            @foreach ($patient as $pat)
                                <option value="{{ $pat->id_paciente }}">{{ $pat->nombre }} {{ $pat->apellido }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="id_medico" class="text-xs font-bold text-slate-700 ml-1">Médico</label>
                        <select id="id_medico" name="id_medico" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                            <option value="" disabled selected>Seleccione un médico</option>
                            @foreach ($doctor as $medico)
                                <option value="{{ $medico->id_medico }}">{{ $medico->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="fecha" class="text-xs font-bold text-slate-700 ml-1">Fecha y Hora</label>
                        <input type="datetime-local" id="fecha" name="fecha" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="sala" class="text-xs font-bold text-slate-700 ml-1">Sala / Consultorio</label>
                        <input type="text" id="sala" name="sala" required placeholder="Ej: Consultorio 101" class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="estado" class="text-xs font-bold text-slate-700 ml-1">Estado</label>
                        <select id="estado" name="estado" required class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all">
                            <option value="Pendiente">Pendiente</option>
                            <option value="Confirmada">Confirmada</option>
                            <option value="Completada">Completada</option>
                            <option value="Cancelada">Cancelada</option>
                        </select>
                    </div>

                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="motivo" class="text-xs font-bold text-slate-700 ml-1">Motivo de la Cita</label>
                        <textarea id="motivo" name="motivo" rows="2" required placeholder="Describa el motivo..." class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all"></textarea>
                    </div>

                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="observaciones" class="text-xs font-bold text-slate-700 ml-1">Observaciones</label>
                        <textarea id="observaciones" name="observaciones" rows="2" required placeholder="Notas adicionales..." class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 transition-all"></textarea>
                    </div>

                </div>

                <div class="flex justify-end items-center gap-3 pt-4 border-t border-slate-100 mt-6">
                    <a href="{{ route('cita') }}" class="px-5 py-2.5 text-xs font-bold text-slate-500 hover:text-slate-700 transition-colors rounded-full">Cancelar</a>
                    <button type="submit" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-6 py-2.5 rounded-full shadow-md shadow-blue-500/10 transition-all">
                        <i data-lucide="check" class="w-3.5 h-3.5"></i>
                        <span>Guardar Cita</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection