<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] != 1) {
    header("Location: ../../views/Login.php");
    exit();
}
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
        <h2>Bienvenido administrador</h2>
        <select name="opciontes" id="opciones">
            <option value="1">Seleccione una opción</option>
            <option value="2">Registrar secretaria</option>
            <option value="3">Ver secretarias registradas</option>
        </select>
    </div>


    <div class="tool-section">
        <img src="images/admin.avif" alt="Imagen de administrador" class="img-admin">
    </div>

    <script>
        document.getElementById('opciones').addEventListener('change', function() {
            if (this.value === "2") {
                window.location.href = "views/admin/RegistroSecretaria.php";
            } else if (this.value === "3") {
                window.location.href = "views/admin/VerSecretariasRegistradas.php";
            }
        });
    </script>
</body>

</html>