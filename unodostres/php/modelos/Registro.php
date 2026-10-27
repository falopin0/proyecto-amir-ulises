<?php
/**
 * MODELO: Registro
 * Tabla: registro (Base de datos: u283509122_cyp)
 * Campos: id_registro, id_usuario, correo_electronico, fecha_registro, estado_cuenta
 *
 * Este modelo gestiona los datos de registro de cuentas de usuario en CP-ROS.
 * Almacena el correo electrónico, la fecha de alta y el estado de la cuenta.
 */

require_once __DIR__ . '/../config/database.php';

class Registro {

    /**
     * Obtener los datos de registro de un usuario por su ID.
     * @param int $idUsuario ID del usuario.
     * @return array|false Datos de registro o false si no existe.
     */
    public static function obtenerPorIdUsuario($idUsuario) {
        $db = obtenerConexion();
        $stmt = $db->prepare("SELECT id_registro, id_usuario, correo_electronico, fecha_registro, estado_cuenta FROM registro WHERE id_usuario = :id");
        $stmt->execute([':id' => $idUsuario]);
        return $stmt->fetch();
    }

    /**
     * Buscar un registro por correo electrónico (útil para verificar duplicados).
     * @param string $correo Correo electrónico a buscar.
     * @return array|false Datos de registro o false si no existe.
     */
    public static function obtenerPorCorreo($correo) {
        $db = obtenerConexion();
        $stmt = $db->prepare("SELECT id_registro, id_usuario, correo_electronico, fecha_registro, estado_cuenta FROM registro WHERE correo_electronico = :correo");
        $stmt->execute([':correo' => $correo]);
        return $stmt->fetch();
    }

    /**
     * Crear un nuevo registro de cuenta.
     * @param int $idUsuario ID del usuario asociado.
     * @param string $correo Correo electrónico del usuario.
     * @return bool True si se insertó correctamente.
     */
    public static function crearRegistro($idUsuario, $correo) {
        $db = obtenerConexion();
        $stmt = $db->prepare(
            "INSERT INTO registro (id_usuario, correo_electronico, fecha_registro, estado_cuenta)
             VALUES (:id, :correo, NOW(), 'activa')"
        );
        return $stmt->execute([':id' => $idUsuario, ':correo' => $correo]);
    }

    /**
     * Actualizar el estado de una cuenta (ej: 'activa', 'suspendida', 'eliminada').
     * @param int $idUsuario ID del usuario.
     * @param string $estado Nuevo estado de la cuenta.
     * @return bool True si se actualizó correctamente.
     */
    public static function actualizarEstadoCuenta($idUsuario, $estado) {
        $db = obtenerConexion();
        $stmt = $db->prepare("UPDATE registro SET estado_cuenta = :estado WHERE id_usuario = :id");
        return $stmt->execute([':estado' => $estado, ':id' => $idUsuario]);
    }

    /**
     * Listar todos los registros (para panel de administración).
     * @return array Lista de todos los registros.
     */
    public static function listarTodos() {
        $db = obtenerConexion();
        $stmt = $db->query("SELECT id_registro, id_usuario, correo_electronico, fecha_registro, estado_cuenta FROM registro ORDER BY fecha_registro DESC");
        return $stmt->fetchAll();
    }
}
