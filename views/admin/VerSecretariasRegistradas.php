<?php
require_once  '../../controllers/UsuarioController.php';

$controller = new UsuarioController();
$secretarias = $controller->obtenerUsuarios();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hola Mundo TS1</title>
    <link rel="stylesheet" href="../../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <div class="students-table-container">
        <h2>Secretarias registradas en el sistema</h2>

        <table class="students-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de usuario</th>
                    <th>Celular</th>
                    <th>Nombre</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($secretarias as $secretaria): ?>
                    <tr>
                        <td><?= htmlspecialchars($secretaria->getId()) ?></td>
                        <td><?= htmlspecialchars($secretaria->getUsername()) ?></td>
                        <td><?= htmlspecialchars($secretaria->getCelular()) ?></td>
                        <td><?= htmlspecialchars($secretaria->getNombre()) ?></td>
                        <td><a href="EditarSecretaria.php?id=<?= $secretaria->getId() ?>" class="btn">Editar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="Admin.php" class="btn">Volver a la página anterior</a>
        

    </div>