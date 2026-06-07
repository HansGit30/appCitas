@extends('layouts.panel')

@section('content')

    <div class="h-[calc(100vh-140px)] flex flex-col justify-center items-center px-4">
        
        <div class="w-full max-w-2xl bg-white border border-slate-100 rounded-[32px] p-8 shadow-xl shadow-slate-100/70 relative">
            
            <div class="mb-6">
                <a href="{{ route('medicamento') }}" 
                   class="inline-flex items-center gap-2 text-xs font-bold text-slate-400 hover:text-blue-600 transition-colors duration-200 group">
                    <div class="w-6 h-6 rounded-full bg-slate-50 group-hover:bg-blue-50 flex items-center justify-center transition-colors">
                        <i data-lucide="arrow-left" class="w-3 h-3"></i>
                    </div>
                    <span>Volver al listado</span>
                </a>
            </div>

            <div class="mb-8 text-center">
                <div class="inline-flex p-3 bg-blue-50 text-blue-600 rounded-2xl mb-3">
                    <i data-lucide="pill" class="w-6 h-6"></i>
                </div>
                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Registrar Nuevo Medicamento</h2>
                <p class="text-xs text-slate-400 mt-1">Complete la información del medicamento en el catálogo.</p>
            </div>

            <form action="{{ route('medicamento.store') }}" method="POST" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-4">
                    
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="nombre" class="text-xs font-bold text-slate-700 ml-1">Nombre del Medicamento</label>
                        <input type="text" id="nombre" name="nombre" required placeholder="Ej: Losartán Potásico"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="dosis" class="text-xs font-bold text-slate-700 ml-1">Dosis</label>
                        <input type="text" id="dosis" name="dosis" required placeholder="Ej: 50mg"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="frecuencia" class="text-xs font-bold text-slate-700 ml-1">Frecuencia</label>
                        <input type="text" id="frecuencia" name="frecuencia" required placeholder="Ej: Cada 24 horas"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="duracion" class="text-xs font-bold text-slate-700 ml-1">Duración</label>
                        <input type="text" id="duracion" name="duracion" required placeholder="Ej: 30 días"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="id_tratamiento" class="text-xs font-bold text-slate-700 ml-1">ID del Tratamiento</label>
                        <input type="number" id="tratamiento_id" name="id_tratamiento" placeholder="ID relacionado"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="proveedor" class="text-xs font-bold text-slate-700 ml-1">Proveedor</label>
                        <input type="text" id="proveedor" name="proveedor" required placeholder="Ej: Merck Sharp & Dohme"
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 transition-all">
                    </div>

                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label for="efecto" class="text-xs font-bold text-slate-700 ml-1">Efectos Secundarios</label>
                        <textarea id="efecto" name="efecto" rows="2" placeholder="Describa posibles efectos..."
                                  class="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 transition-all"></textarea>
                    </div>

                </div>

                <div class="flex justify-end items-center gap-3 pt-4 border-t border-slate-100 mt-6">
                    <a href="{{ route('medicamento') }}" 
                       class="px-5 py-2.5 text-xs font-bold text-slate-500 hover:text-slate-700 transition-colors rounded-full">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-6 py-2.5 rounded-full shadow-md shadow-blue-500/10 transition-all duration-200 ease-in-out transform hover:scale-[1.02]">
                        <i data-lucide="check" class="w-3.5 h-3.5"></i>
                        <span>Guardar Medicamento</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection