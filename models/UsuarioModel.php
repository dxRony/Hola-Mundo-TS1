<?php

class UsuarioModel
{
    private $id;
    private $username;
    private $celular;
    private $nombre;
    private $contrasena;
    private $rol;

    public function __construct($id, $username, $celular, $nombre, $contrasena, $rol)
    {
        $this->id = $id;
        $this->username = $username;
        $this->celular = $celular;
        $this->nombre = $nombre;
        $this->contrasena = $contrasena;
        $this->rol = $rol;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = password_hash($contrasena, PASSWORD_BCRYPT);
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }
}
