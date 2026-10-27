<?php
/**
 * ENDPOINT API: Verificar Sesión Activa
 * Ruta: php/api/sesion.php
 * Método: GET
 *
 * Verifica si el usuario tiene una sesión PHP activa y válida.
 * Retorna los datos del usuario logueado o un mensaje indicando que no hay sesión.
 * Útil para que el frontend verifique el estado de autenticación al cargar cada página.
 */

session_start();

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

// Verificar si existe una sesión activa con usuario logueado
if (isset($_SESSION['logueado']) && $_SESSION['logueado'] === true && isset($_SESSION['id_usuario'])) {

    require_once __DIR__ . '/../modelos/Usuario.php';
    require_once __DIR__ . '/../modelos/ActividadUsuario.php';

    $usuario   = Usuario::obtenerPorId($_SESSION['id_usuario']);
    $actividad = ActividadUsuario::obtenerPorIdUsuario($_SESSION['id_usuario']);

    http_response_code(200);
    echo json_encode([
        'exito'     => true,
        'logueado'  => true,
        'usuario'   => [
            'id_usuario'     => $_SESSION['id_usuario'],
            'usuario_login'  => $_SESSION['usuario_login'],
            'nombre_usuario' => $_SESSION['nombre_usuario'],
            'avatar'         => $usuario ? $usuario['avatar'] : null,
            'fondo'          => $usuario ? $usuario['fondo']  : null,
            'estado'         => $actividad ? $actividad['estado']      : null,
            'edad_texto'     => $actividad ? $actividad['edad_texto']  : null,
            'ubicacion'      => $actividad ? $actividad['ubicacion']   : null,
            'ultimo_login'   => $actividad ? $actividad['ultimo_login']: null
        ]
    ]);
} else {
    http_response_code(200);
    echo json_encode([
        'exito'    => true,
        'logueado' => false,
        'mensaje'  => 'No hay sesión activa. El usuario debe iniciar sesión.'
    ]);
}
