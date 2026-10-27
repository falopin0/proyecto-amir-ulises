<?php
/**
 * ENDPOINT API: Perfil de Usuario
 * Ruta: php/api/perfil.php
 * Método: GET
 *
 * Retorna los datos completos del perfil de un usuario: información de la tabla usuario,
 * actividad (estado, edad, ubicación, último login) y datos de registro.
 * Parámetro GET: ?id=<id_usuario> o ?nombre=<nombre_usuario>
 */

session_start();

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

require_once __DIR__ . '/../modelos/Usuario.php';
require_once __DIR__ . '/../modelos/ActividadUsuario.php';
require_once __DIR__ . '/../modelos/Registro.php';

// Solo aceptar método GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['exito' => false, 'mensaje' => 'Método no permitido. Use GET.']);
    exit;
}

// Determinar cómo buscar al usuario: por ID o por nombre
$idUsuario     = isset($_GET['id'])     ? intval($_GET['id'])        : null;
$nombreUsuario = isset($_GET['nombre']) ? trim($_GET['nombre'])      : null;

if (!$idUsuario && !$nombreUsuario) {
    http_response_code(400);
    echo json_encode(['exito' => false, 'mensaje' => 'Debe enviar el parámetro "id" o "nombre" del usuario.']);
    exit;
}

// Buscar el usuario en la base de datos
if ($idUsuario) {
    $usuario = Usuario::obtenerPorId($idUsuario);
} else {
    $usuario = Usuario::obtenerPorNombre($nombreUsuario);
}

if (!$usuario) {
    http_response_code(404);
    echo json_encode(['exito' => false, 'mensaje' => 'Usuario no encontrado.']);
    exit;
}

// Obtener datos complementarios (actividad y registro)
$actividad = ActividadUsuario::obtenerPorIdUsuario($usuario['id_usuario']);
$registro  = Registro::obtenerPorIdUsuario($usuario['id_usuario']);

// Retornar el perfil completo en formato JSON
http_response_code(200);
echo json_encode([
    'exito'   => true,
    'perfil'  => [
        'id_usuario'     => $usuario['id_usuario'],
        'nombre_usuario' => $usuario['nombre_usuario'],
        'avatar'         => $usuario['avatar'],
        'fondo'          => $usuario['fondo'],
        'estado'         => $actividad ? $actividad['estado']      : null,
        'edad_texto'     => $actividad ? $actividad['edad_texto']  : null,
        'ubicacion'      => $actividad ? $actividad['ubicacion']   : null,
        'ultimo_login'   => $actividad ? $actividad['ultimo_login']: null,
        'correo'         => $registro  ? $registro['correo_electronico'] : null,
        'fecha_registro' => $registro  ? $registro['fecha_registro']     : null,
        'estado_cuenta'  => $registro  ? $registro['estado_cuenta']      : null
    ]
]);
