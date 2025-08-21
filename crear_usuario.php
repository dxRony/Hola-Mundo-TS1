<?php
require_once 'utils/DBConexion.php';


try {
    $db = new DBConexion();
    $conn = $db->getConnection();

    $username = "admin";
    $contrasena = password_hash("admin123", PASSWORD_BCRYPT);
    $nombre = "Administrador";
    $rol = "1";

    $stmt = $conn->prepare("INSERT INTO Usuario (username, contrasena, nombre, rol) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $contrasena, $nombre, $rol);
    
    if ($stmt->execute()) {
        echo "Usuario creado exitosamente:<br>";
        echo "Usuario: admin<br>Contraseña: admin123";
    } else {
        echo "Error al crear usuario: " . $conn->error;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
    