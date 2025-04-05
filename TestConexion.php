<?php
require_once '../Config/conexion.php';

try {
    $db = Conexion::getConexion();
    echo "Conexión exitosa a la base de datos.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>


