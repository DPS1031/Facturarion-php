<?php
require_once '../Control/CtrCliente.php';

$controlador = new CtrCliente();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['crear'])) {
        $controlador->crear($_POST['email'], $_POST['nombre'], $_POST['telefono'], $_POST['credito'], $_POST['empresa_id']);
    } elseif (isset($_POST['actualizar'])) {
        $controlador->actualizar($_POST['id'], $_POST['email'], $_POST['nombre'], $_POST['telefono'], $_POST['credito'], $_POST['empresa_id']);
    } elseif (isset($_POST['eliminar'])) {
        $controlador->eliminar($_POST['id']);
    }
}

$clientes = $controlador->listar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes</title>
</head>
<body>

    <h2>Gestión de Clientes</h2>

    <form method="POST">
        <input type="hidden" name="id" id="id">
        <label>Email:</label>
        <input type="email" name="email" id="email" required>
        <label>Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <label>Teléfono:</label>
        <input type="text" name="telefono" id="telefono" required>
        <label>Crédito:</label>
        <input type="number" name="credito" id="credito" required>
        <label>Empresa ID:</label>
        <input type="number" name="empresa_id" id="empresa_id" required>
        <button type="submit" name="crear">Crear</button>
        <button type="submit" name="actualizar">Actualizar</button>
    </form>

    <h3>Lista de Clientes</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Crédito</th>
            <th>Empresa ID</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($clientes as $cliente) : ?>
            <tr>
                <td><?php echo $cliente['id']; ?></td>
                <td><?php echo $cliente['email']; ?></td>
                <td><?php echo $cliente['nombre']; ?></td>
                <td><?php echo $cliente['telefono']; ?></td>
                <td><?php echo $cliente['credito']; ?></td>
                <td><?php echo $cliente['empresa_id']; ?></td>
                <td>
                    <button onclick="editarCliente(<?php echo htmlspecialchars(json_encode($cliente)); ?>)">Editar</button>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
                        <button type="submit" name="eliminar" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script>
        function editarCliente(cliente) {
            document.getElementById('id').value = cliente.id;
            document.getElementById('email').value = cliente.email;
            document.getElementById('nombre').value = cliente.nombre;
            document.getElementById('telefono').value = cliente.telefono;
            document.getElementById('credito').value = cliente.credito;
            document.getElementById('empresa_id').value = cliente.empresa_id;
        }
    </script>

</body>
</html>
