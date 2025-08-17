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
        <h2>Registro de secretarias a sistema</h2>
        <form action="../../controllers/UsuarioController.php" method="POST">
            <div class="form-group">
                <label for="username">Nombre de usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="number" id="celular" name="celuar" min="1" max="999999" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <div class="form-group">
                <label for="confirmacionContrasena">Confirma la contraseña:</label>
                <input type="password" id="confirmacionContrasena" name="confirmacionContrasena" required>
            </div>
            <button type="submit" class="btn">Registrar Secretaria</button>
            <p></p>
            <a href="Admin.php" class="btn">Cancelar Registro</a>
        </form>
    </div>
    </div>
</body>

</html>