<?php
// Define el archivo como script PHP de Laravel 12
namespace App\Http\Controllers;
// Importa la clase Request para recibir peticiones HTTP
use Illuminate\Http\Request;
// Importa el Facade Auth para manejar la autenticacion del administrador
use Illuminate\Support\Facades\Auth;

// Controlador encargado del acceso privado y cierre de sesion del administrador
class AdminAuthController extends Controller
{
    // Muestra la vista privada con el formulario de login administrativo
    public function showLogin()
    {
        // Verifica si el administrador ya cuenta con una sesion activa
        if (Auth::check()) {
            // Redirige directamente al panel de administracion
            return redirect()->route('admin.dashboard');
        }

        // Renderiza y devuelve la vista Blade del formulario de login
        return view('admin.login');
    }

    // Valida y autentica las credenciales ingresadas por el administrador
    public function login(Request $request)
    {
        // Valida que los datos recibidos cumplan las reglas de acceso
        $credentials = $request->validate([
            // Correo electronico obligatorio y con formato valido
            'email' => 'required|email',
            // Contraseña de acceso obligatoria en formato texto
            'password' => 'required|string',
        ]);

        // Intenta la autenticacion mediante el guard web con recordatorio de sesion
        if (Auth::attempt($credentials, true)) {
            // Regenera el ID de sesion para evitar ataques de fijacion de sesion
            $request->session()->regenerate();
            // Redirige a la ruta deseada o al panel de control por defecto
            return redirect()->intended(route('admin.dashboard'));
        }

        // Si las credenciales fallan, regresa con el error correspondiente
        return back()->withErrors([
            // Mensaje de credenciales incorrectas para el usuario
            'email' => 'Correo o contraseña incorrectos.',
        // Mantiene unicamente el campo email en el formulario
        ])->onlyInput('email');
    }

    // Cierra de manera segura la sesion del administrador
    public function logout(Request $request)
    {
        // Cierra la sesion activa en el sistema de autenticacion
        Auth::logout();
        // Invalida la sesion actual eliminando todos los datos almacenados
        $request->session()->invalidate();
        // Regenera el token CSRF para prevenir ataques en formularios futuros
        $request->session()->regenerateToken();

        // Redirige al visitante a la pagina de inicio publica
        return redirect()->route('home');
    }
}
