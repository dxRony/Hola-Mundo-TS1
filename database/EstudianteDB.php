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
        $stmt = $this->db->prepare("INSERT INTO Estudiante (carnet, nombre, edad, genero, idUsuario) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "ssisi",
            $estudiante->getCarnet(),
            $estudiante->getNombre(),
            $estudiante->getEdad(),
            $estudiante->getGenero(),
            $estudiante->getIdUsuario()
        );

        return $stmt->execute();
    }

    public function listar()
    {
        $estudiantes = array();
        $resultado = $this->db->query("SELECT e.carnet, e.nombre, e.edad, 
        e.genero, e.idUsuario, u.username as nombreUsuario, u.nombre 
        as nombreCompletoUsuario FROM Estudiante e LEFT JOIN Usuario u ON 
        e.idUsuario = u.id ORDER BY e.nombre");



        while ($fila = $resultado->fetch_assoc()) {
            $estudiante = new EstudianteModel(
                $fila['carnet'],
                $fila['nombre'],
                $fila['edad'],
                $fila['genero'],
                $fila['idUsuario']
            );

            $estudiante->setNombreUsuario($fila['nombreCompletoUsuario']);

            $estudiantes[] = $estudiante;
        }
        return $estudiantes;
    }


    public function __destruct()
    {
        $this->db->close();
    }
}
