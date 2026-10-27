<?php
/**
 * ENDPOINT API: Amiguitos (Lista de Amigos)
 * Ruta: php/api/amigos.php
 * Métodos: GET, POST, PUT, DELETE
 *
 * GET    ?id_usuario=<id> → Obtener lista de amigos de un usuario.
 * POST   {id_propietario, id_amigo} → Enviar solicitud de amistad.
 * PUT    {id_amiguito, estado_amistad} → Aceptar/rechazar solicitud.
 * DELETE {id_amiguito} → Eliminar una amistad.
 */

session_start();

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

require_once __DIR__ . '/../modelos/Amiguitos.php';

$metodo = $_SERVER['REQUEST_METHOD'];

// ============================================================================
// GET — Obtener lista de amigos de un usuario
// ============================================================================
if ($metodo === 'GET') {
    $idUsuario = isset($_GET['id_usuario']) ? intval($_GET['id_usuario']) : null;

    if (!$idUsuario) {
        http_response_code(400);
        echo json_encode(['exito' => false, 'mensaje' => 'Debe enviar el parámetro "id_usuario".']);
        exit;
    }

    $amigos = Amiguitos::obtenerAmigosPorUsuario($idUsuario);

    http_response_code(200);
    echo json_encode([
        'exito'   => true,
        'amigos'  => $amigos,
        'total'   => count($amigos)
    ]);
    exit;
}

// ============================================================================
// POST — Enviar solicitud de amistad
// ============================================================================
if ($metodo === 'POST') {
    $datos = json_decode(file_get_contents('php://input'), true);
    if (!$datos) $datos = $_POST;

    $idPropietario = isset($datos['id_propietario']) ? intval($datos['id_propietario']) : 0;
    $idAmigo       = isset($datos['id_amigo'])       ? intval($datos['id_amigo'])       : 0;

    if (!$idPropietario || !$idAmigo) {
        http_response_code(400);
        echo json_encode(['exito' => false, 'mensaje' => 'Debe enviar "id_propietario" e "id_amigo".']);
        exit;
    }

    // Verificar si ya existe la relación
    $existente = Amiguitos::verificarAmistad($idPropietario, $idAmigo);
    if ($existente) {
        http_response_code(409);
        echo json_encode(['exito' => false, 'mensaje' => 'Ya existe una relación de amistad entre estos usuarios.', 'estado' => $existente['estado_amistad']]);
        exit;
    }

    $resultado = Amiguitos::agregarAmigo($idPropietario, $idAmigo);

    if ($resultado) {
        http_response_code(201);
        echo json_encode(['exito' => true, 'mensaje' => 'Solicitud de amistad enviada correctamente.']);
    } else {
        http_response_code(500);
        echo json_encode(['exito' => false, 'mensaje' => 'Error al enviar la solicitud de amistad.']);
    }
    exit;
}

// ============================================================================
// PUT — Actualizar estado de amistad (aceptar/rechazar)
// ============================================================================
if ($metodo === 'PUT') {
    $datos = json_decode(file_get_contents('php://input'), true);

    $idAmiguito = isset($datos['id_amiguito'])     ? intval($datos['id_amiguito'])  : 0;
    $estado     = isset($datos['estado_amistad'])   ? trim($datos['estado_amistad']): '';

    if (!$idAmiguito || empty($estado)) {
        http_response_code(400);
        echo json_encode(['exito' => false, 'mensaje' => 'Debe enviar "id_amiguito" y "estado_amistad".']);
        exit;
    }

    $resultado = Amiguitos::actualizarEstado($idAmiguito, $estado);

    if ($resultado) {
        http_response_code(200);
        echo json_encode(['exito' => true, 'mensaje' => 'Estado de amistad actualizado a: ' . $estado]);
    } else {
        http_response_code(500);
        echo json_encode(['exito' => false, 'mensaje' => 'Error al actualizar el estado de amistad.']);
    }
    exit;
}

// ============================================================================
// DELETE — Eliminar una relación de amistad
// ============================================================================
if ($metodo === 'DELETE') {
    $datos = json_decode(file_get_contents('php://input'), true);

    $idAmiguito = isset($datos['id_amiguito']) ? intval($datos['id_amiguito']) : 0;

    if (!$idAmiguito) {
        http_response_code(400);
        echo json_encode(['exito' => false, 'mensaje' => 'Debe enviar "id_amiguito".']);
        exit;
    }

    $resultado = Amiguitos::eliminarAmigo($idAmiguito);

    if ($resultado) {
        http_response_code(200);
        echo json_encode(['exito' => true, 'mensaje' => 'Amistad eliminada correctamente.']);
    } else {
        http_response_code(500);
        echo json_encode(['exito' => false, 'mensaje' => 'Error al eliminar la amistad.']);
    }
    exit;
}

// Método no soportado
http_response_code(405);
echo json_encode(['exito' => false, 'mensaje' => 'Método no permitido.']);
