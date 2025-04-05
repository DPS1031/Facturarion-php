<?php

class Conexion {
    private static $conexion = null;

    private function __construct() {
        try {
            self::$conexion = new PDO("mysql:host=localhost;dbname=facturacion_db;charset=utf8", "root", "");
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public static function getConexion() {
        if (self::$conexion === null) {
            new self();
        }
        return self::$conexion;
    }
}

?>
