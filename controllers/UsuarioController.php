<?php
require_once __DIR__ . '/../models/UsuarioModel.php';
require_once __DIR__ . '/../database/UsuarioDB.php';

class UsuarioController
{

    private $dao;
    public function __construct()
    {
        $this->dao = new UsuarioDB();
    }

    public function registrarUsuario()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $celular = $_POST['celular'];
            $nombre = $_POST['nombre'];
            $contrasena = $_POST['contrasena'];
            $confirmacionContrasena = $_POST['confirmacionContrasena'];
            $rol = 2;
            $id = 0;            

            if (empty($username) || empty($celular) || empty($nombre) || empty($contrasena) || empty($confirmacionContrasena)) {
                echo "<script>alert('Todos los campos son obligatorios'); window.location.href='../views/admin/RegistroSecretaria.php';</script>";
                exit();
            }

            if ($confirmacionContrasena !== $contrasena) {
                echo "<script>alert('Las contraseñas no coinciden'); window.location.href='../views/admin/RegistroSecretaria.php';</script>";
                exit();
            }
            //actualizando contrasena hasheada
            $contrasena = password_hash($contrasena, PASSWORD_BCRYPT);

            try {
                $usuario = new UsuarioModel($id, $username, $celular, $nombre, $contrasena, $rol);
                if ($this->dao->crear($usuario)) {
                    echo "<script>alert('Secretaria registrada exitosamente'); window.location.href='../views/admin/Admin.php';</script>";
                } else {
                    echo "<script>alert('Error al registrar a la secretaria'); window.location.href='../views/admin/Admin.php';</script>";
                }
            } catch (Exception $e) {
                header("Location: ../views/admin/Admin.php");
            }
            exit();
        }

        header("Location: ../index.php");
    }

    public function obtenerUsuarios()
    {
        return $this->dao->listar();
    }

    public function editarUsuario($id, $username, $celular, $nombre, $contrasena, $rol)
    {
        if (empty($id) || empty($username) || empty($celular) || empty($nombre)) {
            echo "<script>alert('Todos los campos son obligatorios'); window.location.href='EditarSecretaria.php?id=$id';</script>";
            exit();
        }

        if (!empty($contrasena) && !empty($_POST['confirmacionContrasena'])) {
            if ($_POST['confirmacionContrasena'] !== $contrasena) {
                echo "<script>alert('Las contraseñas no coinciden'); window.location.href='EditarSecretaria.php?id=$id';</script>";
                exit();
            }
        }

        $usuario = new UsuarioModel(
            $id,
            $username,
            $celular,
            $nombre,
            $contrasena,
            $rol
        );
        return $this->dao->update($usuario);
    }

    public function obtenerPorId($id)
    {
        $usuario = $this->dao->obtenerUsuarioPorId($id);
        if ($usuario) return $usuario;
        else return null;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller = new UsuarioController();

    if (isset($_POST['accion']) && $_POST['accion'] === "registrar") {
        $controller->registrarUsuario();
    }

    if (isset($_POST['accion']) && $_POST['accion'] === "editar") {
        $controller->editarUsuario(
            $_POST['id'],
            $_POST['username'],
            $_POST['celular'],
            $_POST['nombre'],
            $_POST['contrasena'],
            2
        );
        header("Location: VerSecretariasRegistradas.php");
        exit;
    }
}
