<?php
require_once '../Control/CtrProducto.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["crear"])) {
        if (isset($_POST["nombre"], $_POST["stock"], $_POST["valor_unitario"]) && $_POST["valor_unitario"] !== '') {
            CtrProducto::insertar(null, $_POST["nombre"], $_POST["stock"], $_POST["valor_unitario"]);
        }
    }
}




if (isset($_GET["eliminar"])) {
    CtrProducto::eliminar($_GET["eliminar"]);
}

$productos = CtrProducto::obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
</head>
<body>
    <h2>Gestión de Productos</h2>

    <form method="POST">
    <input type="hidden" name="codigo" id="codigo">
    
    <label>Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>

    <label>Valor Unitario:</label>
    <input type="number" step="0.01" name="valor_unitario" id="valor_unitario" required>

    <label>Stock:</label>
    <input type="number" name="stock" id="stock" required>

    <button type="submit" name="crear">Agregar</button>
    <button type="submit" name="actualizar">Actualizar</button>
</form>


    <h3>Lista de Productos</h3>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>valor_unitario</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= htmlspecialchars($producto['codigo'] ?? '') ?></td>
                <td><?= htmlspecialchars($producto['nombre'] ?? '') ?></td>
                <td><?= htmlspecialchars($producto['valor_unitario'] ?? '') ?></td>
                <td><?= htmlspecialchars($producto['stock'] ?? '') ?></td>
                <td>
                    <a href="?editar=<?= urlencode($producto['codigo']) ?>">Editar</a>
                    <a href="?eliminar=<?= urlencode($producto['id']) ?>" onclick="return confirm('¿Eliminar este producto?')">Eliminar</a>
                    </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script>
        <?php if (isset($_GET['editar'])): 
            $codigo = htmlspecialchars($_GET['editar']);
            foreach ($productos as $p) {
                if ($p['codigo'] == $codigo) {
                    echo "document.getElementById('codigo').value = '" . addslashes($p['codigo']) . "';";
                    echo "document.getElementById('nombre').value = '" . addslashes($p['nombre']) . "';";
                    echo "document.getElementById('valor_unitario').value = '" . addslashes($p['valor_unitario']) . "';";
                    echo "document.getElementById('stock').value = '" . addslashes($p['stock']) . "';";
                }
            }
        endif; ?>
    </script>
</body>
</html>
