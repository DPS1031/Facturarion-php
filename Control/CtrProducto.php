<?php
require_once '../Config/Conexion.php';
require_once '../Modelo/Producto.php';

class CtrProducto {
    public static function insertar($codigo, $nombre, $stock, $valor_unitario) {
        try {
            $pdo = Conexion::getConexion();
            $stmt = $pdo->prepare("INSERT INTO productos (nombre, stock, valor_unitario) VALUES (?, ?, ?)");
            $stmt->execute([$nombre, $stock, ($valor_unitario !== '' ? $valor_unitario : 0)]);
        } catch (PDOException $e) {
            die("Error al insertar producto: " . $e->getMessage());
        }
    }
    

    public static function actualizar($codigo, $nombre, $stock, $valor_unitario) {
        try {
            $pdo = Conexion::getConexion();
            $stmt = $pdo->prepare("UPDATE productos SET nombre=?, stock=?, valor_unitario=? WHERE codigo=?");
            $stmt->execute([$codigo, $nombre, $stock, $valor_unitario]);
        } catch (PDOException $e) {
            die("Error al actualizar producto: " . $e->getMessage());
        }
    }

    public static function eliminar($codigo) {
        try {
            $pdo = Conexion::getConexion();
            $stmt = $pdo->prepare("DELETE FROM productos WHERE id=?");
            $stmt->execute([$codigo]);
        } catch (PDOException $e) {
            die("Error al eliminar producto: " . $e->getMessage());
        }
    }

    public static function obtenerTodos() {
        try {
            $pdo = Conexion::getConexion();
            $stmt = $pdo->query("SELECT * FROM productos");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al obtener productos: " . $e->getMessage());
        }
    }
}
?>
