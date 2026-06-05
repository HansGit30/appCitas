<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Dashboard</title>
    <!-- Tailwind CSS CDN (Para desarrollo rápido) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons para los iconos estilizados -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-[#e9eff2] min-h-screen font-sans p-4 flex justify-center items-center">

    <!-- Contenedor Principal con Bordes Redondeados -->
    <div class="w-full max-w-[1400px] h-[90vh] bg-[#f4f7f9] rounded-[32px] shadow-xl flex overflow-hidden p-2 gap-4">

        <!-- ================= SIDEBAR IZQUIERDO ================= -->
        <aside
            class="w-64 flex flex-col justify-between p-4 bg-gradient-to-b from-[#f4f7f9] via-[#eef4f7] to-[#e4ecf0] rounded-[24px]">
            <div>
                <!-- Logo e Icono Superior -->
                <div class="flex justify-between items-center mb-6 px-2">
                    <a href="{{ url('/') }}">
                        <div
                            class="w-10 h-10 bg-black text-white flex items-center justify-center rounded-xl font-bold text-xl">
                            <i data-lucide="layout-grid" class="w-5 h-5"></i>
                        </div>
                    </a>
                </div>

                <!-- Menú: Main Menu -->
                <div class="mb-6">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 mb-2">Main menu</p>
                    <nav class="space-y-1">
                        <a href="{{ route('paciente') }}"
                            class="flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-600 hover:bg-white/50 rounded-xl transition">
                            <i data-lucide="home" class="w-4 h-4"></i> Pacientes
                        </a>
                        <a href="{{ route('medico') }}"
                            class="flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-600 hover:bg-white/50 rounded-xl transition">
                            <i data-lucide="book-open" class="w-4 h-4"></i> Medicos
                        </a>
                        <a href="{{ route('cita') }}"
                            class="flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-600 hover:bg-white/50 rounded-xl transition">
                            <i data-lucide="calendar-check" class="w-4 h-4"></i> Citas
                        </a>
                        <a href="{{ route('medicamento') }}"
                            class="flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-600 hover:bg-white/50 rounded-xl transition">
                            <i data-lucide="file-text" class="w-4 h-4"></i> Medicamentos
                        </a>
                        <a href="{{ route('tratamiento') }}"
                            class="flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-600 hover:bg-white/50 rounded-xl transition">
                            <i data-lucide="folder-kanban" class="w-4 h-4"></i> Tratamientos
                        </a>
                        <a href="{{ route('diagnostico') }}"
                            class="flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-600 hover:bg-white/50 rounded-xl transition">
                            <i data-lucide="folder-kanban" class="w-4 h-4"></i> Diagnosticos
                        </a>

                    </nav>
                </div>
            </div>

            <!-- Sección de Usuario Inferior -->
            <div class="border-t border-gray-200/60 pt-4 flex flex-col gap-3">
                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-600 hover:bg-white/50 rounded-xl transition">
                    <i data-lucide="settings" class="w-4 h-4"></i> Settings
                </a>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3">Account</p>
                <div class="flex items-center gap-3 px-2">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=100&auto=format&fit=crop"
                        alt="Avatar" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <h4 class="text-sm font-bold text-gray-800">Admin</h4>
                        <p class="text-xs text-gray-500">Administrador General</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- ================= CONTENIDO PRINCIPAL (CALENDARIO) ================= -->
        <main class="flex-1 bg-white rounded-[24px] shadow-sm overflow-hidden flex flex-col p-6">

            @yield('content')
        </main>
    </div>

    <!-- Inicializar Iconos -->
    <script>
        lucide.createIcons();
    </script>
</body>

</html>