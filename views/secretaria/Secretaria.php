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
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <a href="../../controllers/LoginController.php?logout=1" class="btn logout-btn">Cerrar sesión</a>
    <div class="form-container">
        <h2>Bienvenida secretaria</h2>
        <select name="opciontes" id="opciones">
            <option value="1">Seleccione una opción</option>
            <option value="2">Registar estudiante</option>
            <option value="3">Ver estudiantes registrados</option>
        </select>
    </div>


    <div class="tool-section">
        <img src="images/Secretaria.png" alt="Imagen de secretaria" class="img-secre">
    </div>

    <script>
        document.getElementById('opciones').addEventListener('change', function() {
            if (this.value === "2") {
                window.location.href = "views/secretaria/RegistroEstudiante.php";
            } else if (this.value === "3") {
                window.location.href = "views/secretaria/VerEstudiantesRegistrados.php";
            }
        });
    </script>
</body>

</html>