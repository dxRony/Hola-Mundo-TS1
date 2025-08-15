<?php
require_once __DIR__ . '/../utils/DBConexion.php';
require_once __DIR__ . '/../models/EstudianteModel.php';

class EstudianteDB
{
    private $db;

    public function __construct()
    {
        $database = new DBConexion();
        $this->db = $database->getConnection();
    }

    public function crear(EstudianteModel $estudiante)
    {
        $stmt = $this->db->prepare("INSERT INTO Estudiante (carnet, nombre, edad, genero) VALUES (?, ?, ?, ?)");
        $stmt->bind_param(
            "ssis",
            $estudiante->getCarnet(),
            $estudiante->getNombre(),
            $estudiante->getEdad(),
            $estudiante->getGenero()
        );

        return $stmt->execute();
    }

    public function listar()
    {
        $estudiantes = array();
        $resultado = $this->db->query("SELECT carnet, nombre, edad, genero FROM Estudiante");

        while ($fila = $resultado->fetch_assoc()) {
            $estudiantes[] = new EstudianteModel(
                $fila['carnet'],
                $fila['nombre'],
                $fila['edad'],
                $fila['genero']
            );
        }

        return $estudiantes;
    }

    public function __destruct()
    {
        $this->db->close();
    }
}
