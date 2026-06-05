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
                <div class="inline-flex p-3 bg-blue-50 text-blue-600 rounded-2xl mb-3">
                    <i data-lucide="user-plus" class="w-6 h-6"></i>
                </div>
                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Registrar Nuevo Paciente</h2>
                <p class="text-xs text-slate-400 mt-1">Complete la información clínica para dar de alta al paciente en el sistema.</p>
            </div>

            <form action="{{ route('paciente.store') }}" method="POST" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-4">
                    
                    <div class="flex flex-col gap-1.5">
                        <label for="nombre" class="text-xs font-bold text-slate-700 ml-1">Nombres</label>
                        <input type="text" id="nombre" name="nombre" required placeholder="Ej: Carlos"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="apellido" class="text-xs font-bold text-slate-700 ml-1">Apellidos</label>
                        <input type="text" id="apellido" name="apellido" required placeholder="Ej: Mendoza"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="fecha_nacimiento" class="text-xs font-bold text-slate-700 ml-1">Fecha de Nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="telefono" class="text-xs font-bold text-slate-700 ml-1">Teléfono / Celular</label>
                        <input type="tel" id="telefono" name="telefono" placeholder="Ej: 987 654 321"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="genero" class="text-xs font-bold text-slate-700 ml-1">Género</label>
                        <div class="relative">
                            <select id="genero" name="genero" required
                                    class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 appearance-none cursor-pointer">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
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
                                <option value="" disabled selected>Seleccione</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                            <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-slate-400">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="direccion" class="text-xs font-bold text-slate-700 ml-1">Dirección Residencial</label>
                        <input type="text" id="direccion" name="direccion" placeholder="Ej: Av. Principal 123, Apt 4B"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                </div>

                <div class="flex justify-end items-center gap-3 pt-4 border-t border-slate-100 mt-6">
                    <a href="{{ route('paciente') }}" 
                       class="px-5 py-2.5 text-xs font-bold text-slate-500 hover:text-slate-700 transition-colors rounded-full">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-6 py-2.5 rounded-full shadow-md shadow-blue-500/10 transition-all duration-200 ease-in-out transform hover:scale-[1.02]">
                        <i data-lucide="check" class="w-3.5 h-3.5"></i>
                        <span>Guardar Registro</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection