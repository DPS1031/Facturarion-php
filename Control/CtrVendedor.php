<?php
require_once 'C:\Users\david\Development\Php\ProyectoFacturacion\Modelo\Vendedor.php';
require_once 'C:\Users\david\Development\Php\Xampp\htdocs\ProyectoFacturacion\Config\conexion.php';

class CtrVendedor {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function crearVendedor($email, $nombre, $telefono, $carne, $direccion) {
        $sql = "INSERT INTO vendedor (email, nombre, telefono, carne, direccion) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        return $stmt->execute([$email, $nombre, $telefono, $carne, $direccion]);
    }

    public function obtenerVendedor($codigo) {
        $sql = "SELECT * FROM vendedor WHERE codigo = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        $stmt->execute([$codigo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerVendedores() {
        $sql = "SELECT * FROM vendedor";
        $stmt = $this->conexion->getConexion()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarVendedor($codigo, $email, $nombre, $telefono, $carne, $direccion) {
        $sql = "UPDATE vendedor SET email = ?, nombre = ?, telefono = ?, carne = ?, direccion = ? WHERE codigo = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        return $stmt->execute([$email, $nombre, $telefono, $carne, $direccion, $codigo]);
    }

    public function eliminarVendedor($codigo) {
        $sql = "DELETE FROM vendedor WHERE codigo = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        return $stmt->execute([$codigo]);
    }
}
?>
