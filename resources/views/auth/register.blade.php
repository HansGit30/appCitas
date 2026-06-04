@extends('layouts.app')

@section('content')
<div class="container-fluid min-vh-100 p-0 m-0" style="margin-top: -1.5rem !important;">
    <div class="row g-0 min-vh-100">
        
        <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-between p-5 text-white position-relative overflow-hidden" 
             style="background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.1)), url('{{ asset('s.jpg') }}') center/cover no-repeat; border-radius: 0 30px 30px 0;">
        </div>

        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-white py-5 px-4 px-sm-5">
            <div class="w-100" style="max-width: 400px;">
                
                <div class="text-center mb-4">
                    <span class="fw-bold text-primary h4">
                        <span class="text-info">🔵</span> Clínica Internacional
                    </span>
                    <h3 class="fw-bold text-dark mt-4 mb-1" style="font-size: 1.75rem;">Crear cuenta</h3>
                </div>

                <form method="POST" action="{{ route('register') }}" class="mt-4">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label text-secondary small fw-bold mb-1">Nombre completo</label>
                        <input id="name" type="text" class="form-control form-control-lg bg-light border-1 @error('name') is-invalid @enderror" 
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus 
                               placeholder="Tu nombre y apellido" style="border-radius: 10px; font-size: 0.95rem;">
                        
                        @error('name')
                            <span class="invalid-feedback mt-1 small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-secondary small fw-bold mb-1">Correo electrónico</label>
                        <input id="email" type="email" class="form-control form-control-lg bg-light border-1 @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" required autocomplete="email" 
                               placeholder="ejemplo@correo.com" style="border-radius: 10px; font-size: 0.95rem;">
                        
                        @error('email')
                            <span class="invalid-feedback mt-1 small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-secondary small fw-bold mb-1">Contraseña</label>
                        <input id="password" type="password" class="form-control form-control-lg bg-light border-1 @error('password') is-invalid @enderror" 
                               name="password" required autocomplete="new-password" 
                               placeholder="Crea una contraseña" style="border-radius: 10px; font-size: 0.95rem;">

                        @error('password')
                            <span class="invalid-feedback mt-1 small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm" class="form-label text-secondary small fw-bold mb-1">Confirmar contraseña</label>
                        <input id="password-confirm" type="password" class="form-control form-control-lg bg-light border-1" 
                               name="password_confirmation" required autocomplete="new-password" 
                               placeholder="Repite tu contraseña" style="border-radius: 10px; font-size: 0.95rem;">
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold shadow-sm" style="background-color: #2B66FF; border-color: #2B66FF; font-size: 1rem; padding: 0.75rem 1rem;">
                            Registrarse
                        </button>
                    </div>

                    <div class="position-relative text-center my-4">
                        <hr class="text-muted opacity-25">
                        <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted small">o regístrate con</span>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ url('/login/google') }}" class="btn btn-outline-light border text-dark w-50 py-2 d-flex align-items-center justify-content-center gap-2" style="border-radius: 10px; font-size: 0.9rem;">
                            <svg width="18" height="18" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                            Google
                        </a>
                        <a href="{{ url('/login/github') }}" class="btn btn-outline-light border text-dark w-50 py-2 d-flex align-items-center justify-content-center gap-2" style="border-radius: 10px; font-size: 0.9rem;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.43 9.8 8.2 11.38.6.11.82-.26.82-.58v-2.03c-3.34.72-4.04-1.61-4.04-1.61-.55-1.39-1.33-1.76-1.33-1.76-1.08-.74.08-.73.08-.73 1.2.09 1.83 1.24 1.83 1.24 1.07 1.83 2.8 1.3 3.49.99.11-.77.41-1.3.75-1.6-2.67-.3-5.48-1.33-5.48-5.94 0-1.31.47-2.38 1.25-3.22-.13-.3-.54-1.52.12-3.17 0 0 1.01-.32 3.3 1.23.96-.26 1.98-.39 3-.4 1.02.01 2.04.14 3 .4 2.29-1.55 3.3-1.23 3.3-1.23.66 1.65.25 2.87.12 3.17.78.84 1.25 1.9 1.25 3.22 0 4.62-2.81 5.63-5.49 5.92.43.37.82 1.1.82 2.22v3.29c0 .32.22.69.82.58C20.57 21.8 24 17.31 24 12c0-6.63-5.37-12-12-12z"/></svg>
                            GitHub
                        </a>
                    </div>

                    <div class="text-center mt-4">
                        <span class="text-muted small">¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="fw-bold text-decoration-none" style="color: #2B66FF;">Ingresar</a></span>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection