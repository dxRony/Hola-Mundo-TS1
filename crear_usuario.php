<?php
require_once 'utils/DBConexion.php';


try {
    $db = new DBConexion();
    $conn = $db->getConnection();

    $username = "secre4";
    $contrasena = password_hash("secre4", PASSWORD_BCRYPT);
    $nombre = "Secretaria4";
    $rol = "2";

    $stmt = $conn->prepare("INSERT INTO Usuario (username, contrasena, nombre, rol) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $contrasena, $nombre, $rol);
    
    if ($stmt->execute()) {
        echo "Usuario creado exitosamente:<br>";
        echo "Usuario: secre4<br>Contraseña: secre4";
    } else {
        echo "Error al crear usuario: " . $conn->error;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
    