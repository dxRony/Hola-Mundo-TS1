<?php

class EstudianteModel
{
    private $carnet;
    private $nombre;
    private $edad;
    private $genero;
    private $idUsuario;
    private $nombreUsuario;

    public function __construct($carnet, $nombre, $edad, $genero, $idUsuario)
    {
        $this->carnet = $carnet;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->genero = $genero;
        $this->idUsuario = $idUsuario;
    }

    public function getCarnet()
    {
        return $this->carnet;
    }

    public function setCarnet($carnet)
    {
        $this->carnet = $carnet;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }
}
