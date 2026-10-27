<?php
/**
 * ENDPOINT API: Registro de Usuario Nuevo
 * Ruta: php/api/registro.php
 * Método: POST
 *
 * Recibe los datos de un nuevo usuario (nombre_usuario, usuario_login, contrasena, correo)
 * vía POST en formato JSON. Crea los registros correspondientes en las tablas:
 * - usuario (perfil público)
 * - inicio_sesion (credenciales de acceso)
 * - actividad_usuario (datos biográficos iniciales)
 * - registro (datos de registro y estado de cuenta)
 *
 * Retorna JSON con el resultado de la operación.
 */

session_start();

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Responder a preflight CORS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Solo aceptar método POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['exito' => false, 'mensaje' => 'Método no permitido. Use POST.']);
    exit;
}

// Incluir modelos necesarios
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../modelos/Usuario.php';
require_once __DIR__ . '/../modelos/InicioSesion.php';
require_once __DIR__ . '/../modelos/ActividadUsuario.php';
require_once __DIR__ . '/../modelos/Registro.php';

// Leer y decodificar el cuerpo JSON de la petición
$entrada = json_decode(file_get_contents('php://input'), true);

// Validar que se recibieron todos los campos requeridos
if (
    empty($entrada['nombre_usuario']) ||
    empty($entrada['usuario_login']) ||
    empty($entrada['contrasena']) ||
    empty($entrada['correo'])
) {
    http_response_code(400);
    echo json_encode([
        'exito'   => false,
        'mensaje' => 'Todos los campos son obligatorios: nombre_usuario, usuario_login, contrasena y correo.'
    ]);
    exit;
}

$nombreUsuario = trim($entrada['nombre_usuario']);
$usuarioLogin  = trim($entrada['usuario_login']);
$contrasena    = $entrada['contrasena'];
$correo        = trim($entrada['correo']);

// Validaciones de formato
if (strlen($nombreUsuario) < 3 || strlen($nombreUsuario) > 50) {
    http_response_code(400);
    echo json_encode(['exito' => false, 'mensaje' => 'El nombre de usuario debe tener entre 3 y 50 caracteres.']);
    exit;
}

if (strlen($usuarioLogin) < 3 || strlen($usuarioLogin) > 50) {
    http_response_code(400);
    echo json_encode(['exito' => false, 'mensaje' => 'El usuario de login debe tener entre 3 y 50 caracteres.']);
    exit;
}

if (strlen($contrasena) < 4) {
    http_response_code(400);
    echo json_encode(['exito' => false, 'mensaje' => 'La contraseña debe tener al menos 4 caracteres.']);
    exit;
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['exito' => false, 'mensaje' => 'El correo electrónico no tiene un formato válido.']);
    exit;
}

try {
    $db = obtenerConexion();

    // Verificar si el usuario_login ya existe en inicio_sesion
    $existeLogin = InicioSesion::obtenerPorUsuarioLogin($usuarioLogin);
    if ($existeLogin) {
        http_response_code(409);
        echo json_encode(['exito' => false, 'mensaje' => 'El nombre de usuario de login ya está en uso. Elija otro.']);
        exit;
    }

    // Verificar si el correo ya está registrado
    $existeCorreo = Registro::obtenerPorCorreo($correo);
    if ($existeCorreo) {
        http_response_code(409);
        echo json_encode(['exito' => false, 'mensaje' => 'El correo electrónico ya está registrado.']);
        exit;
    }

    // Verificar si el nombre_usuario ya existe en la tabla usuario
    $existeNombre = Usuario::obtenerPorNombre($nombreUsuario);
    if ($existeNombre) {
        http_response_code(409);
        echo json_encode(['exito' => false, 'mensaje' => 'El nombre de usuario ya está en uso.']);
        exit;
    }

    // =========================================================================
    // INSERTAR EL NUEVO USUARIO EN TODAS LAS TABLAS NECESARIAS
    // Se usa una transacción para garantizar que todo se inserte o nada.
    // =========================================================================
    $db->beginTransaction();

    // 1. Insertar en tabla `usuario` (perfil público)
    $stmtUsuario = $db->prepare(
        "INSERT INTO usuario (nombre_usuario, avatar, fondo) VALUES (:nombre, :avatar, :fondo)"
    );
    $stmtUsuario->execute([
        ':nombre' => $nombreUsuario,
        ':avatar' => 'img/images.jpg',    // Avatar por defecto
        ':fondo'  => ''                    // Sin fondo personalizado al inicio
    ]);
    $idUsuarioNuevo = $db->lastInsertId();

    // 2. Insertar en tabla `inicio_sesion` (credenciales de acceso)
    $contrasenaHex = bin2hex($contrasena);
    $stmtLogin = $db->prepare(
        "INSERT INTO inicio_sesion (id_usuario, usuario_login, contrasena_hex) VALUES (:id, :login, :pass)"
    );
    $stmtLogin->execute([
        ':id'    => $idUsuarioNuevo,
        ':login' => $usuarioLogin,
        ':pass'  => $contrasenaHex
    ]);

    // 3. Insertar en tabla `actividad_usuario` (datos biográficos iniciales)
    $stmtActividad = $db->prepare(
        "INSERT INTO actividad_usuario (id_usuario, estado, edad_texto, ubicacion, ultimo_login)
         VALUES (:id, 'offline', 'Sin especificar', 'Sin especificar', NOW())"
    );
    $stmtActividad->execute([':id' => $idUsuarioNuevo]);

    // 4. Insertar en tabla `registro` (datos de registro de cuenta)
    $stmtRegistro = $db->prepare(
        "INSERT INTO registro (id_usuario, correo_electronico, fecha_registro, estado_cuenta)
         VALUES (:id, :correo, NOW(), 'activa')"
    );
    $stmtRegistro->execute([
        ':id'     => $idUsuarioNuevo,
        ':correo' => $correo
    ]);

    // Confirmar la transacción — todo se insertó correctamente
    $db->commit();

    // Respuesta exitosa con los datos del nuevo usuario
    http_response_code(201);
    echo json_encode([
        'exito'   => true,
        'mensaje' => '¡Cuenta creada exitosamente! Ya puedes iniciar sesión.',
        'datos'   => [
            'id_usuario'     => (int)$idUsuarioNuevo,
            'nombre_usuario' => $nombreUsuario,
            'usuario_login'  => $usuarioLogin,
            'correo'         => $correo
        ]
    ]);

} catch (Exception $e) {
    // Si algo falla, revertir toda la transacción
    if (isset($db) && $db->inTransaction()) {
        $db->rollBack();
    }
    error_log("Error en registro de usuario: " . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'exito'   => false,
        'mensaje' => 'Error interno del servidor al registrar la cuenta. Intente más tarde.'
    ]);
}
