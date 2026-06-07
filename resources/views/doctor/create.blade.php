@extends('layouts.panel')

@section('content')

    <div class="h-[calc(100vh-140px)] flex flex-col justify-center items-center px-4">
        
        <div class="w-full max-w-2xl bg-white border border-slate-100 rounded-[32px] p-8 shadow-xl shadow-slate-100/70 relative">
            
            <div class="mb-6">
                <a href="{{ route('medico') }}" 
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
                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Registrar Nuevo Doctor</h2>
                <p class="text-xs text-slate-400 mt-1">Complete la información profesional para dar de alta al médico en el sistema.</p>
            </div>

            <form action="{{ route('medico.store') }}" method="POST" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-4">
                    
                    <div class="flex flex-col gap-1.5">
                        <label for="nombre" class="text-xs font-bold text-slate-700 ml-1">Nombres</label>
                        <input type="text" id="nombre" name="nombre" required placeholder="Ej: Alejandro"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="apellido" class="text-xs font-bold text-slate-700 ml-1">Apellidos</label>
                        <input type="text" id="apellido" name="apellido" required placeholder="Ej: Toledo"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="especialidad" class="text-xs font-bold text-slate-700 ml-1">Especialidad</label>
                        <input type="text" id="especialidad" name="especialidad" required placeholder="Ej: Cardiología"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="telefono" class="text-xs font-bold text-slate-700 ml-1">Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" placeholder="Ej: +51 999 888 777"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="email" class="text-xs font-bold text-slate-700 ml-1">Correo Electrónico</label>
                        <input type="email" id="email" name="email" required placeholder="Ej: doctor@clinica.com"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="licencia" class="text-xs font-bold text-slate-700 ml-1">Licencia (CMP)</label>
                        <input type="text" id="licencia" name="licencia" required placeholder="Ej: CMP-12345"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="años_experiencia" class="text-xs font-bold text-slate-700 ml-1">Años de Experiencia</label>
                        <input type="number" id="años_experiencia" name="años_experiencia" placeholder="Ej: 10"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10 transition-all duration-200">
                    </div>

                </div>

                <div class="flex justify-end items-center gap-3 pt-4 border-t border-slate-100 mt-6">
                    <a href="{{ route('medico') }}" 
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