<?php
/**
 * MODELO: InicioSesion
 * Tabla: inicio_sesion (Base de datos: u283509122_cyp)
 * Campos: id_inicio_sesion, id_usuario, usuario_login, contrasena_hex
 *
 * Este modelo gestiona las credenciales de acceso de los usuarios.
 * La contraseña se almacena en formato hexadecimal (contrasena_hex).
 */

require_once __DIR__ . '/../config/database.php';

class InicioSesion {

    /**
     * Buscar credenciales por nombre de usuario de login.
     * @param string $usuarioLogin Nombre de usuario para el login.
     * @return array|false Datos de credenciales o false si no existe.
     */
    public static function obtenerPorUsuarioLogin($usuarioLogin) {
        $db = obtenerConexion();
        $stmt = $db->prepare("SELECT id_inicio_sesion, id_usuario, usuario_login, contrasena_hex FROM inicio_sesion WHERE usuario_login = :usuario");
        $stmt->execute([':usuario' => $usuarioLogin]);
        return $stmt->fetch();
    }

    /**
     * Verificar las credenciales de un usuario comparando la contraseña en hexadecimal.
     * @param string $usuarioLogin Nombre de usuario ingresado en el formulario.
     * @param string $contrasena Contraseña ingresada en texto plano (se convierte a hex para comparar).
     * @return array|false Datos del usuario si las credenciales son válidas, false en caso contrario.
     */
    public static function verificarCredenciales($usuarioLogin, $contrasena) {
        $credenciales = self::obtenerPorUsuarioLogin($usuarioLogin);

        if (!$credenciales) {
            return false;
        }

        // Convertir la contraseña ingresada a hexadecimal para comparar con contrasena_hex
        $contrasenaHex = bin2hex($contrasena);

        if ($credenciales['contrasena_hex'] === $contrasenaHex) {
            return $credenciales;
        }

        return false;
    }

    /**
     * Obtener credenciales por ID de usuario.
     * @param int $idUsuario ID del usuario.
     * @return array|false Datos de credenciales o false.
     */
    public static function obtenerPorIdUsuario($idUsuario) {
        $db = obtenerConexion();
        $stmt = $db->prepare("SELECT id_inicio_sesion, id_usuario, usuario_login, contrasena_hex FROM inicio_sesion WHERE id_usuario = :id");
        $stmt->execute([':id' => $idUsuario]);
        return $stmt->fetch();
    }
}
