<?php   

class ProductosPorFactura{ 

    private $Subtotal;
    private $Cantidad;
    
    public function __construct($Subtotal, $Cantidad) {
        $this->Subtotal = $Subtotal;
        $this->Cantidad = $Cantidad;
    }

    public function getSubtotal(){

        return $this -> Subtotal;

    }

    public function setSubtotal($Subtotal){

        $this -> Subtotal = $Subtotal;

    }

    public function getCantidad(){

        return $this -> Cantidad;

    }

    public function setCantidad($Cantidad){

        $this -> Cantidad = $Cantidad;

    }
    
}

?>