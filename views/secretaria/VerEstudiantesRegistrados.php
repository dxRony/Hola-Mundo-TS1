<?php
require_once '../../controllers/EstudianteController.php';

$controller = new EstudianteController();
$estudiantes = $controller->obtenerEstudiantes();
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
        <h2>Estudiantes registrados a TS1</h2>

        <table class="students-table">
            <thead>
                <tr>
                    <th>Carnet</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Género</th>
                    <th>Registrado por</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estudiantes as $estudiante): ?>
                    <tr>
                        <td><?= htmlspecialchars($estudiante->getCarnet()) ?></td>
                        <td><?= htmlspecialchars($estudiante->getNombre()) ?></td>
                        <td><?= htmlspecialchars($estudiante->getEdad()) ?></td>
                        <td><?= htmlspecialchars($estudiante->getGenero()) ?></td>
                        <td>
                            <?= htmlspecialchars($estudiante->getNombreUsuario())
                                
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="Secretaria.php" class="btn">Volver a la página anterior</a>

    </div>
</body>

</html>