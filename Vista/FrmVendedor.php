<?php
require_once '../Control/CtrVendedor.php';

$ctrVendedor = new CtrVendedor();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["crear"])) {
        $email = $_POST["email"];
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $salario = $_POST["salario"];
        $ctrVendedor->crearVendedor($email, $nombre, $telefono, $salario);
    } elseif (isset($_POST["actualizar"])) {
        $id = $_POST["id"];
        $email = $_POST["email"];
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $salario = $_POST["salario"];
        $ctrVendedor->actualizarVendedor($id, $email, $nombre, $telefono, $salario);
    } elseif (isset($_POST["eliminar"])) {
        $id = $_POST["id"];
        $ctrVendedor->eliminarVendedor($id);
    }
}

$vendedores = $ctrVendedor->obtenerVendedores();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Vendedores</title>
</head>
<body>

    <h2>Formulario de Vendedor</h2>

    <form method="POST">
        <input type="hidden" name="id" id="id">
        <label>Email:</label>
        <input type="email" name="email" id="email" required>
        <label>Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <label>Teléfono:</label>
        <input type="text" name="telefono" id="telefono" required>
        <label>Salario:</label>
        <input type="number" step="0.01" name="salario" id="salario" required>
        <button type="submit" name="crear">Crear</button>
        <button type="submit" name="actualizar">Actualizar</button>
    </form>

    <h2>Lista de Vendedores</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Salario</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($vendedores as $vendedor): ?>
        <tr>
            <td><?php echo $vendedor["id"]; ?></td>
            <td><?php echo $vendedor["email"]; ?></td>
            <td><?php echo $vendedor["nombre"]; ?></td>
            <td><?php echo $vendedor["telefono"]; ?></td>
            <td><?php echo $vendedor["salario"]; ?></td>
            <td>
                <button onclick="editarVendedor(<?php echo $vendedor['id']; ?>, '<?php echo $vendedor['email']; ?>', '<?php echo $vendedor['nombre']; ?>', '<?php echo $vendedor['telefono']; ?>', '<?php echo $vendedor['salario']; ?>')">Editar</button>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $vendedor['id']; ?>">
                    <button type="submit" name="eliminar">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <script>
        function editarVendedor(id, email, nombre, telefono, salario) {
            document.getElementById("id").value = id;
            document.getElementById("email").value = email;
            document.getElementById("nombre").value = nombre;
            document.getElementById("telefono").value = telefono;
            document.getElementById("salario").value = salario;
        }
    </script>

</body>
</html>
