@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <!-- ENCABEZADO DE BIENVENIDA -->
    <div class="text-start mb-5 ps-2">
        <h1 class="fw-bold text-dark mb-2" style="font-size: 2.5rem; letter-spacing: -0.5px;">Te cuidamos, te curamos.</h1>
        <p class="text-muted fw-semibold" style="font-size: 1.05rem;">Hola, ¿qué necesitas hacer hoy?</p>
    </div>

    <!-- GRILLA DE ACCESOS RÁPIDOS -->
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-6 g-3 mb-5">
        
        <!-- Tarjeta 1: Agendar una cita -->
        <div class="col">
            <a href="#" class="card h-100 text-decoration-none border-0 shadow-sm p-3 text-start bg-white align-items-start justify-content-between option-card" style="border-radius: 16px; min-height: 140px; transition: all 0.2s ease-in-out;">
                <div class="p-2 rounded-3 bg-light text-primary mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2B66FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                        <line x1="12" y1="14" x2="12" y2="20"></line>
                        <line x1="9" y1="17" x2="15" y2="17"></line>
                    </svg>
                </div>
                <span class="fw-bold text-dark small lh-sm">Agendar una cita</span>
            </a>
        </div>

        <!-- Tarjeta 2: Ver mis resultados -->
        <div class="col">
            <a href="#" class="card h-100 text-decoration-none border-0 shadow-sm p-3 text-start bg-white align-items-start justify-content-between option-card" style="border-radius: 16px; min-height: 140px; transition: all 0.2s ease-in-out;">
                <div class="p-2 rounded-3 bg-light text-primary mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2B66FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                </div>
                <span class="fw-bold text-dark small lh-sm">Ver mis resultados</span>
            </a>
        </div>

        <!-- Tarjeta 3: Buscar un médico -->
        <div class="col">
            <a href="#" class="card h-100 text-decoration-none border-0 shadow-sm p-3 text-start bg-white align-items-start justify-content-between option-card" style="border-radius: 16px; min-height: 140px; transition: all 0.2s ease-in-out;">
                <div class="p-2 rounded-3 bg-light text-primary mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2B66FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                        <circle cx="19" cy="8" r="2"></circle>
                        <line x1="22" y1="11" x2="22" y2="13"></line>
                    </svg>
                </div>
                <span class="fw-bold text-dark small lh-sm">Buscar un médico</span>
            </a>
        </div>

        <!-- Tarjeta 4: Solicitar un servicio -->
        <div class="col">
            <a href="#" class="card h-100 text-decoration-none border-0 shadow-sm p-3 text-start bg-white align-items-start justify-content-between option-card" style="border-radius: 16px; min-height: 140px; transition: all 0.2s ease-in-out;">
                <div class="p-2 rounded-3 bg-light text-primary mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2B66FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="17 8 12 3 7 8"></polyline>
                        <line x1="12" y1="3" x2="12" y2="15"></line>
                    </svg>
                </div>
                <span class="fw-bold text-dark small lh-sm">Solicitar un servicio</span>
            </a>
        </div>

        <!-- Tarjeta 5: Conocer las especialidades -->
        <div class="col">
            <a href="#" class="card h-100 text-decoration-none border-0 shadow-sm p-3 text-start bg-white align-items-start justify-content-between option-card" style="border-radius: 16px; min-height: 140px; transition: all 0.2s ease-in-out;">
                <div class="p-2 rounded-3 bg-light text-primary mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2B66FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                    </svg>
                </div>
                <span class="fw-bold text-dark small lh-sm">Conocer las especialidades</span>
            </a>
        </div>

        <!-- Tarjeta 6: Programa Vive Bien -->
        <div class="col">
            <a href="#" class="card h-100 text-decoration-none border-0 shadow-sm p-3 text-start bg-white align-items-start justify-content-between option-card position-relative" style="border-radius: 16px; min-height: 140px; transition: all 0.2s ease-in-out;">
                <span class="position-absolute badge bg-success font-monospace" style="top: 12px; right: 12px; font-size: 0.65rem; padding: 4px 8px; border-radius: 30px; background-color: #00CC99 !important;">Nuevo</span>
                
                <div class="p-2 rounded-3 bg-light text-primary mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2B66FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="6" width="18" height="12" rx="2"></rect>
                        <circle cx="12" cy="12" r="2"></circle>
                        <path d="M12 2v4"></path>
                        <path d="M12 18v4"></path>
                    </svg>
                </div>
                <span class="fw-bold text-dark small lh-sm">Programa Vive Bien</span>
            </a>
        </div>

    </div>

    <!-- BANNER: PROGRAMA VIVE BIEN -->
    <div class="card border-0 shadow-sm overflow-hidden mb-5" style="border-radius: 24px; background-color: #EBF0FF;">
        <div class="row g-0 align-items-center">
            
            <div class="col-md-5 p-4 p-sm-5 text-start">
                
                @if (session('status'))
                    <div class="alert alert-success border-0 small mb-3 py-2" role="alert" style="border-radius: 10px;">
                        {{ session('status') }}
                    </div>
                @endif
                
                <h2 class="fw-bold text-dark mb-3" style="font-size: 2rem; letter-spacing: -0.5px;">Conoce nuestro programa<br><span class="text-primary" style="color: #2B66FF !important;">Vive Bien</span></h2>
                <p class="text-muted mb-4" style="font-size: 0.95rem; max-width: 360px;">Accede a tarifas y descuentos preferenciales en toda nuestra red.</p>
                
                <div class="d-flex align-items-center gap-3">
                    <a href="#" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm" style="background-color: #2B66FF; border-color: #2B66FF; padding-top: 0.6rem; padding-bottom: 0.6rem;">
                        Conoce más
                    </a>
                    
                    <div class="d-flex align-items-center gap-2 ms-2">
                        <span class="text-muted small font-monospace">1/4</span>
                        <button class="btn btn-dark p-0 d-flex align-items-center justify-content-center rounded-circle" style="width: 26px; height: 26px;" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-7 position-relative" style="min-height: 280px; background: url('{{ asset('doc.webp') }}') top/cover no-repeat;">
                <div class="position-absolute bottom-0 end-0 bg-white p-3 m-3 rounded-4 shadow-sm text-center d-none d-sm-block" style="max-width: 340px; border: 1px solid rgba(0,0,0,0.05);">
                    <p class="text-muted small fw-semibold mb-0">Accede a descuentos exclusivos con <span class="text-primary fw-bold" style="color: #2B66FF !important;">un solo pago anual.</span></p>
                </div>
            </div>

        </div>
    </div>

    <!-- SECCIÓN NUEVA: ENCUENTRA UNA SEDE CERCA DE TI (image_3e6e44.jpg) -->
    <div class="row align-items-center g-5 py-4 my-5">
        
        <!-- Bloque Izquierdo: Lista de Sedes en Acordeón -->
        <div class="col-lg-5 text-start">
            <h2 class="fw-bold text-dark mb-4" style="font-size: 2.2rem; letter-spacing: -0.5px; line-height: 1.2;">
                Encuentra una sede<br>cerca de ti.
            </h2>
            
            <div class="accordion accordion-flush custom-sedes-accordion" id="accordionSedes">
                
                <!-- Sede 1: San Borja -->
                <div class="accordion-item bg-transparent border-bottom border-light-subtle">
                    <h2 class="accordion-header" id="flush-headingSanBorja">
                        <button class="accordion-button collapsed fw-bold text-dark bg-transparent ps-0 py-3 text-secondary-hover" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSanBorja" aria-expanded="false" aria-controls="flush-collapseSanBorja" style="font-size: 1.05rem;">
                            San Borja
                        </button>
                    </h2>
                    <div id="flush-collapseSanBorja" class="accordion-collapse collapse" aria-labelledby="flush-headingSanBorja" data-bs-parent="#accordionSedes">
                        <div class="accordion-body ps-0 pt-1 text-muted small pb-3">
                            Encuentra nuestra sede principal de atención especializada en Av. Guardia Civil. Contamos con estacionamiento, laboratorio clínico y consultorios modernos.
                        </div>
                    </div>
                </div>

                <!-- Sede 2: Lima -->
                <div class="accordion-item bg-transparent border-bottom border-light-subtle">
                    <h2 class="accordion-header" id="flush-headingLima">
                        <button class="accordion-button collapsed fw-bold text-dark bg-transparent ps-0 py-3 text-secondary-hover" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseLima" aria-expanded="false" aria-controls="flush-collapseLima" style="font-size: 1.05rem;">
                            Lima
                        </button>
                    </h2>
                    <div id="flush-collapseLima" class="accordion-collapse collapse" aria-labelledby="flush-headingLima" data-bs-parent="#accordionSedes">
                        <div class="accordion-body ps-0 pt-1 text-muted small pb-3">
                            Ubicada en el centro de la ciudad, equipada con tecnología de diagnóstico avanzado y atención médica en más de 30 especialidades.
                        </div>
                    </div>
                </div>

                <!-- Sede 3: Surco -->
                <div class="accordion-item bg-transparent border-bottom border-light-subtle">
                    <h2 class="accordion-header" id="flush-headingSurco">
                        <button class="accordion-button collapsed fw-bold text-dark bg-transparent ps-0 py-3 text-secondary-hover" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSurco" aria-expanded="false" aria-controls="flush-collapseSurco" style="font-size: 1.05rem;">
                            Surco
                        </button>
                    </h2>
                    <div id="flush-collapseSurco" class="accordion-collapse collapse" aria-labelledby="flush-headingSurco" data-bs-parent="#accordionSedes">
                        <div class="accordion-body ps-0 pt-1 text-muted small pb-3">
                            Sede integral pensada para tu comodidad en Av. El Polo. Cuenta con urgencias 24/7 y farmacia especializada.
                        </div>
                    </div>
                </div>

                <!-- Sede 4: San Isidro -->
                <div class="accordion-item bg-transparent border-bottom border-light-subtle">
                    <h2 class="accordion-header" id="flush-headingSanIsidro">
                        <button class="accordion-button collapsed fw-bold text-dark bg-transparent ps-0 py-3 text-secondary-hover" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSanIsidro" aria-expanded="false" aria-controls="flush-collapseSanIsidro" style="font-size: 1.05rem;">
                            San Isidro
                        </button>
                    </h2>
                    <div id="flush-collapseSanIsidro" class="accordion-collapse collapse" aria-labelledby="flush-headingSanIsidro" data-bs-parent="#accordionSedes">
                        <div class="accordion-body ps-0 pt-1 text-muted small pb-3">
                            Centro enfocado en chequeos preventivos corporativos y consultas médicas ambulatorias de alta fluidez.
                        </div>
                    </div>
                </div>

                <!-- Sede 5: La Molina -->
                <div class="accordion-item bg-transparent border-0">
                    <h2 class="accordion-header" id="flush-headingLaMolina">
                        <button class="accordion-button collapsed fw-bold text-dark bg-transparent ps-0 py-3 text-secondary-hover" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseLaMolina" aria-expanded="false" aria-controls="flush-collapseLaMolina" style="font-size: 1.05rem;">
                            La Molina
                        </button>
                    </h2>
                    <div id="flush-collapseLaMolina" class="accordion-collapse collapse" aria-labelledby="flush-headingLaMolina" data-bs-parent="#accordionSedes">
                        <div class="accordion-body ps-0 pt-1 text-muted small pb-3">
                            Nuestra sede residencial con atención pediátrica preferencial, ginecología y medicina familiar.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bloque Derecho: Fotografía del Edificio Institucional -->
        <div class="col-lg-7">
            <div class="w-100 shadow-sm overflow-hidden" style="border-radius: 24px; min-height: 400px; background: url('{{ asset('clinica.jpg') }}') center/cover no-repeat;">
                <!-- Cambia la URL de arriba por tu asset local si lo prefieres, emulando la fachada vidriada de la clínica de image_3e6e44.jpg -->
            </div>
        </div>
    </div>

    <!-- SECCIÓN: Logos de Aseguradoras y EPS Aliadas -->
    <div class="ase row row-cols-3 row-cols-md-6 align-items-center justify-content-center g-4 mt-5 pt-4 border-top opacity-75 filter-grayscale">
        <div class="col text-center d-flex justify-content-center align-items-center">
            <img src="{{ asset('rimac.png') }}" alt="Rimac Seguros" class="img-fluid" style="max-height: 45px; object-fit: contain;">
        </div>
    
        <div class="col text-center d-flex justify-content-center align-items-center">
            <img src="{{ asset('pacifico.png') }}" alt="Pacífico Seguros" class="img-fluid" style="max-height: 45px; object-fit: contain;">
        </div>
    
        <div class="col text-center d-flex justify-content-center align-items-center">
            <img src="{{ asset('mapfre.png') }}" alt="MAPFRE" class="img-fluid" style="max-height: 40px; object-fit: contain;">
        </div>
    
        <div class="col text-center d-flex justify-content-center align-items-center">
            <img src="{{ asset('la_positiva.png') }}" alt="La Positiva Seguros" class="img-fluid" style="max-height: 45px; object-fit: contain;">
        </div>
    
        <div class="col text-center d-flex justify-content-center align-items-center">
            <img src="{{ asset('interseguro.png') }}" alt="Interseguro" class="img-fluid" style="max-height: 35px; object-fit: contain;">
        </div>
    
        <div class="col text-center d-flex justify-content-center align-items-center">
            <img src="{{ asset('bnp.png') }}" alt="BNP Paribas" class="img-fluid" style="max-height: 35px; object-fit: contain;">
        </div>
    </div>

</div>

<style>

    /* Efecto de elevación en tarjetas */
    .option-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(43, 102, 255, 0.08) !important;
        border: 1px solid rgba(43, 102, 255, 0.15) !important;
    }

    /* Limpieza visual de flechas de Bootstrap en el acordeón según la imagen */
    .custom-sedes-accordion .accordion-button:not(.collapsed) {
        color: #2B66FF !important;
        background-color: transparent !important;
        box-shadow: none !important;
    }
    .custom-sedes-accordion .accordion-button:focus {
        box-shadow: none !important;
    }
    .custom-sedes-accordion .accordion-button::after {
        background-size: 1rem;
        transition: transform 0.2s ease-in-out;
    }

    /* Filtro para homologar los logos del footer */
    .filter-grayscale {
        filter: grayscale(100%);
        transition: opacity 0.2s;
    }
    .filter-grayscale:hover {
        opacity: 0.85;
    }
</style>
@endsection