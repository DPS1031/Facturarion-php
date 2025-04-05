<?php

class Producto {
    private $codigo;
    private $nombre;
    private $stock;
    private $valor_unitario;

    public function __construct($codigo = null, $nombre = "", $valor_unitario = 0.0, $stock = 0) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->valor_unitario = $valor_unitario;
        $this->stock = $stock;
    }

    public function getCodigo() { return $this->codigo; }
    public function setCodigo($codigo) { $this->codigo = $codigo; }

    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }

    public function getvalor_unitario() { return $this->valor_unitario; }
    public function setvalor_unitario($valor_unitario) { $this->valor_unitario = $valor_unitario; }

    public function getStock() { return $this->stock; }
    public function setStock($stock) { $this->stock = $stock; }
}
?>
