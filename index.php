<?php
require_once __DIR__ . '/controllers/EstudianteController.php';

$controller = new EstudianteController();
$estudiantes = $controller->obtenerEstudiantes();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Hola Mundo TS1</title>
  <link rel="stylesheet" href="style.css">
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <h3> #2 - Rony Mauricio Rojas Aguilar - 202031191</h3>
  <?php require_once __DIR__ . '/views/HelloWorld.php'; ?>

  <div class="students-table-container">
    <h2>Estudiantes Registrados En TS1</h2>    
      <table class="students-table">
        <thead>
          <tr>
            <th>Carnet</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Género</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($estudiantes as $estudiante): ?>
            <tr>
              <td><?= htmlspecialchars($estudiante->getCarnet()) ?></td>
              <td><?= htmlspecialchars($estudiante->getNombre()) ?></td>
              <td><?= htmlspecialchars($estudiante->getEdad()) ?></td>
              <td>
                <?=
                htmlspecialchars(
                  $estudiante->getGenero() == 'M' ? 'Masculino' : ($estudiante->getGenero() == 'F' ? 'Femenino' : 'Otro')
                )
                ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
  </div>
  <script src="script.js"></script>
</body>

</html>