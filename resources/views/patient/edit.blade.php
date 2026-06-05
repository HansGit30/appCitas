@extends('layouts.panel')

@section('content')

    <div class="h-[calc(100vh-140px)] flex flex-col justify-center items-center px-4">
        
        <div class="w-full max-w-2xl bg-white border border-slate-100 rounded-[32px] p-8 shadow-xl shadow-slate-100/70 relative">
            
            <div class="mb-6">
                <a href="{{ route('paciente') }}" 
                   class="inline-flex items-center gap-2 text-xs font-bold text-slate-400 hover:text-blue-600 transition-colors duration-200 group">
                    <div class="w-6 h-6 rounded-full bg-slate-50 group-hover:bg-blue-50 flex items-center justify-center transition-colors">
                        <i data-lucide="arrow-left" class="w-3 h-3"></i>
                    </div>
                    <span>Volver al listado</span>
                </a>
            </div>

            <div class="mb-8 text-center">
                <div class="inline-flex p-3 bg-amber-50 text-amber-600 rounded-2xl mb-3">
                    <i data-lucide="user-cog" class="w-6 h-6"></i>
                </div>
                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Editar Paciente</h2>
                <p class="text-xs text-slate-400 mt-1">Modifique la información necesaria para actualizar el expediente clínico (ID: #{{ $patient->id_paciente }}).</p>
            </div>

            <form action="{{ route('paciente.update', $patient->id_paciente) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-4">
                    
                    <div class="flex flex-col gap-1.5">
                        <label for="nombre" class="text-xs font-bold text-slate-700 ml-1">Nombres</label>
                        <input type="text" id="nombre" name="nombre" required value="{{ $patient->nombre }}" placeholder="Ej: Carlos"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="apellido" class="text-xs font-bold text-slate-700 ml-1">Apellidos</label>
                        <input type="text" id="apellido" name="apellido" required value="{{ $patient->apellido }}" placeholder="Ej: Mendoza"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="fecha_nacimiento" class="text-xs font-bold text-slate-700 ml-1">Fecha de Nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required value="{{ $patient->fecha_nacimiento }}"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="telefono" class="text-xs font-bold text-slate-700 ml-1">Teléfono / Celular</label>
                        <input type="tel" id="telefono" name="telefono" value="{{ $patient->telefono }}" placeholder="Ej: 987 654 321"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="genero" class="text-xs font-bold text-slate-700 ml-1">Género</label>
                        <div class="relative">
                            <select id="genero" name="genero" required
                                    class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 appearance-none cursor-pointer">
                                <option value="Masculino" {{ $patient->genero === 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="Femenino" {{ $patient->genero === 'Femenino' ? 'selected' : '' }}>Femenino</option>
                            </select>
                            <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-slate-400">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="tipo_sangre" class="text-xs font-bold text-slate-700 ml-1">Tipo de Sangre</label>
                        <div class="relative">
                            <select id="tipo_sangre" name="tipo_sangre" required
                                    class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 appearance-none cursor-pointer">
                                @foreach(['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'] as $sangre)
                                    <option value="{{ $sangre }}" {{ $patient->tipo_sangre === $sangre ? 'selected' : '' }}>{{ $sangre }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-slate-400">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="direccion" class="text-xs font-bold text-slate-700 ml-1">Dirección Residencial</label>
                        <input type="text" id="direccion" name="direccion" value="{{ $patient->direccion }}" placeholder="Ej: Av. Principal 123, Apt 4B"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                </div>

                <div class="flex justify-end items-center gap-3 pt-4 border-t border-slate-100 mt-6">
                    <a href="{{ route('paciente') }}" 
                       class="px-5 py-2.5 text-xs font-bold text-slate-500 hover:text-slate-700 transition-colors rounded-full">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold px-6 py-2.5 rounded-full shadow-md shadow-amber-500/10 transition-all duration-200 ease-in-out transform hover:scale-[1.02]">
                        <i data-lucide="refresh-cw" class="w-3.5 h-3.5"></i>
                        <span>Actualizar Registro</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection