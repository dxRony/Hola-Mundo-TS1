<?php
require_once '../../controllers/UsuarioController.php';

$controller = new UsuarioController();

// Si viene por GET -> mostrar el formulario con datos actuales
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $usuario = $controller->obtenerPorId($id);

    if (!$usuario) {
        die("Usuario no encontrado");
    }
}

// Si viene por POST -> actualizar en la base de datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $celular = $_POST['celular'];
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];

    if ($controller->editarUsuario($id, $username, $celular, $nombre, $contrasena, $rol)) {
        header("Location: VerSecretariasRegistradas.php");
        exit;
    } else {
        echo "<p>Error al actualizar la secretaria.</p>";
    }
}
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Editar Secretaria</title>
    <link rel="stylesheet" href="../../style.css">
</head>

<body>
    <div class="form-container">
        <h2>Editar información de la secretaria</h2>

        <form method="POST" action="EditarSecretaria.php">
            <input type="hidden" name="accion" value="editar">
            <input type="hidden" name="id" value="<?= htmlspecialchars($usuario->getId()) ?>">
            <div class="form-group"><label>Usuario:</label>
                <input type="text" name="username" value="<?= htmlspecialchars($usuario->getUsername()) ?>" required>
            </div>
            <div class="form-group"><label>Celular:</label>
                <input type="text" name="celular" value="<?= htmlspecialchars($usuario->getCelular()) ?>" required>
            </div>
            <div class="form-group"><label>Nombre:</label>
                <input type="text" name="nombre" value="<?= htmlspecialchars($usuario->getNombre()) ?>" required>
            </div>
            <div class="form-group"><label>Nueva Contraseña:</label>
                <input type="password" name="contrasena">
            </div>
            <div class="form-group"><label>Confirmacion Nueva Contraseña:</label>
                <input type="password" name="confirmacionContrasena">
            </div>
            <button type="submit" class="btn">Guardar cambios</button>
            <a href="VerSecretariasRegistradas.php" class="btn">Cancelar</a>
        </form>
    </div>
</body>

</html>