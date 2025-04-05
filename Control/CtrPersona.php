<?php
require_once '../Config/conexion.php';
require_once '../Modelo/persona.php';

class CtrPersona {
    
    public static function insertar($email, $nombre, $telefono) {
        $conexion = Conexion::getConexion();
        $sql = "INSERT INTO personas (email, nombre, telefono) VALUES (:email, :nombre, :telefono)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':telefono', $telefono);
        return $stmt->execute();
    }

    public static function obtenerTodas() {
        $conexion = Conexion::getConexion();
        $sql = "SELECT * FROM personas";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function actualizar($codigo, $email, $nombre, $telefono) {
        $conexion = Conexion::getConexion();
        $sql = "UPDATE personas SET email = :email, nombre = :nombre, telefono = :telefono WHERE codigo = :codigo";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':telefono', $telefono);
        return $stmt->execute();
    }

    public static function eliminar($codigo) {
        $conexion = Conexion::getConexion();
        $sql = "DELETE FROM personas WHERE codigo = :codigo";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        return $stmt->execute();
    }
}

?>
