<?php
require_once 'C:\Users\david\Development\Php\ProyectoFacturacion\Modelo\Factura.php';
require_once 'C:\Users\david\Development\Php\Xampp\htdocs\ProyectoFacturacion\Config\conexion.php';

class CtrFactura {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function crearFactura($fecha, $numero, $total, $clienteCodigo) {
        $sql = "INSERT INTO factura (fecha, numero, total, cliente_codigo) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        return $stmt->execute([$fecha, $numero, $total, $clienteCodigo]);
    }

    public function obtenerFactura($numero) {
        $sql = "SELECT * FROM factura WHERE numero = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        $stmt->execute([$numero]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerFacturas() {
        $sql = "SELECT * FROM factura";
        $stmt = $this->conexion->getConexion()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarFactura($numero, $fecha, $total) {
        $sql = "UPDATE factura SET fecha = ?, total = ? WHERE numero = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        return $stmt->execute([$fecha, $total, $numero]);
    }

    public function eliminarFactura($numero) {
        $sql = "DELETE FROM factura WHERE numero = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        return $stmt->execute([$numero]);
    }
}
?>
