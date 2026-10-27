<?php
/**
 * MODELO: Usuario
 * Tabla: usuario (Base de datos: u283509122_cyp)
 * Campos: id_usuario, nombre_usuario, avatar, fondo
 *
 * Este modelo encapsula todas las operaciones CRUD relacionadas con la tabla `usuario`.
 * Contiene los datos de perfil público de cada usuario de la red social CP-ROS.
 */

require_once __DIR__ . '/../config/database.php';

class Usuario {

    /**
     * Obtener un usuario por su ID.
     * @param int $idUsuario ID del usuario a buscar.
     * @return array|false Datos del usuario o false si no existe.
     */
    public static function obtenerPorId($idUsuario) {
        $db = obtenerConexion();
        $stmt = $db->prepare("SELECT id_usuario, nombre_usuario, avatar, fondo FROM usuario WHERE id_usuario = :id");
        $stmt->execute([':id' => $idUsuario]);
        return $stmt->fetch();
    }

    /**
     * Obtener un usuario por su nombre de usuario.
     * @param string $nombreUsuario Nombre de usuario a buscar.
     * @return array|false Datos del usuario o false si no existe.
     */
    public static function obtenerPorNombre($nombreUsuario) {
        $db = obtenerConexion();
        $stmt = $db->prepare("SELECT id_usuario, nombre_usuario, avatar, fondo FROM usuario WHERE nombre_usuario = :nombre");
        $stmt->execute([':nombre' => $nombreUsuario]);
        return $stmt->fetch();
    }

    /**
     * Listar todos los usuarios registrados.
     * @return array Lista de usuarios.
     */
    public static function listarTodos() {
        $db = obtenerConexion();
        $stmt = $db->query("SELECT id_usuario, nombre_usuario, avatar, fondo FROM usuario ORDER BY nombre_usuario ASC");
        return $stmt->fetchAll();
    }

    /**
     * Actualizar el avatar de un usuario.
     * @param int $idUsuario ID del usuario.
     * @param string $avatar Ruta o URL del nuevo avatar.
     * @return bool True si se actualizó correctamente.
     */
    public static function actualizarAvatar($idUsuario, $avatar) {
        $db = obtenerConexion();
        $stmt = $db->prepare("UPDATE usuario SET avatar = :avatar WHERE id_usuario = :id");
        return $stmt->execute([':avatar' => $avatar, ':id' => $idUsuario]);
    }

    /**
     * Actualizar el fondo de perfil de un usuario.
     * @param int $idUsuario ID del usuario.
     * @param string $fondo Ruta o URL del nuevo fondo.
     * @return bool True si se actualizó correctamente.
     */
    public static function actualizarFondo($idUsuario, $fondo) {
        $db = obtenerConexion();
        $stmt = $db->prepare("UPDATE usuario SET fondo = :fondo WHERE id_usuario = :id");
        return $stmt->execute([':fondo' => $fondo, ':id' => $idUsuario]);
    }
}
