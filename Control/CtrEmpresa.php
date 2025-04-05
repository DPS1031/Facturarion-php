<?php
require_once 'C:\Users\david\Development\Php\ProyectoFacturacion\Modelo\Empresa.php';
require_once 'C:\Users\david\Development\Php\Xampp\htdocs\ProyectoFacturacion\Config\conexion.php';

class CtrEmpresa {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function crearEmpresa($codigo, $nombre) {
        $sql = "INSERT INTO empresa (codigo, nombre) VALUES (?, ?)";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        return $stmt->execute([$codigo, $nombre]);
    }

    public function obtenerEmpresa($codigo) {
        $sql = "SELECT * FROM empresa WHERE codigo = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        $stmt->execute([$codigo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerEmpresas() {
        $sql = "SELECT * FROM empresa";
        $stmt = $this->conexion->getConexion()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarEmpresa($codigo, $nombre) {
        $sql = "UPDATE empresa SET nombre = ? WHERE codigo = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        return $stmt->execute([$nombre, $codigo]);
    }

    public function eliminarEmpresa($codigo) {
        $sql = "DELETE FROM empresa WHERE codigo = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        return $stmt->execute([$codigo]);
    }
}
?>
