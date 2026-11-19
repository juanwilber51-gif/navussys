<?php
// Espacio de nombres de las pruebas de características
namespace Tests\Feature;

// Importa el caso base de pruebas de Laravel
use Tests\TestCase;
// Importa el trait para refrescar base de datos o interactuar
use Illuminate\Foundation\Testing\WithoutMiddleware;

// Clase de prueba automatizada para NAVUSSYS
class NavussysTest extends TestCase
{
    // Verifica que la página principal pública cargue con éxito
    public function test_pagina_principal_carga_correctamente(): void
    {
        // Realiza petición GET a la raíz
        $response = $this->get('/');
        // Verifica código HTTP 200
        $response->assertStatus(200);
        // Verifica que contenga el nombre del sistema
        $response->assertSee('NAVUSSYS');
        // Verifica que contenga el nombre del desarrollador
        $response->assertSee('Juan Wilber Supa Ttito');
    }

    // Verifica que el login administrativo privado esté disponible
    public function test_login_administrador_disponible(): void
    {
        // Realiza petición GET a la ruta privada de login
        $response = $this->get('/admin/login');
        // Verifica respuesta HTTP 200
        $response->assertStatus(200);
        // Verifica que contenga el texto del panel
        $response->assertSee('Panel de Control');
    }

    // Verifica autenticación exitosa del administrador
    public function test_autenticacion_administrador_exitosa(): void
    {
        // Envía credenciales válidas al endpoint de login
        $response = $this->post('/admin/authenticate', [
            'email' => 'juanwilber@gmail.com', // Correo del administrador
            'password' => 'AdminNavus2026*',   // Clave segura del administrador
        ]);
        // Verifica redirección al panel de control
        $response->assertRedirect('/admin/dashboard');
    }

    // Verifica que el acceso no autenticado a admin/dashboard redirija a admin/login
    public function test_acceso_dashboard_sin_autenticar_redirige_a_login(): void
    {
        // Realiza peticion GET sin sesion
        $response = $this->get('/admin/dashboard');
        // Debe redirigir a admin/login
        $response->assertRedirect('/admin/login');
    }

    // Verifica que el acceso autenticado al dashboard cargue la vista correctamente con status 200
    public function test_dashboard_carga_correctamente_cuando_autenticado(): void
    {
        // Obtiene el primer usuario administrador de la base de datos
        $admin = \App\Models\User::first();
        // Actua como el administrador autenticado y solicita el dashboard
        $response = $this->actingAs($admin)->get('/admin/dashboard');
        // Verifica que la respuesta sea HTTP 200 OK
        $response->assertStatus(200);
        // Verifica que renderice el panel y las metricas
        $response->assertSee('Panel de Administración NAVUSSYS');
        $response->assertSee('Catalogo de Sistemas Web en Venta');
    }

    // Verifica la descarga del documento formal Word APA 7
    public function test_descarga_documento_word(): void
    {
        // Realiza petición GET a la ruta de descarga
        $response = $this->get('/docs/download');
        // Verifica código HTTP 200
        $response->assertStatus(200);
        // Verifica que la cabecera sea de tipo archivo Word
        $response->assertHeader('content-type', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    }
}
