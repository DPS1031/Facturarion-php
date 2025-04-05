<?php
require_once 'C:\Users\david\Development\Php\ProyectoFacturacion\Control\ctrFactura.php';

$ctrFactura = new CtrFactura();
$facturas = $ctrFactura->obtenerFacturas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Facturas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Lista de Facturas</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Número</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($facturas as $factura) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($factura['numero']); ?></td>
                    <td><?php echo htmlspecialchars($factura['fecha']); ?></td>
                    <td><?php echo htmlspecialchars($factura['total']); ?></td>
                    <td>
                        <a href="FrmFacturaDetalle.php?numero=<?php echo $factura['numero']; ?>">Ver Detalle</a>
                        <a href="FrmFacturaEliminar.php?numero=<?php echo $factura['numero']; ?>" onclick="return confirm('¿Seguro que deseas eliminar esta factura?')">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h3>Crear Nueva Factura</h3>
    <form action="FrmFacturaAgregar.php" method="POST">
        <label>Fecha:</label>
        <input type="date" name="fecha" required>
        <label>Total:</label>
        <input type="number" step="0.01" name="total" required>
        <button type="submit">Agregar</button>
    </form>

</body>
</html>
