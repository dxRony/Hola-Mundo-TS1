<?php
require_once __DIR__ . '/../models/EstudianteModel.php';
require_once __DIR__ . '/../database/EstudianteDB.php';

class EstudianteController
{
    private $dao;
    public function __construct()
    {
        $this->dao = new EstudianteDB();
    }

    public function registrarEstudiante()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $carnet = $_POST['carnet'];
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $genero = $_POST['genero'];

            if (empty($carnet) || empty($nombre) || empty($edad) || empty($genero)) {
                echo "<script>alert('Todos los campos son obligatorios'); window.location.href='../views/secretaria/Secretaria.php';</script>";
                exit();
            }

            if (!is_numeric($edad) || $edad < 0) {
                echo "<script>alert('La edad debe ser un número positivo'); window.location.href='../views/secretaria/Secretaria.php';</script>";
                exit();
            }

            try {
                $estudiante = new EstudianteModel($carnet, $nombre, $edad, $genero);
                if ($this->dao->crear($estudiante)) {
                    echo "<script>alert('Estudiante registrado'); window.location.href='../views/secretaria/Secretaria.php';</script>";
                } else {
                    echo "<script>alert('Error al registrar el estudiante'); window.location.href='../views/secretaria/Secretaria.php';</script>";
                }
            } catch (Exception $e) {
                header("Location: ../views/secretaria/Secretaria.php");
            }
            exit();
        }
    }

    public function obtenerEstudiantes()
    {
        $listadoEstudiantes = $this->dao->listar();
        if (empty($listadoEstudiantes)) {
            echo "<script>alert('No hay estudiantes registrados'); window.location.href='../views/secretaria/Secretaria.php';</script>";
            exit();
            return $listadoEstudiantes;
        } else {
            return $listadoEstudiantes;
        }
    }
}
if (isset($_POST['carnet'])) {
    $controller = new EstudianteController();
    $controller->registrarEstudiante();
}
