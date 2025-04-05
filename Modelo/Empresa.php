<?php   

class Empresa{ 

    private $Codigo;
    private $Nombre;
    private $Clientes = [];
    
    public function __construct($Codigo, $Nombre) {
        $this->Codigo = $Codigo;
        $this->Nombre = $Nombre;
    }

    public function getCodigo(){

        return $this -> Codigo;

    }

    public function setCodigo($Codigo){

        $this -> Codigo = $Codigo;

    }

    public function getNombre(){

        return $this -> Nombre;

    }

    public function setNombre($Nombre){

        $this -> Nombre = $Nombre;

    }


    public function getClientes(){

        return $this -> Clientes;

    }

    public function setClientes (array $Clientes){

        $this -> Clientes = $Clientes;

    }

}

?>