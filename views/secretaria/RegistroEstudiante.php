<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hola Mundo TS1</title>
    <link rel="stylesheet" href="../../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <div class="form-container">
        <h2>Registro de estudiantes a TS1</h2>
        <form action="controllers/EstudianteController.php" method="POST">
            <div class="form-group">
                <label for="carnet">Carnet:</label>
                <input type="text" id="carnet" name="carnet" required>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" min="16" max="100" required>
            </div>

            <div class="form-group">
                <label for="genero">Género:</label>
                <select id="genero" name="genero" required>
                    <option value="">Elija una opcion</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
            <button type="submit" class="btn">Registrar Estudiante</button>
            <p></p>
            <a href="Secretaria.php" class="btn">Cancelar Registro</a>
        </form>
    </div>
    </div>
</body>

</html>