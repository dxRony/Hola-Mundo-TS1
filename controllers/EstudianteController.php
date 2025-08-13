<?php
require_once '../models/EstudianteModel.php';
require_once '../database/EstudianteDB.php';


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

            try {
                $estudiante = new EstudianteModel($carnet, $nombre, $edad, $genero);
                if ($this->dao->crear($estudiante)) {
                    echo "<script>alert('Estudiante registrado exitosamente'); window.location.href='../index.php';</script>";
                } else {
                    echo "<script>alert('Error al registrar el estudiante'); window.location.href='../index.php';</script>";
                }
            } catch (Exception $e) {
                header("Location: ../index.php");
            }
            exit();
        }

        header("Location: ../index.php");
    }
}

if (isset($_POST['carnet'])) {
    $controller = new EstudianteController();
    $controller->registrarEstudiante();
}
