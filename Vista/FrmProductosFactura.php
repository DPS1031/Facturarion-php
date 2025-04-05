<?php
require_once '../Control/ctrProductosPorFactura.php';

$ctrProductosPorFactura = new CtrProductosPorFactura();
$productosPorFactura = $ctrProductosPorFactura->obtenerProductosPorFactura();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos por Factura</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Productos en Facturas</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Factura</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productosPorFactura as $item) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['factura_id']); ?></td>
                    <td><?php echo htmlspecialchars($item['producto_nombre']); ?></td>
                    <td><?php echo htmlspecialchars($item['cantidad']); ?></td>
                    <td><?php echo htmlspecialchars($item['subtotal']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>
