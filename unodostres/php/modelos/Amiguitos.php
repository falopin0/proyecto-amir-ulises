<?php
/**
 * MODELO: Amiguitos
 * Tabla: amiguitos (Base de datos: u283509122_cyp)
 * Campos: id_amiguito, id_usuario_propietario, id_usuario_amigo, fecha_agregado, estado_amistad
 *
 * Este modelo gestiona las relaciones de amistad entre usuarios de CP-ROS.
 * Permite consultar, agregar y administrar la lista de amigos de cada perfil.
 */

require_once __DIR__ . '/../config/database.php';

class Amiguitos {

    /**
     * Obtener la lista de amigos de un usuario por su ID.
     * Incluye los datos del usuario amigo mediante JOIN con la tabla usuario.
     * @param int $idUsuarioPropietario ID del usuario que posee la lista de amigos.
     * @return array Lista de amigos con sus datos de perfil.
     */
    public static function obtenerAmigosPorUsuario($idUsuarioPropietario) {
        $db = obtenerConexion();
        $stmt = $db->prepare(
            "SELECT a.id_amiguito, a.id_usuario_amigo, a.fecha_agregado, a.estado_amistad,
                    u.nombre_usuario, u.avatar
             FROM amiguitos a
             INNER JOIN usuario u ON a.id_usuario_amigo = u.id_usuario
             WHERE a.id_usuario_propietario = :id
             ORDER BY a.fecha_agregado DESC"
        );
        $stmt->execute([':id' => $idUsuarioPropietario]);
        return $stmt->fetchAll();
    }

    /**
     * Agregar un nuevo amigo a la lista de un usuario.
     * @param int $idPropietario ID del usuario que agrega al amigo.
     * @param int $idAmigo ID del usuario que será agregado como amigo.
     * @return bool True si se insertó correctamente.
     */
    public static function agregarAmigo($idPropietario, $idAmigo) {
        $db = obtenerConexion();
        $stmt = $db->prepare(
            "INSERT INTO amiguitos (id_usuario_propietario, id_usuario_amigo, fecha_agregado, estado_amistad)
             VALUES (:propietario, :amigo, NOW(), 'pendiente')"
        );
        return $stmt->execute([':propietario' => $idPropietario, ':amigo' => $idAmigo]);
    }

    /**
     * Actualizar el estado de una relación de amistad (ej: 'aceptado', 'rechazado', 'pendiente').
     * @param int $idAmiguito ID del registro de amistad.
     * @param string $estado Nuevo estado de la amistad.
     * @return bool True si se actualizó correctamente.
     */
    public static function actualizarEstado($idAmiguito, $estado) {
        $db = obtenerConexion();
        $stmt = $db->prepare("UPDATE amiguitos SET estado_amistad = :estado WHERE id_amiguito = :id");
        return $stmt->execute([':estado' => $estado, ':id' => $idAmiguito]);
    }

    /**
     * Eliminar una relación de amistad.
     * @param int $idAmiguito ID del registro de amistad a eliminar.
     * @return bool True si se eliminó correctamente.
     */
    public static function eliminarAmigo($idAmiguito) {
        $db = obtenerConexion();
        $stmt = $db->prepare("DELETE FROM amiguitos WHERE id_amiguito = :id");
        return $stmt->execute([':id' => $idAmiguito]);
    }

    /**
     * Verificar si dos usuarios ya son amigos.
     * @param int $idPropietario ID del usuario propietario.
     * @param int $idAmigo ID del usuario amigo.
     * @return array|false Datos de la amistad o false si no existe.
     */
    public static function verificarAmistad($idPropietario, $idAmigo) {
        $db = obtenerConexion();
        $stmt = $db->prepare(
            "SELECT id_amiguito, estado_amistad FROM amiguitos
             WHERE id_usuario_propietario = :propietario AND id_usuario_amigo = :amigo"
        );
        $stmt->execute([':propietario' => $idPropietario, ':amigo' => $idAmigo]);
        return $stmt->fetch();
    }
}
