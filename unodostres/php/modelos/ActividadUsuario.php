<?php
/**
 * MODELO: ActividadUsuario
 * Tabla: actividad_usuario (Base de datos: u283509122_cyp)
 * Campos: id_actividad, id_usuario, estado, edad_texto, ubicacion, ultimo_login
 *
 * Este modelo gestiona la información de actividad y datos biográficos
 * que se muestran en el perfil de cada usuario de CP-ROS.
 */

require_once __DIR__ . '/../config/database.php';

class ActividadUsuario {

    /**
     * Obtener la actividad/datos biográficos de un usuario por su ID.
     * @param int $idUsuario ID del usuario.
     * @return array|false Datos de actividad o false si no existe.
     */
    public static function obtenerPorIdUsuario($idUsuario) {
        $db = obtenerConexion();
        $stmt = $db->prepare("SELECT id_actividad, id_usuario, estado, edad_texto, ubicacion, ultimo_login FROM actividad_usuario WHERE id_usuario = :id");
        $stmt->execute([':id' => $idUsuario]);
        return $stmt->fetch();
    }

    /**
     * Actualizar el estado de conexión de un usuario (ej: 'online', 'offline').
     * @param int $idUsuario ID del usuario.
     * @param string $estado Nuevo estado ('online', 'offline', etc.).
     * @return bool True si se actualizó correctamente.
     */
    public static function actualizarEstado($idUsuario, $estado) {
        $db = obtenerConexion();
        $stmt = $db->prepare("UPDATE actividad_usuario SET estado = :estado WHERE id_usuario = :id");
        return $stmt->execute([':estado' => $estado, ':id' => $idUsuario]);
    }

    /**
     * Actualizar la fecha/texto de último login.
     * @param int $idUsuario ID del usuario.
     * @param string $ultimoLogin Texto o fecha del último login.
     * @return bool True si se actualizó correctamente.
     */
    public static function actualizarUltimoLogin($idUsuario, $ultimoLogin) {
        $db = obtenerConexion();
        $stmt = $db->prepare("UPDATE actividad_usuario SET ultimo_login = :ultimo WHERE id_usuario = :id");
        return $stmt->execute([':ultimo' => $ultimoLogin, ':id' => $idUsuario]);
    }

    /**
     * Obtener todos los usuarios con su estado de actividad (útil para la lista de amigos).
     * @return array Lista de actividades de todos los usuarios.
     */
    public static function listarTodos() {
        $db = obtenerConexion();
        $stmt = $db->query("SELECT id_actividad, id_usuario, estado, edad_texto, ubicacion, ultimo_login FROM actividad_usuario ORDER BY id_usuario ASC");
        return $stmt->fetchAll();
    }
}
