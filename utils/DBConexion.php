<?php
class DBConexion {
    private $host = "localhost";
    private $usuario = "rony";
    private $contrasena = "5812";
    private $base_datos = "Registro";
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->contrasena, $this->base_datos);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }

    }

    public function getConnection() {
        return $this->conexion;
    }

    public function closeConnection() {
        $this->conexion->close();
    }
}
?>