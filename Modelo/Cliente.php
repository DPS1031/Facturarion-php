<?php   

class Cliente extends Persona{ 

    private $Credito;

    public function __construct($Codigo, $Email, $Nombre, $Telefono, $Credito){

        parent::__construct($Codigo, $Email, $Nombre, $Telefono);
        
        $this -> Credito = $Credito;

    }

    public function getCredito(){

        return $this -> Credito;

    }

    public function setCredito($Credito){

        $this -> Credito = $Credito;

    }
    
}

?>