<?php
require_once __DIR__ . '/../database/UsuarioDB.php';

class LoginController
{
    private $usuarioDB;

    public function __construct()
    {
        $this->usuarioDB = new UsuarioDB();
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['usuario'];
            $password = $_POST['password'];
            if (empty($username) || empty($password)) {
                echo "<script>alert('Por favor, complete todos los campos');</script>";
                header("Location: ../views/Login.php");
                exit();
            }

            $usuario = $this->usuarioDB->login($username, $password);
            if ($usuario == null) {
                header("Location: ../views/Login.php?error=1");
                exit();
            }

            session_start();
            $_SESSION['usuario'] = [
                'id' => $usuario->getId(),
                'username' => $usuario->getUsername(),
                'nombre' => $usuario->getNombre(),
                'rol' => $usuario->getRol()
            ];

            if ($usuario->getRol() == 1) {
                header("Location: ../views/admin/Admin.php");
            } else if ($usuario->getRol() == 2) {
                header("Location: ../views/secretaria/Secretaria.php");
            }
            exit();
        }
    }
    
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../views/Login.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new LoginController();
    $controller->login();
}

if (isset($_GET['logout'])) {
    $controller = new LoginController();
    $controller->logout();
}
