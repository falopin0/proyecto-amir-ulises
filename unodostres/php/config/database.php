<?php
/**
 * ARCHIVO DE CONFIGURACIÓN Y CONEXIÓN A LA BASE DE DATOS
 * Red Social "CP-ROS" — Sopapa & Viridio
 *
 * Este archivo centraliza la conexión PDO a la base de datos MySQL alojada en Hostinger.
 * Se utiliza PDO (PHP Data Objects) para garantizar seguridad mediante prepared statements
 * y prevenir inyecciones SQL.
 *
 * Base de datos: u283509122_cyp
 * Tablas: usuario, inicio_sesion, actividad_usuario, amiguitos, registro
 */

// ============================================================================
// CONSTANTES DE CONEXIÓN A LA BASE DE DATOS
// Estos valores corresponden al hosting en Hostinger para el proyecto CP-ROS.
// ============================================================================
define('DB_HOST', 'localhost');              // Host del servidor MySQL (localhost en Hostinger)
define('DB_NAME', 'u283509122_cyp');         // Nombre de la base de datos
define('DB_USER', 'u283509122_pino_carrillo');         // Usuario de la base de datos
define('DB_PASS', 'Pinocarrillo2026');                       // Contraseña — COMPLETAR con la clave real del hosting
define('DB_CHARSET', 'utf8mb4');             // Juego de caracteres para soporte completo de emojis y tildes

/**
 * Función que crea y retorna una instancia de conexión PDO a la base de datos.
 * Configura el modo de errores como excepciones para facilitar la depuración,
 * y establece el modo de fetch por defecto como arreglo asociativo.
 *
 * @return PDO Instancia de conexión activa a la base de datos.
 * @throws PDOException Si la conexión falla (credenciales incorrectas, servidor caído, etc.)
 */
function obtenerConexion() {
    try {
        // DSN (Data Source Name) con host, nombre de BD y charset
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

        // Opciones de configuración de PDO
        $opciones = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,   // Lanza excepciones en caso de error SQL
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,         // Resultados como arreglos asociativos
            PDO::ATTR_EMULATE_PREPARES   => false,                    // Prepared statements nativos (más seguros)
        ];

        // Crear y retornar la conexión PDO
        $conexion = new PDO($dsn, DB_USER, DB_PASS, $opciones);
        return $conexion;

    } catch (PDOException $e) {
        // En producción, registrar el error en un log en lugar de mostrarlo al usuario
        error_log("Error de conexión a la BD: " . $e->getMessage());
        http_response_code(500);
        echo json_encode([
            'exito'   => false,
            'mensaje' => 'Error interno del servidor. No se pudo conectar a la base de datos.'
        ]);
        exit;
    }
}
