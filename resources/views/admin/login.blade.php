{{-- Vista de inicio de sesión privado del administrador --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> {{-- Codificación de caracteres --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> {{-- Adaptabilidad responsive --}}
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- Token CSRF de seguridad --}}
    <title>Acceso Administrativo Privado · {{ config('app.name', 'NAVUSSYS') }}</title> {{-- Título de la ventana --}}
    
    {{-- Estilos y fuentes del login --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> {{-- Bootstrap 5 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> {{-- Iconos --}}
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet"> {{-- Fuentes --}}
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif; {{-- Fuente principal --}}
            background: radial-gradient(circle at top right, #1e1b4b 0%, #0f172a 60%, #020617 100%); {{-- Fondo degradado --}}
            min-height: 100vh; {{-- Altura completa --}}
            display: flex; {{-- Centrado flex --}}
            align-items: center; {{-- Alineación vertical --}}
            justify-content: center; {{-- Centrado horizontal --}}
            color: #f8fafc; {{-- Color de texto --}}
        }
        .login-card {
            background: rgba(30, 41, 59, 0.7); {{-- Fondo con transparencia --}}
            backdrop-filter: blur(16px); {{-- Efecto difuminado glass --}}
            border: 1px solid rgba(255, 255, 255, 0.1); {{-- Borde translúcido --}}
            border-radius: 24px; {{-- Esquinas redondeadas --}}
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); {{-- Sombra pronunciada --}}
            max-width: 440px; {{-- Ancho máximo --}}
            width: 100%; {{-- Ancho completo --}}
        }
        .brand-icon-box {
            width: 52px; height: 52px; border-radius: 14px; {{-- Dimensiones y bordes --}}
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #ec4899 100%); {{-- Gradiente tricolor --}}
            display: inline-flex; align-items: center; justify-content: center; {{-- Centrado del icono --}}
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4); {{-- Brillo del icono --}}
        }
        .form-control {
            background: rgba(15, 23, 42, 0.6); {{-- Fondo del input --}}
            border: 1px solid rgba(148, 163, 184, 0.2); {{-- Borde tenue --}}
            color: #ffffff; border-radius: 12px; padding: 12px 16px; {{-- Texto y padding --}}
        }
        .form-control:focus {
            background: rgba(15, 23, 42, 0.8); border-color: #6366f1; {{-- Estado enfocado --}}
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.2); color: #ffffff; {{-- Anillo de enfoque --}}
        }
        .btn-login {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); {{-- Gradiente índigo --}}
            border: none; border-radius: 12px; padding: 12px; font-weight: 600; color: #ffffff; {{-- Estilo botón --}}
            transition: all 0.2s; {{-- Transición hover --}}
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(99, 102, 241, 0.4); color: #ffffff; }
    </style>
</head>
<body>

<div class="container p-3">
    <div class="login-card p-4 p-md-5 mx-auto">
        {{-- Cabecera de la tarjeta de login --}}
        <div class="text-center mb-4">
            <div class="brand-icon-box mb-3">
                <i class="bi bi-shield-lock-fill text-white fs-3"></i> {{-- Icono de candado seguro --}}
            </div>
            <h3 class="fw-bold mb-1" style="font-family: 'Outfit', sans-serif;">{{ config('app.name', 'NAVUSSYS') }}</h3> {{-- Nombre del sistema --}}
            <p class="text-slate-400 small mb-0">Panel de Control & Administración Exclusiva</p> {{-- Subtítulo --}}
            <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill fs-xs mt-2 px-2.5 py-1">
                <i class="bi bi-eye-slash-fill me-1"></i> Acceso Privado No Indexado {{-- Badge de privacidad --}}
            </span>
        </div>

        {{-- Alerta de errores de validación --}}
        @if ($errors->any())
            <div class="alert alert-danger py-2 px-3 small rounded-3 d-flex align-items-center gap-2 mb-3">
                <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        {{-- Formulario de autenticación del administrador --}}
        <form action="{{ route('admin.authenticate') }}" method="POST">
            @csrf {{-- Protección contra ataques CSRF --}}
            <div class="mb-3">
                <label class="form-label text-slate-300 small fw-medium">Correo del Administrador</label> {{-- Etiqueta email --}}
                <div class="input-group">
                    <span class="input-group-text bg-slate-900 border-slate-700 text-slate-400 border-end-0 rounded-start-3"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" name="email" class="form-control border-start-0 rounded-end-3" placeholder="admin@navussys.com" value="{{ old('email', 'juanwilber@gmail.com') }}" required autofocus> {{-- Campo de correo --}}
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label text-slate-300 small fw-medium">Contraseña de Seguridad</label> {{-- Etiqueta password --}}
                <div class="input-group">
                    <span class="input-group-text bg-slate-900 border-slate-700 text-slate-400 border-end-0 rounded-start-3"><i class="bi bi-key-fill"></i></span>
                    <input type="password" name="password" class="form-control border-start-0 rounded-end-3" placeholder="••••••••••••" value="AdminNavus2026*" required> {{-- Campo de contraseña --}}
                </div>
            </div>

            {{-- Botón de envío de credenciales --}}
            <button type="submit" class="btn btn-login w-100 mb-3 shadow">
                <i class="bi bi-box-arrow-in-right me-1"></i> Ingresar al Panel de Control
            </button>
        </form>

        {{-- Cuadro informativo de credenciales demo --}}
        <div class="p-3 rounded-3 bg-slate-900/60 border border-slate-700/60 text-center small text-slate-400">
            <span class="d-block text-warning fw-semibold fs-xs mb-1"><i class="bi bi-info-circle-fill me-1"></i> Credenciales de Demostración:</span>
            <div class="fs-xs">Usuario: <strong class="text-white">juanwilber@gmail.com</strong></div> {{-- Usuario de prueba --}}
            <div class="fs-xs">Clave: <strong class="text-white">AdminNavus2026*</strong></div> {{-- Clave de prueba --}}
        </div>

        {{-- Enlace para regresar a la portada pública --}}
        <div class="text-center mt-3">
            <a href="{{ route('home') }}" class="text-slate-400 text-decoration-none small hover-text-white">
                <i class="bi bi-arrow-left me-1"></i> Volver a la Tienda Pública
            </a>
        </div>
    </div>
</div>

</body>
</html>
