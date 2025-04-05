<?php
require_once 'C:\Users\david\Development\Php\ProyectoFacturacion\Modelo\Cliente.php';
require_once 'C:\Users\david\Development\Php\Xampp\htdocs\ProyectoFacturacion\Config\conexion.php';

class CtrCliente {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function crearCliente($email, $nombre, $telefono, $credito, $codigoEmpresa) {
        $sql = "INSERT INTO cliente (email, nombre, telefono, credito, codigo_empresa) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        return $stmt->execute([$email, $nombre, $telefono, $credito, $codigoEmpresa]);
    }

    public function obtenerCliente($codigo) {
        $sql = "SELECT * FROM cliente WHERE codigo = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        $stmt->execute([$codigo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerClientes() {
        $sql = "SELECT * FROM cliente";
        $stmt = $this->conexion->getConexion()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarCliente($codigo, $email, $nombre, $telefono, $credito, $codigoEmpresa) {
        $sql = "UPDATE cliente SET email = ?, nombre = ?, telefono = ?, credito = ?, codigo_empresa = ? WHERE codigo = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        return $stmt->execute([$email, $nombre, $telefono, $credito, $codigoEmpresa, $codigo]);
    }

    public function eliminarCliente($codigo) {
        $sql = "DELETE FROM cliente WHERE codigo = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        return $stmt->execute([$codigo]);
    }
}
?>
