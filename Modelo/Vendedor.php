<?php   

class Vendedor extends Persona{ 

    private $Carnet;
    private $Direccion;
 
    public function __construct($Codigo, $Email, $Nombre, $Telefono, $Carnet, $Direccion){

        parent::__construct($Codigo, $Email, $Nombre, $Telefono);
        
        $this -> Carnet = $Carnet;
        $this -> Direccion = $Direccion;

    }

    public function getCarnet(){

        return $this -> Carnet;

    }

    public function setCarnet($Carnet){

        $this -> Carnet = $Carnet;

    }

    public function getDireccion(){

        return $this -> Direccion;

    }

    public function setDireccion($Direccion){

        $this -> Direccion = $Direccion;

    }

}

?>