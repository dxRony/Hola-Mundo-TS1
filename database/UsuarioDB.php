<?php
require_once __DIR__ . "/Database.php";
require_once __DIR__ . '/../models/UsuarioModel.php';

class UsuarioDB
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function crear(UsuarioModel $usuario)
    {
        $stmt = $this->db->prepare("INSERT INTO Usuario (username, celular, nombre, contrasena, rol) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "sssss",
            $usuario->getUsername(),
            $usuario->getCelular(),
            $usuario->getNombre(),
            $usuario->getContrasena(),
            $usuario->getRol()
        );

        return $stmt->execute();
    }

    public function listar()
    {
        $usuarios = array();
        $resultado = $this->db->query("SELECT id, username, celular, nombre, contrasena, rol FROM Usuario");

        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = new UsuarioModel(
                $fila['id'],
                $fila['username'],
                $fila['celular'],
                $fila['nombre'],
                $fila['contrasena'],
                $fila['rol']
            );
        }

        return $usuarios;
    }

    public function login($username, $contrasena)
    {
        $stmt = $this->db->prepare("SELECT id, username, contrasena, nombre, rol FROM Usuario WHERE username = ?");

        if (!$stmt) {
            error_log("Error preparing statement: " . $this->db->error);
            return false;
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $userData = $result->fetch_assoc();

            if (password_verify($contrasena, $userData['contrasena'])) {
                return new UsuarioModel(
                    $userData['id'],
                    $userData['username'],
                    $userData['celular'],
                    $userData['nombre'],
                    $userData['contrasena'],
                    $userData['rol']
                );
            } else {
                error_log("Password verification failed for user: $username");
            }
        } else {
            error_log("User not found: $username");
        }

        return false;
    }
}
