<?php
require_once 'C:\Users\david\Development\Php\ProyectoFacturacion\Modelo\ProductosPorFactura.php';
require_once 'C:\Users\david\Development\Php\Xampp\htdocs\ProyectoFacturacion\Config\conexion.php';

class CtrProductosPorFactura {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function agregarProductoAFactura($numeroFactura, $codigoProducto, $cantidad) {
        $sql = "SELECT valor_unitario FROM producto WHERE codigo = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        $stmt->execute([$codigoProducto]);
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($producto) {
            $subtotal = $cantidad * $producto['valor_unitario'];

            $sqlInsert = "INSERT INTO productos_por_factura (numero_factura, codigo_producto, cantidad, subtotal) 
                          VALUES (?, ?, ?, ?)";
            $stmtInsert = $this->conexion->getConexion()->prepare($sqlInsert);
            return $stmtInsert->execute([$numeroFactura, $codigoProducto, $cantidad, $subtotal]);
        }
        return false;
    }

    public function obtenerProductosPorFactura($numeroFactura) {
        $sql = "SELECT p.codigo, p.nombre, pf.cantidad, pf.subtotal 
                FROM productos_por_factura pf
                JOIN producto p ON pf.codigo_producto = p.codigo
                WHERE pf.numero_factura = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        $stmt->execute([$numeroFactura]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarCantidadProducto($numeroFactura, $codigoProducto, $nuevaCantidad) {
        $sql = "SELECT valor_unitario FROM producto WHERE codigo = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        $stmt->execute([$codigoProducto]);
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($producto) {
            $subtotal = $nuevaCantidad * $producto['valor_unitario']; // Recalcular subtotal

            $sqlUpdate = "UPDATE productos_por_factura SET cantidad = ?, subtotal = ? 
                          WHERE numero_factura = ? AND codigo_producto = ?";
            $stmtUpdate = $this->conexion->getConexion()->prepare($sqlUpdate);
            return $stmtUpdate->execute([$nuevaCantidad, $subtotal, $numeroFactura, $codigoProducto]);
        }
        return false;
    }

    public function eliminarProductoDeFactura($numeroFactura, $codigoProducto) {
        $sql = "DELETE FROM productos_por_factura WHERE numero_factura = ? AND codigo_producto = ?";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        return $stmt->execute([$numeroFactura, $codigoProducto]);
    }
}
?>
