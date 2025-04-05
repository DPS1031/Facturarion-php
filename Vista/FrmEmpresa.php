<?php
require_once '../Control/ctrEmpresa.php';

$ctrEmpresa = new CtrEmpresa();
$empresas = $ctrEmpresa->obtenerEmpresas();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Empresas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Lista de Empresas</h2>
    
    <table border="1">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empresas as $empresa) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($empresa['codigo']); ?></td>
                    <td><?php echo htmlspecialchars($empresa['nombre']); ?></td>
                    <td>
                        <a href="FrmEmpresaEditar.php?codigo=<?php echo $empresa['codigo']; ?>">Editar</a>
                        <a href="FrmEmpresaEliminar.php?codigo=<?php echo $empresa['codigo']; ?>" onclick="return confirm('¿Seguro que deseas eliminar esta empresa?')">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h3>Agregar Nueva Empresa</h3>
    <form action="FrmEmpresaAgregar.php" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <button type="submit">Agregar</button>
    </form>

</body>
</html>
