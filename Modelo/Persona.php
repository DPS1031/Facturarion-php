<?php

class Persona {
    private $codigo;
    private $email;
    private $nombre;
    private $telefono;

    public function __construct($codigo = null, $email = null, $nombre = null, $telefono = null) {
        $this->codigo = $codigo;
        $this->email = $email;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
}

?>
