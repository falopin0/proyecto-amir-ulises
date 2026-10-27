<?php
/**
 * ENDPOINT API: Logout (Cerrar Sesión)
 * Ruta: php/api/logout.php
 * Método: POST
 *
 * Cierra la sesión activa del usuario, actualiza su estado a "offline" en la BD
 * y destruye la sesión PHP. Retorna JSON con el resultado.
 */

session_start();

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require_once __DIR__ . '/../modelos/ActividadUsuario.php';

// Si hay una sesión activa, actualizar el estado del usuario a offline
if (isset($_SESSION['id_usuario'])) {
    ActividadUsuario::actualizarEstado($_SESSION['id_usuario'], 'offline');
}

// Destruir la sesión PHP completamente
$_SESSION = [];

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

http_response_code(200);
echo json_encode(['exito' => true, 'mensaje' => 'Sesión cerrada correctamente.']);
