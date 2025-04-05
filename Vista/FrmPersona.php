<?php

if (file_exists('../Control/CtrPersona.php')) {
    require_once '../Control/CtrPersona.php';
} else {
    die("Error: No se encontró el archivo Control/CtrPersona.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["crear"])) {
        CtrPersona::insertar($_POST["email"], $_POST["nombre"], $_POST["telefono"]);
    } elseif (isset($_POST["actualizar"]) && !empty($_POST["codigo"])) {
        CtrPersona::actualizar($_POST["codigo"], $_POST["email"], $_POST["nombre"], $_POST["telefono"]);
    }
}

if (isset($_GET["eliminar"])) {
    CtrPersona::eliminar($_GET["eliminar"]);
}

$personas = CtrPersona::obtenerTodas();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Personas</title>
</head>
<body>
    <h2>Gestión de Personas</h2>

    <form method="POST">
        <input type="hidden" name="codigo" id="codigo">
        <label>Email:</label>
        <input type="email" name="email" id="email" required>
        <label>Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <label>Teléfono:</label>
        <input type="text" name="telefono" id="telefono" required>
        <button type="submit" name="crear">Agregar</button>
        <button type="submit" name="actualizar">Actualizar</button>
    </form>

    <h3>Lista de Personas</h3>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Email</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($personas as $persona): ?>
            <tr>
                <td><?= htmlspecialchars($persona['codigo'] ?? 'Sin código') ?></td>
                <td><?= htmlspecialchars($persona['email'] ?? '') ?></td>
                <td><?= htmlspecialchars($persona['nombre'] ?? '') ?></td>
                <td><?= htmlspecialchars($persona['telefono'] ?? '') ?></td>
                <td>
                    <?php if (!empty($persona['codigo'])): ?>
                        <a href="?editar=<?= urlencode($persona['codigo']) ?>">Editar</a>
                        <a href="?eliminar=<?= urlencode($persona['codigo']) ?>" onclick="return confirm('¿Eliminar esta persona?')">Eliminar</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script>
        <?php if (isset($_GET['editar'])): 
            $codigo = htmlspecialchars($_GET['editar']);
            foreach ($personas as $p) {
                if (isset($p['codigo']) && $p['codigo'] == $codigo) {
                    echo "document.getElementById('codigo').value = '" . addslashes($p['codigo']) . "';";
                    echo "document.getElementById('email').value = '" . addslashes($p['email']) . "';";
                    echo "document.getElementById('nombre').value = '" . addslashes($p['nombre']) . "';";
                    echo "document.getElementById('telefono').value = '" . addslashes($p['telefono']) . "';";
                }
            }
        endif; ?>
    </script>
</body>
</html>
