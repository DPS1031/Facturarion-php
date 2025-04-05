<?php   

class Factura{ 

    private $Fecha;
    private $Numero;
    private $Total;
    private $ProductosPorFactura = [];
    
    public function __construct($Fecha, $Numero, $Total, array $ProductosPorFactura) {
        $this->Fecha = $Fecha;
        $this->Numero = $Numero;
        $this->Total = $Total;
        $this -> ProductosPorFactura = $ProductosPorFactura;
    }

    public function getFecha(){

        return $this -> Fecha;

    }

    public function setFecha($Fecha){

        $this -> Fecha = $Fecha;

    }

    public function getNumero(){

        return $this -> Numero;

    }

    public function setNumero($Numero){

        $this -> Numero = $Numero;

    }

    public function getTotal(){

        return $this -> Total;

    }

    public function setTotal($Total){

        $this -> Total = $Total;

    }

    public function getProductosPorFactura(){

        return $this -> ProductosPorFactura;

    }

    public function setProductosPorFactura(array $ProductosPorFactura){

        $this -> ProductosPorFactura = $ProductosPorFactura;

    }

}

?>