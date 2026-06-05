<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-xl navbar-light bg-white shadow-sm py-3 position-relative">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <span class="fw-bold text-primary" style="font-size: 1.25rem;">
                        <span class="text-info">🔵</span> Clínica Senati
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-xl-4">

                        @auth
                        {{-- Definimos la lista de correos autorizados como administradores --}}
                        @php
                            $admins = [
                                'olartemelohans224@gmail.com',
                                'aguirreantoni172@gmail.com',
                                'derekgalarzasilva@gmail.com',
                            ];
                        @endphp

                        @if (in_array(auth()->user()->email, $admins))
                            <li class="nav-item dropdown position-static px-2">
                            <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" id="pacientesDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Panel Administrativo
                            </a>

                            <div class="dropdown-menu w-100 border-0 shadow-sm m-0 p-4"
                                aria-labelledby="pacientesDropdown" style="top: 100%; border-radius: 0 0 16px 16px;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 border-end">
                                            <ul class="list-unstyled lh-lg">
                                                <li><a class="dropdown-item fw-bold text-dark d-flex align-items-center py-2"
                                                        href="{{ route('paciente') }}">Pacientes <i class="bi bi-arrow-right ms-2"></i></a>
                                                </li>
                                                <li><a class="dropdown-item fw-bold text-dark d-flex align-items-center py-2"
                                                        href="{{ route('medico') }}">Médicos <i class="bi bi-arrow-right ms-2"></i></a></li>
                                                <li><a class="dropdown-item fw-bold text-dark d-flex align-items-center py-2"
                                                        href="{{ route('cita') }}">Citas <i class="bi bi-arrow-right ms-2"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="col-md-4 border-end ps-md-4">
                                            <ul class="list-unstyled lh-lg">
                                                <li><a class="dropdown-item fw-bold text-dark d-flex align-items-center py-2"
                                                        href="{{ route('diagnostico') }}">Diagnósticos <i class="bi bi-arrow-right ms-2"></i></a>
                                                </li>
                                                <li><a class="dropdown-item fw-bold text-dark d-flex align-items-center py-2"
                                                        href="{{ route('tratamiento') }}">Tratamientos <i class="bi bi-arrow-right ms-2"></i></a>
                                                </li>
                                                <li><a class="dropdown-item fw-bold text-dark d-flex align-items-center py-2"
                                                        href="{{ route('medicamento') }}">Medicamentos <i class="bi bi-arrow-right ms-2"></i></a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-md-4 ps-md-4 d-flex align-items-center justify-content-center">
                                            <div class="position-relative overflow-hidden rounded-4 shadow-sm w-100"
                                                style="height: 280px; background: url('{{ asset('ad.webp') }}') center/cover no-repeat;">
                                                <div
                                                    class="position-absolute bottom-0 start-50 translate-middle-x mb-4 w-75">
                                                    <a href="#"
                                                        class="btn btn-white bg-white w-100 rounded-pill py-2 fw-bold text-dark shadow-sm d-flex align-items-center justify-content-center gap-2"
                                                        style="font-size: 0.9rem;">
                                                        Te cuidamos, te curamos. <i class="bi bi-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </li>
                        @else
                        <li class="nav-item dropdown position-static px-2">
                            <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" id="pacientesDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Para Pacientes
                            </a>
    
                            <div class="dropdown-menu w-100 border-0 shadow-sm m-0 p-4"
                                aria-labelledby="pacientesDropdown" style="top: 100%; border-radius: 0 0 16px 16px;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 border-end">
                                            <ul class="list-unstyled lh-lg">
                                                <li><a class="dropdown-item fw-bold text-dark d-flex align-items-center py-2"
                                                        href="#">Especialidades <i
                                                            class="bi bi-arrow-right ms-2"></i></a></li>
                                                <li><a class="dropdown-item text-muted py-2" href="#">Unidades
                                                        especializadas</a></li>
                                                <li><a class="dropdown-item text-muted py-2" href="#">Staff Médico</a>
                                                </li>
                                                <li><a class="dropdown-item text-muted py-2" href="#">Centro de
                                                        Diagnóstico de Imágenes</a></li>
                                                <li><a class="dropdown-item text-muted py-2" href="#">Servicios</a></li>
                                                <li><a class="dropdown-item text-muted py-2" href="#">Promociones</a>
                                                </li>
                                                <li><a class="dropdown-item text-muted py-2" href="#">Sedes</a></li>
                                                <li><a class="dropdown-item text-muted py-2" href="#">Centro
                                                        Estético</a></li>
                                                <li><a class="dropdown-item text-muted py-2" href="#">Programa Vive
                                                        Bien</a></li>
                                            </ul>
                                        </div>
    
                                        <div class="col-md-4 border-end ps-md-4">
                                            <ul class="list-unstyled lh-lg">
                                                <li><a class="dropdown-item text-muted py-2" href="#">Atención
                                                        general</a></li>
                                                <li><a class="dropdown-item text-muted py-2" href="#">Especialidades
                                                        médicas</a></li>
                                                <li><a class="dropdown-item text-muted py-2" href="#">Especialidades
                                                        quirúrgicas</a></li>
                                            </ul>
                                        </div>
    
                                        <div class="col-md-4 ps-md-4 d-flex align-items-center justify-content-center">
                                            <div class="position-relative overflow-hidden rounded-4 shadow-sm w-100"
                                                style="height: 280px; background: url('{{ asset('pac.webp') }}') center/cover no-repeat;">
                                                <div
                                                    class="position-absolute bottom-0 start-50 translate-middle-x mb-4 w-75">
                                                    <a href="#"
                                                        class="btn btn-white bg-white w-100 rounded-pill py-2 fw-bold text-dark shadow-sm d-flex align-items-center justify-content-center gap-2"
                                                        style="font-size: 0.9rem;">
                                                        Encuentra una especialidad <i class="bi bi-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item px-2"><a class="nav-link text-dark fw-semibold" href="#">Blog educativo</a>
                        </li>
                        <li class="nav-item px-2"><a class="nav-link text-dark fw-semibold" href="#">Cirugía
                                Robótica</a></li>
                        @endif
                    @else
                    <li class="nav-item dropdown position-static px-2">
                        <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" id="pacientesDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Para Pacientes
                        </a>

                        <div class="dropdown-menu w-100 border-0 shadow-sm m-0 p-4"
                            aria-labelledby="pacientesDropdown" style="top: 100%; border-radius: 0 0 16px 16px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 border-end">
                                        <ul class="list-unstyled lh-lg">
                                            <li><a class="dropdown-item fw-bold text-dark d-flex align-items-center py-2"
                                                    href="#">Especialidades <i
                                                        class="bi bi-arrow-right ms-2"></i></a></li>
                                            <li><a class="dropdown-item text-muted py-2" href="#">Unidades
                                                    especializadas</a></li>
                                            <li><a class="dropdown-item text-muted py-2" href="#">Staff Médico</a>
                                            </li>
                                            <li><a class="dropdown-item text-muted py-2" href="#">Centro de
                                                    Diagnóstico de Imágenes</a></li>
                                            <li><a class="dropdown-item text-muted py-2" href="#">Servicios</a></li>
                                            <li><a class="dropdown-item text-muted py-2" href="#">Promociones</a>
                                            </li>
                                            <li><a class="dropdown-item text-muted py-2" href="#">Sedes</a></li>
                                            <li><a class="dropdown-item text-muted py-2" href="#">Centro
                                                    Estético</a></li>
                                            <li><a class="dropdown-item text-muted py-2" href="#">Programa Vive
                                                    Bien</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-4 border-end ps-md-4">
                                        <ul class="list-unstyled lh-lg">
                                            <li><a class="dropdown-item text-muted py-2" href="#">Atención
                                                    general</a></li>
                                            <li><a class="dropdown-item text-muted py-2" href="#">Especialidades
                                                    médicas</a></li>
                                            <li><a class="dropdown-item text-muted py-2" href="#">Especialidades
                                                    quirúrgicas</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-4 ps-md-4 d-flex align-items-center justify-content-center">
                                        <div class="position-relative overflow-hidden rounded-4 shadow-sm w-100"
                                            style="height: 280px; background: url('{{ asset('pac.webp') }}') center/cover no-repeat;">
                                            <div
                                                class="position-absolute bottom-0 start-50 translate-middle-x mb-4 w-75">
                                                <a href="#"
                                                    class="btn btn-white bg-white w-100 rounded-pill py-2 fw-bold text-dark shadow-sm d-flex align-items-center justify-content-center gap-2"
                                                    style="font-size: 0.9rem;">
                                                    Encuentra una especialidad <i class="bi bi-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item px-2"><a class="nav-link text-dark fw-semibold" href="#">Blog educativo</a>
                    </li>
                    <li class="nav-item px-2"><a class="nav-link text-dark fw-semibold" href="#">Cirugía
                            Robótica</a></li>
                    @endauth

                    </ul>

                    <ul class="navbar-nav ms-auto align-items-center flex-row justify-content-end">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item px-2">
                                    <a class="nav-link d-flex align-items-center p-1 text-dark" href="{{ route('login') }}"
                                        title="{{ __('Login') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown px-2">
                                <a id="navbarDropdown"
                                    class="nav-link dropdown-toggle text-dark fw-semibold d-flex align-items-center"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                        fill="none" stroke="#2B66FF" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="me-1">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="d-none d-md-inline-block ms-1"
                                        style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        {{ Auth::user()->name }}
                                    </span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end shadow-sm border-0"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item py-2" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                        <li class="nav-item ms-2">
                            <a class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm" href="#"
                                style="background-color: #2B66FF; border-color: #2B66FF; white-space: nowrap;">
                                Agendar cita
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>

        <footer class="bg-white pt-5 pb-4 mt-5 border-top">
            <div class="container text-start">

                <!-- Redes Sociales Superior -->
                <div class="d-flex flex-wrap align-items-center gap-4 pb-4 mb-4 border-bottom">
                    <span class="fw-bold text-dark" style="font-size: 1.1rem;">Síguenos</span>

                    <a href="#"
                        class="text-decoration-none text-dark fw-semibold small d-flex align-items-center gap-2 link-primary-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="text-dark" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                        </svg>
                        Facebook
                    </a>

                    <a href="#"
                        class="text-decoration-none text-dark fw-semibold small d-flex align-items-center gap-2 link-primary-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="text-dark" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg>
                        Instagram
                    </a>

                    <a href="#"
                        class="text-decoration-none text-dark fw-semibold small d-flex align-items-center gap-2 link-primary-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="text-dark" viewBox="0 0 16 16">
                            <path
                                d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                        </svg>
                        LinkedIn
                    </a>

                    <a href="#"
                        class="text-decoration-none text-dark fw-semibold small d-flex align-items-center gap-2 link-primary-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="text-dark" viewBox="0 0 16 16">
                            <path
                                d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26c.01-.135.021-.264.032-.386C.14 4.58.211 4.077.312 3.697a2.01 2.01 0 0 1 1.415-1.42c1.123-.302 5.287-.332 6.11-.335zM6.5 5.204v5.592l4.957-2.796z" />
                        </svg>
                        Youtube
                    </a>
                </div>
                <!-- Columnas de Enlaces -->
                <div class="row g-4">

                    <!-- Columna 1: Institutional -->
                    <div class="col-6 col-sm-6 col-md-3">
                        <h6 class="fw-bold text-dark mb-3">Institucional</h6>
                        <ul class="list-unstyled d-flex flex-column gap-2" style="font-size: 0.88rem;">
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Derechos de los
                                    pacientes</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Quiénes Somos</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Acreditaciones</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Convenios de Salud</a>
                            </li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Trabaja con Nosotros</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Columna 2: Pacientes -->
                    <div class="col-6 col-sm-6 col-md-3">
                        <h6 class="fw-bold text-dark mb-3">Pacientes</h6>
                        <ul class="list-unstyled d-flex flex-column gap-2" style="font-size: 0.88rem;">
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Especialidades</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Unidades
                                    especializadas</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Servicios</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Staff Médico</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Sedes</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Centro Estético</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Promociones y
                                    Ofertas</a></li>
                        </ul>
                    </div>

                    <!-- Columna 3: Médicos & Empresas -->
                    <div class="col-6 col-sm-6 col-md-3">
                        <h6 class="fw-bold text-dark mb-3">Médicos</h6>
                        <ul class="list-unstyled d-flex flex-column gap-2 mb-4" style="font-size: 0.88rem;">
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Investigación</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Revista Interciencia
                                    Médica</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Información para
                                    Profesionales</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Convenios Académicos</a>
                            </li>
                        </ul>

                        <h6 class="fw-bold text-dark mb-3">Empresas</h6>
                        <ul class="list-unstyled d-flex flex-column gap-2" style="font-size: 0.88rem;">
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Unidades Médicas
                                    Empresariales</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Evaluaciones Medicas
                                    Preventivas y Ocupacionales</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Salud Ocupacional</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Columna 4: Legales y Libro de Reclamaciones -->
                    <div class="col-6 col-sm-6 col-md-3">
                        <h6 class="fw-bold text-dark mb-3">Legales</h6>
                        <ul class="list-unstyled d-flex flex-column gap-2 mb-4" style="font-size: 0.88rem;">
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Términos y Condiciones
                                    (T&C)</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Política de
                                    Privacidad</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Política de Cookies</a>
                            </li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Consentimiento para usos
                                    adicionales</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">T&C Consultorio
                                    Virtual</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">T&C Pruebas Covid</a>
                            </li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">T&C Campañas
                                    Comerciales</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Comprobante
                                    electrónico</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Canal de Integridad</a>
                            </li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Cumplimiento y
                                    Sostenibilidad</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Sistema de gestión
                                    ambiental</a></li>
                            <li><a href="#" class="text-decoration-none text-muted footer-link">Flujo de reclamos</a>
                            </li>
                        </ul>

                        <!-- Acceso al Libro de Reclamaciones -->
                        <div class="pt-2">
                            <img src="{{ asset('lib.png') }}" alt="" class="img-fluid"
                                style="max-height: 55px; object-fit: contain;">
                        </div>
                    </div>

                </div>

                <!-- Derechos Reservados Final -->
                <div class="pt-4 mt-5 border-top">
                    <p class="text-dark fw-bold m-0" style="font-size: 0.82rem;">
                        © 2026 Clínica Senati. Todos los derechos reservados
                    </p>
                </div>

            </div>
        </footer>

    </div>
</body>

</html>