<?php
/**
 * ENDPOINT API: Login (Inicio de Sesión)
 * Ruta: php/api/login.php
 * Método: POST
 *
 * Recibe las credenciales del usuario (usuario_login y contrasena) vía POST,
 * las valida contra la tabla inicio_sesion de la BD, e inicia una sesión PHP
 * si las credenciales son correctas. Retorna JSON con el resultado.
 */

// Iniciar sesión PHP para gestionar la autenticación del usuario
session_start();

// Cabeceras para respuesta JSON y CORS (permitir peticiones desde el frontend)
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Incluir los modelos necesarios
require_once __DIR__ . '/../modelos/InicioSesion.php';
require_once __DIR__ . '/../modelos/Usuario.php';
require_once __DIR__ . '/../modelos/ActividadUsuario.php';

// Solo aceptar método POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['exito' => false, 'mensaje' => 'Método no permitido. Use POST.']);
    exit;
}

// Leer los datos enviados (soporta tanto JSON como form-data)
$datos = json_decode(file_get_contents('php://input'), true);

// Si no se recibió JSON, intentar con datos de formulario
if (!$datos) {
    $datos = $_POST;
}

// Validar que se enviaron los campos requeridos
$usuarioLogin = isset($datos['usuario_login']) ? trim($datos['usuario_login']) : '';
$contrasena   = isset($datos['contrasena'])    ? $datos['contrasena']           : '';

if (empty($usuarioLogin) || empty($contrasena)) {
    http_response_code(400);
    echo json_encode(['exito' => false, 'mensaje' => 'Debe ingresar usuario y contraseña.']);
    exit;
}

// Verificar las credenciales contra la base de datos
$credenciales = InicioSesion::verificarCredenciales($usuarioLogin, $contrasena);

if (!$credenciales) {
    http_response_code(401);
    echo json_encode(['exito' => false, 'mensaje' => 'Usuario o contraseña incorrectos.']);
    exit;
}

// Credenciales válidas: obtener datos completos del usuario
$idUsuario = $credenciales['id_usuario'];
$usuario   = Usuario::obtenerPorId($idUsuario);
$actividad = ActividadUsuario::obtenerPorIdUsuario($idUsuario);

// Actualizar el estado a "online" y registrar la fecha/hora del login
ActividadUsuario::actualizarEstado($idUsuario, 'online');
ActividadUsuario::actualizarUltimoLogin($idUsuario, date('d/m/Y H:i'));

// Guardar datos del usuario en la sesión PHP
$_SESSION['id_usuario']     = $idUsuario;
$_SESSION['usuario_login']  = $credenciales['usuario_login'];
$_SESSION['nombre_usuario'] = $usuario ? $usuario['nombre_usuario'] : $credenciales['usuario_login'];
$_SESSION['logueado']       = true;

// Retornar respuesta exitosa con los datos del perfil
http_response_code(200);
echo json_encode([
    'exito'   => true,
    'mensaje' => 'Inicio de sesión exitoso.',
    'usuario' => [
        'id_usuario'     => $idUsuario,
        'nombre_usuario' => $usuario ? $usuario['nombre_usuario'] : null,
        'avatar'         => $usuario ? $usuario['avatar'] : null,
        'fondo'          => $usuario ? $usuario['fondo'] : null,
        'estado'         => $actividad ? $actividad['estado'] : 'online',
        'edad_texto'     => $actividad ? $actividad['edad_texto'] : null,
        'ubicacion'      => $actividad ? $actividad['ubicacion'] : null,
        'ultimo_login'   => date('d/m/Y H:i')
    ]
]);
